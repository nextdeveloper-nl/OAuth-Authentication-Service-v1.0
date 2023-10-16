<?php

namespace App\Http\Controllers;

use App\Helpers\LoginResponse;
use App\Helpers\LoginSessionHelper;
use App\Services\LoginService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use NextDeveloper\IAM\Helpers\UserHelper;

class
RedirectController extends Controller
{
    public function redirect(Request $request) {
        $response = new LoginResponse();

        //  Parsing the variables
        $user = LoginSessionHelper::getLoggedInUser();

        if(session()->has('oauth')) {
            $id = \bin2hex(\random_bytes(40));

            $redirectTo = session()->get('oauth')['redirect_uri'] . '?code=' . $id;

            $code = Passport::authCode()->forceFill([
                'id'    =>  $id,
                'user_id'   =>  $user->id,
                'client_id' =>  session()->get('oauth')['client_id'],
                'scopes'    =>  '[]',
                'revoked'   =>  0,
                'expires_at'    =>  Carbon::now()->addMinutes(2)->timestamp
            ])->save();
        }
        else {
            $redirectTo = env('DEFAULT_REDIRECT_URI');
        }

        session()->remove('oauth');

        return redirect($redirectTo);
    }
}