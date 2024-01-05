<?php

namespace App\Http\Controllers\ThirdParty;

use App\Grants\LinkedinLogin;
use App\Helpers\LoginResponse;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use NextDeveloper\IAM\Services\UsersService;

class LinkedinController extends Controller
{
    public function signIn() {
        return Socialite::driver('linkedin')->redirect();
    }

    public function login() {
        try {
            $socialUser = Socialite::driver('linkedin')->stateless()->user();

            $user = UsersService::getByEmail($socialUser->email);

            (new LinkedinLogin())->create($user);

            $response = new LoginResponse();

            $response->setIsLoggedIn(true);

            session([
                'isLoggedIn' => true,
                'user_id'   =>  $user->id
            ]);

            return redirect('/login');
        } catch (Exception $e) {
            Log::error('[LinkedinController@login] We got an error with the google response. Response: '
                . $e->getMessage());

            return redirect('/login?error=Cannot login with linkedin login.');
        }
    }
}