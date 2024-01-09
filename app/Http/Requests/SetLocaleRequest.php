<?php

namespace App\Http\Requests;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class SetLocaleRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'locale'              => 'required|exists:common_languages,code'
        ];
    }
}