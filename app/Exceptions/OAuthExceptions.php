<?php

namespace App\Exceptions;

use League\OAuth2\Server\Exception\OAuthServerException;
use NextDeveloper\I18n\Helpers\i18n;
use Throwable;

class OAuthExceptions extends OAuthServerException
{
    public static function invalidSession($hint = null, Throwable $previous = null)
    {
        $errorMessage = I18n::t('The request is missing a required parameter, includes an invalid parameter value, ' .
            'includes a parameter more than once, or is otherwise malformed.');

        $hint = ($hint === null) ? null : $hint;

        return new static($errorMessage, 3, 'invalid_request', 400, $hint, null, $previous);
    }

    public static function clientNotAvailable($hint = null, Throwable $previous = null) {
        $errorMessage = I18n::t('The requested client does not exists. Please make sure that you are providing ' .
            'correct client_id and client_secret.');

        $hint = ($hint === null) ? null : $hint;

        return new static($errorMessage, 3, 'invalid_request', 400, $hint, null, $previous);
    }

    public static function authCodeNotValid($hint = null, Throwable $previous = null) {
        $errorMessage = I18n::t('The authorization code is not valid. It may have been expired, since we have ' .
            'very small time window for validating and taking the authorization code. Also you may have been ' .
            'providing really wrong authorization code.');

        $hint = ($hint === null) ? null : $hint;

        return new static($errorMessage, 3, 'invalid_request', 400, $hint, null, $previous);
    }
}