<?php

namespace App\Http\Requests;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class GetLoginsRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email'              => 'required|email|string|max:255',
            'new_account'         => 'boolean'
        ];
    }
}