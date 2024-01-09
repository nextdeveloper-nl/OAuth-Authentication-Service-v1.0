<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetLocaleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    private $defaultLocale = 'en';

    public function index(Request $request) {
        $locale = session()->get('locale') ?? App::getLocale();

        return [
            'locale'    =>  $locale
        ];
    }

    public function setLocale(SetLocaleRequest $request) {
        $locale = $request->validated();

        App::setLocale($locale['locale']);

        session([
            'locale'    =>  App::getLocale()
        ]);

        return [
            'locale'    =>  $locale
        ];
    }
}