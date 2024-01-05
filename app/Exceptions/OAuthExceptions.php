<?php

namespace App\Exceptions;

use League\OAuth2\Server\Exception\OAuthServerException;
use Throwable;

class OAuthExceptions extends OAuthServerException
{
    public static function invalidSession($hint = null, Throwable $previous = null)
    {
        $errorMessage = 'The request is missing a required parameter, includes an invalid parameter value, ' .
            'includes a parameter more than once, or is otherwise malformed.';

        $hint = ($hint === null) ? null : $hint;

        return new static($errorMessage, 3, 'invalid_request', 400, $hint, null, $previous);
    }
}