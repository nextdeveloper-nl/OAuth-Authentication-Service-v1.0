<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Random;
use NextDeveloper\Commons\Helpers\RandomHelper;

class SecurityController extends Controller
{
    public function csrf(Request $request) {
        $csrfUuid = RandomHelper::uuid();

        session([
            'csrf'  =>  $csrfUuid
        ]);

        return $csrfUuid;
    }
}