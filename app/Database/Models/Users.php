<?php

namespace App\Database\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Users extends \NextDeveloper\IAM\Database\Models\Users implements Authenticatable
{
    protected $rememberTokenName = 'remember_token';

    public function getAuthIdentifierName()
    {
        return 'uuid';
    }

    public function getAuthIdentifier()
    {
        return $this->uuid;
    }

    public function getAuthPassword()
    {
        return '';
    }

    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
}