<?php

namespace App\Http\Controllers;

use App\Helpers\LoginResponse;
use App\Helpers\LoginSessionHelper;
use App\Http\Requests\GetLoginsRequest;
use App\OAuth2\OAuthServer;
use App\Services\LoginService;
use App\Services\SecurityService;
use Illuminate\Http\Request;
use NextDeveloper\Commons\Helpers\OAuthHelper;
use NextDeveloper\I18n\Helpers\i18n;
use NextDeveloper\IAM\Services\AccountsService;
use NextDeveloper\IAM\Services\LoginMechanismsService;
use NextDeveloper\IAM\Services\Registration\RegistrationService;
use NextDeveloper\IAM\Services\UsersService;

class LoginController extends Controller
{
    public function index(Request $request) {
        if($request->has('error')) {
            return view('layouts.login', [
                'error' =>  $request->get('error')
            ]);
        }

        return view('layouts.login');
    }

    public function getLogins(GetLoginsRequest $request) {
        $csrfToken = OAuthServer::getCsrf();

        $validated = $request->validated();

        if($csrfToken == $request->get('csrf')) {
            $user = UsersService::getByEmail( $validated['email'] );

            if(!$user && $validated['new_account']) {
                $user = RegistrationService::registerUserWithEmail($validated['email']);
            }

            if(!$user)
                return json_encode([
                    'error' =>  'UserNotFound'
                ]);

            $loginMechanisms = (new LoginMechanismsService($user))->getByUser();

            $logins = [];

            foreach ($loginMechanisms as $mechanism) {
                $logins['logins'][] = $mechanism->login_mechanism;
            }

            return json_encode($logins);
        }

        return null;
    }

    public function loginUser(Request $request) {
        $response = new LoginResponse();

        //  Parsing the variables
        $email = $request->get('username');
        $password = $request->get('password');
        $csrf = $request->get('csrf');
        $mechanism = $request->get('mechanism');

        //  Checking CSRF
        if($csrf != OAuthServer::getCsrf()) {
            return [
                'authentication'    =>  'restart-session',
                'reason'            =>  'Login session is finished sooner then expected. Please reload the page to login'
            ];
        }

        //  Check if the user is logged in
        if(!LoginService::checkUserLogin($email, $password, $mechanism)) {
            return [
                'authentication'    =>  'failed',
                'reason'            =>  'We cannot log you in because the OTP you provided is not correct.'
            ];
        }

        $user = UsersService::getByEmail( $email );

        $authCode = OAuthServer::issueAuthCode($user);

        return [
                'isLoggedIn'    =>  true,
                'redirectTo'    =>  OAuthServer::getReturnUri()
            ];
    }

    public function getLoginsApi(Request $request) {
        $user = UsersService::getByEmail( $request->get('email') );

        //  We are preparing the login stages here.
        //  We generally have 2 stages; login and 2fa. If both of them are complete then we redirect the user.
        LoginSessionHelper::createStage($request->get('email'));

        //  If we dont have the user we are creating one
        if(!$user){
            $user = UsersService::createWithEmail($request->get('email'));
        }

        //
        $loginMechanisms = (new LoginMechanismsService($user))->getByUser();

        $logins = [];

        foreach ($loginMechanisms as $mechanism) {
            $logins['logins'][] = $mechanism->login_mechanism;
        }

        return json_encode($logins);
    }

    public function newEmailOtp(Request $request) {
        $user = LoginSessionHelper::getUserToLogin();

        dd($user);
    }
}