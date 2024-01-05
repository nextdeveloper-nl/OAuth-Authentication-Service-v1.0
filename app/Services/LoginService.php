<?php

namespace App\Services;

use App\Grants\OneTimeEmail;
use NextDeveloper\IAM\Services\LoginMechanismsService;
use NextDeveloper\IAM\Services\UsersService;

class LoginService
{
    public static function checkUserLogin($email, $password, $mechanism) {
        $user = UsersService::getByEmail( $email );

        $lms = new LoginMechanismsService($user);
        $loginMechanism = $lms->getMechanismByName($mechanism);

        switch ($loginMechanism->login_mechanism) {
            case 'OneTimeEmail':
                return (new OneTimeEmail())->attempt($loginMechanism, $password);
                break;
        }

        return false;
    }

    public static function hasTwoFA($email) {
        return self::getTwoFA($email) != null;
    }

    public static function getTwoFA($email) {
        $user = UsersService::getByEmail( $email );
        $lms = new LoginMechanismsService($user);

        $twoFA = $lms->getTwoFA();
    }

    public static function getReturnUri() {
        if(session()->has('oauth')) {
            return session()->get('oauth')['redirect_uri'];
        }

        return env('DEFAULT_REDIRECT_URI');
    }

}