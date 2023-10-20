<?php

namespace App\Http\Controllers;

use App\Helpers\LoginResponse;
use App\Helpers\LoginSessionHelper;
use App\Services\LoginService;
use App\Services\SecurityService;
use Illuminate\Http\Request;
use NextDeveloper\Commons\Helpers\OAuthHelper;
use NextDeveloper\IAM\Services\LoginMechanismsService;
use NextDeveloper\IAM\Services\UsersService;

class LoginController extends Controller
{
    public function index(Request $request) {
        if(session()->has('oauth')) {
            $oauthHelper = new OAuthHelper(session()->get('oauth')['client_id']);

            //  Check if the client is valid
            if(!$oauthHelper->checkClient()) {
                return view('layouts.error', [
                    'error' =>  'Client that you provide is not valid, or does not exists. Please make sure that'
                        . ' your client and/or valid from the oauth management panel.'
                ]);
            }

            //  Check if the redirect uri match with the request
            if(!$oauthHelper->checkReturnUrl(session()->get('oauth')['redirect_uri'])) {
                return view('layouts.error', [
                    'error' =>  'Redirect uri and client id do not match. Please provide a valid redirect uri'
                        . ' to complete the oauth process. You need to change redirect_uri parameter'
                        . ' to match with the client_id. Please check that URI and resend the request again.'
                ]);
            }
        }

        if(LoginSessionHelper::getLoggedInUser())
            return redirect('/redirect');

        if($request->has('error')) {
            return view('layouts.login', [
                'error' =>  $request->get('error')
            ]);
        }

        return view('layouts.login');
    }

    public function getLogins(Request $request) {
        $csrfToken = session()->get('csrf');

        if($csrfToken == $request->get('csrf')) {
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
        if(!SecurityService::checkCSRF($csrf)) {
            return [
                'authentication'    =>  'failed',
                'reason'            =>  'Login session is finished sooner then expected. Please reload the page to login'
            ];
        }

        //  Check if the user is logged in
        if(!LoginService::checkUserLogin($email, $password, $mechanism)) {
            return [
                'authentication'    =>  'failed',
                'reason'            =>  'Username and password do not match, please try again with the correct password'
            ];
        }

        LoginSessionHelper::setLoggedInUser($email);

        if(LoginSessionHelper::areStagesComplete())
            return [
                'isLoggedIn'    =>  true,
                'redirectTo'    =>  '/redirect'
            ];
        else
            return [
                'isLoggedIn'    =>  true,
                'redirectTo'    =>  '/twofa'
            ];
    }
}