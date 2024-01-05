<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function index(Request $request) {
        //  Here we will check the session and then redirect the user to related place.
        return view('layouts.welcome');
    }
}