<?php

namespace App\Http\Controllers\ThirdParty;

use App\Grants\GoogleLogin;
use App\Helpers\LoginResponse;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use NextDeveloper\IAM\Services\UsersService;

class GoogleController extends Controller
{
    public function signIn() {
        return Socialite::driver('google')->redirect();
    }

    public function login() {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = UsersService::getByEmail($googleUser->email);

            (new GoogleLogin())->create($user);

            $response = new LoginResponse();

            $response->setIsLoggedIn(true);

            session([
                'isLoggedIn' => true,
                'user_id'   =>  $user->id
            ]);

            return redirect('/login');
        } catch (Exception $e) {
            Log::error('[GoogleController@login] We got an error with the google response. Response: '
                . $e->getMessage());

            return redirect('/login?error=Cannot login with google login.');
        }
    }
}