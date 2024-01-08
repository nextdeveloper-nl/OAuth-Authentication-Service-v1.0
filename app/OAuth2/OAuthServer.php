<?php

namespace App\OAuth2;
use App\OAuth2\Repositories\AccessTokenRepository;
use App\OAuth2\Repositories\AuthCodeRepository;
use App\OAuth2\Repositories\ClientRepository;
use App\OAuth2\Repositories\RefreshTokenRepository;
use App\OAuth2\Repositories\ScopeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\Grant\AuthCodeGrant;
use NextDeveloper\Commons\Helpers\RandomHelper;
use NextDeveloper\IAM\Database\Models\Users;

class OAuthServer
{
    private $sessionName = 'OAuthServer';

    private const StageInitial = 'initial';
    private const StageLogin = 'login';
    private const StageTwoFA = '2fa';
    private const StageComplete = 'complete';

    public function __construct()
    {
        return $this;
    }

    public static function getReturnUri() {
        return session()->get('redirect_uri') . '?code=' . session()->get('auth_code');
    }

    public static function getCsrf()
    {
        if(session()->has('csrf'))
            return session()->get('csrf');

        $csrfUuid = RandomHelper::uuid();

        session([
            'csrf'  =>  $csrfUuid
        ]);

        return $csrfUuid;
    }

    public function resetSession() {
        session()->invalidate();
        session()->regenerate();

        session([
            'flowStage' =>  self::StageInitial,
            'csrf'      =>  self::getCsrf()
        ]);

        return $this;
    }

    public static function startFlow() : OAuthServer {
        $server = new OAuthServer();
        $server = $server->resetSession();

        return $server;
    }

    public static function continueFlow() : OAuthServer {
        return new OAuthServer();
    }

    public function parseAuthCodeRequest(Request $request) : OAuthServer {
        session([
            'client'    =>  $request->get('client'),
            'redirect_uri' =>  $request->get('redirect_uri'),
            'response_type'  =>  $request->get('response_type'),
            'scope' =>  $request->get('scope'),
            'state' =>  $request->get('state')
        ]);

        return $this;
    }

    public function clientExists() : bool {
         if($this->getClient())
            return true;

        return false;
    }

    public function isReturnUrlValid() : bool {
        $client = $this->getClient();

        if($client->redirect == session()->get('redirect_uri'))
            return true;

        return false;
    }

    public static function issueAuthCode(Users $users) {
        $code = Str::random(100);

        $authCode = DB::table('oauth_auth_codes')->insert([
            'id'        =>  $code,
            'user_id'   =>  $users->id,
            'client_id' =>  session()->get('client'),
            'scopes'    =>  session()->get('scopes') ?? json_encode([]),
            'revoked'   =>  0,
            'expires_at'    =>  Carbon::now()->addMinute(1)->toDateTimeString()
        ]);

        session([
            'auth_code' =>  $code
        ]);

        return $code;
    }

    private function getClient() {
        return DB::table('oauth_clients')
            ->select('*')
            ->where('id', session()->get('client'))
            ->first();
    }
}