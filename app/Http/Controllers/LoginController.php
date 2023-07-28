<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NextDeveloper\IAM\Database\Models\IamLoginMechanism;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\IAM\Services\IamLoginMechanismService;
use NextDeveloper\IAM\Services\IamUserService;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('layouts.login');
    }

    public function getLogins(Request $request) {
        $csrfToken = session()->get('csrf');

        if($csrfToken == $request->get('csrf')) {
            $user = IamUserService::getByEmail( $request->get('email') );

            $loginMechanisms = IamLoginMechanismService::getByUser($user);

            $logins = [];

            foreach ($loginMechanisms as $mechanism) {
                $logins['logins'][] = $mechanism->login_mechanism;
            }

            return json_encode($logins);
        }

        return null;
    }
}