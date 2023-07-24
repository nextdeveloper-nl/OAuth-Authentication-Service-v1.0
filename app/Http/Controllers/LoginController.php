<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('layouts.login');
    }

    public function getLogins(Request $request) {
        $csrfToken = session()->get('csrf');

        if($csrfToken == $request->get('csrf')) {
            return json_encode([
                'logins'    =>  [
                    'one-time-email',
                    'login-with-password'
                ]
            ]);
        }

        return null;
    }
}