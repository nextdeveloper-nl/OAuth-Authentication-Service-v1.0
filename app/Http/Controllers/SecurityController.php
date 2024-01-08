<?php

namespace App\Http\Controllers;

use App\OAuth2\OAuthServer;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use NextDeveloper\Commons\Helpers\RandomHelper;

class SecurityController extends Controller
{
    public function csrf(Request $request) {
        return OAuthServer::getCsrf();
    }
}