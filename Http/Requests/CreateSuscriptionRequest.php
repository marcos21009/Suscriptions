<?php

namespace Modules\Suscriptions\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSuscriptionRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'plan_id'=>'required|exists:suscriptions__plans,id',

        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
