<?php

namespace App\Http\Controllers\ThirdParty;

use App\Grants\GithubLogin;
use App\Helpers\LoginResponse;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use NextDeveloper\IAM\Services\UsersService;

class GithubController extends Controller
{
    public function signIn() {
        return Socialite::driver('github')->redirect();
    }

    public function login() {
        try {
            $socialUser = Socialite::driver('github')->stateless()->user();

            $user = UsersService::getByEmail($socialUser->email);

            (new GithubLogin())->create($user);

            $response = new LoginResponse();

            $response->setIsLoggedIn(true);

            session([
                'isLoggedIn' => true,
                'user_id'   =>  $user->id
            ]);

            return redirect('/login');
        } catch (Exception $e) {
            Log::error('[GithubController@login] We got an error with the github response. Response: '
                . $e->getMessage());

            return redirect('/login?error=Cannot login with github login.');
        }
    }
}