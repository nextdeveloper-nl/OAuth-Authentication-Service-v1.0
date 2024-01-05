<?php

namespace App\Services;

class SecurityService
{
    public static function checkCSRF($csrf) {
        $csrfToken = session()->get('csrf');

        if($csrfToken != $csrf) {
            return false;
        }

        return true;
    }
}