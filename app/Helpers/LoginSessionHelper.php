<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\IAM\Services\LoginMechanismsService;

class LoginSessionHelper
{
    public static function parseRequestParameters(Request $request) {
        if(!$request->has('client_id'))
            return null;

        $data = [
            'client_id'    =>  $request->get('client_id'),
            'redirect_uri' =>  $request->get('redirect_uri'),
            'response_type'  =>  $request->get('response_type'),
            'scope' =>  $request->get('scope'),
            'state' =>  $request->get('state')
        ];

        session()->put('oauth', $data);

        return $data;
    }

    /**
     * Creating the login stage for the given email address by looking at Login Mechanisms
     * @param $email
     * @return void
     */
    public static function createStage($email) {
        $user = UserHelper::getWithEmail($email);

        $lms = new LoginMechanismsService($user);

        $login = $lms->getByUser();
        $twofa = $lms->getTwoFA();

        session()->put('loginStages', [
            'login'    =>  [
                'is_required'  =>  $login == null ? false : true,
                'is_complete'   =>  false
            ],
            'twofa'   =>  [
                'is_required'  =>  $twofa == null ? false : true,
                'is_compete'    =>  false
            ]
        ]);
    }

    public static function setLoggedInUser($email) {
        session()->put('loggedInUser', $email);
        self::setLoginComplete();
    }

    public static function getLoggedInUser() {
        if(session()->has('loggedInUser')) {
            return UserHelper::getWithEmail(session()->get('loggedInUser'));
        }

        return null;
    }

    public static function isTwofaRequired() {
        return session()->get('loginStages')['twofa']['is_required'];
    }

    public static function setLoginComplete() {
        $data = session()->get('loginStages');

        $data['login']['is_complete'] = true;

        session()->put('loginStages', $data);
    }

    public static function setTwofaComplete() {
        $data = session()->get('loginStages');

        $data['twofa']['is_complete'] = true;

        session()->put('loginStages', $data);
    }

    public static function areStagesComplete() {
        $data = session()->get('loginStages');

        $loginComplete = $data['login']['is_complete'];

        $twofaComplete = true;

        if($data['twofa']['is_required']) {
            dump('going here !');
            $twofaComplete = $data['twofa']['is_complete'];
        }

        return ($loginComplete && $twofaComplete);
    }

    public static function resetStages() {
        session()->remove('loginStages');
    }
}