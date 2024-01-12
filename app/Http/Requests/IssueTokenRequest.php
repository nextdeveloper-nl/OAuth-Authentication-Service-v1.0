<?php

namespace App\Http\Requests;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class IssueTokenRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'grant_type'   => 'required|in:authorization_code',
            'code'         => 'required|string',
            'redirect_uri'  =>  'string',
            'code_verifier' =>  'string',
            'client_id'     =>  'required|string|exists:oauth_clients,id',
            'client_secret' =>  'required|string|exists:oauth_clients,secret'
        ];
    }
}