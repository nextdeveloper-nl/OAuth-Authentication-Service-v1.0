<?php

namespace App\Grants;

use NextDeveloper\IAM\Database\Models\IamLoginMechanism;
use NextDeveloper\IAM\Database\Models\IamUser;
use NextDeveloper\IAM\Database\Models\LoginMechanisms;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Services\LoginMechanisms\AbstractLogin;
use NextDeveloper\IAM\Services\LoginMechanisms\ILoginService;

class Password extends AbstractLogin implements ILoginService
{
    const LOGINNAME = 'Password';

    public function create(Users $user) : LoginMechanisms
    {
        //  We will create a password login mechanism
    }

    public static function update(Users $user, $password) : LoginMechanisms
    {
        //  Here we will update the password hash of latest password mechanism
        //  We will be using Argos2 hash mechanism for this.
    }

    public static function getLatestMechanism(Users $user, $mechanismName) : LoginMechanisms
    {
        //  Here we return the latest Password mechanism
    }

    public function attempt(LoginMechanisms $mechanism, array $loginData): bool
    {
        // TODO: Implement attempt() method.
    }

    /**
     * Returns the identifier of the grant
     *
     * @return string grant type
     */
    public function getIdentifier()
    {
        return 'password';
    }

    public function generatePassword(LoginMechanisms $mechanism): string
    {
        // TODO: Implement generatePassword() method.
    }
}