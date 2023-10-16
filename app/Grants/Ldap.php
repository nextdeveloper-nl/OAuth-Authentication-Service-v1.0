<?php

namespace App\Grants;

class Ldap implements ILoginService
{
    public function attempt()
    {
        // TODO: Implement attempt() method.
    }

    public function __construct($configuration, $loginData)
    {
    }
}