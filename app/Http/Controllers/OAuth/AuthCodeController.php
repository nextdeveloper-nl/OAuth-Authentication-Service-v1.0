<?php

namespace App\Http\Controllers\OAuth;

use App\Helpers\LoginResponse;
use App\Helpers\LoginSessionHelper;
use App\Http\Controllers\Controller;
use App\OAuth2\OAuthServer;
use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\AuthorizationServer;
use NextDeveloper\Commons\Helpers\OAuthHelper;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\IAM\Services\LoginMechanisms\OneTimeEmail;
use NextDeveloper\IAM\Services\LoginMechanismsService;
use NextDeveloper\IAM\Services\UsersService;
use Nyholm\Psr7\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;

class AuthCodeController extends Controller
{
    /**
     * We are managing the login request by the response type; code
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request) {
        $server = OAuthServer::startFlow()
            ->parseAuthCodeRequest($request);

        //  Here we start the code creation process
        if(!$server->clientExists()) {
            return view('layouts.error', [
                'error' => 'Client that you provide is not valid, or does not exists. Please make sure that'
                    . ' your client and/or valid from the oauth management panel.'
            ]);
        }

        if(!$server->isReturnUrlValid()) {
            return view('layouts.error', [
                'error' =>  'Redirect uri and client id do not match. Please provide a valid redirect uri'
                    . ' to complete the oauth process. You need to change redirect_uri parameter'
                    . ' to match with the client_id. Please check that URI and resend the request again.'
            ]);
        }

        return redirect('/login');
    }

    public function issueToken(Request $request) {

    }
}