<?php

namespace App\Http\Controllers;

use App\Helpers\LoginResponse;
use App\Helpers\LoginSessionHelper;
use App\Services\LoginService;
use App\Services\SecurityService;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Bridge\AuthCodeRepository;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Passport;
use League\OAuth2\Server\Grant\AuthCodeGrant;
use NextDeveloper\Commons\Helpers\OAuthHelper;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\IAM\Services\LoginMechanisms\OneTimeEmail;
use NextDeveloper\IAM\Services\LoginMechanismsService;
use NextDeveloper\IAM\Services\UsersService;

class TwofaController extends Controller
{
    public function index(Request $request) {
        //  Here we will run 2FA
        if(!LoginSessionHelper::isTwofaRequired())
            return redirect('/redirect');

        return view('layouts.twofa');
    }

    public function loginUser(Request $request) {

    }
}