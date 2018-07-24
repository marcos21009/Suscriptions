<?php

namespace Modules\Suscriptions\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateProductRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name'=>'required:min2'
        ];
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
        return [
            'name.required' => trans('suscription::messages.name is required'),
            'name.min2'=>trans('suscription::messages.name is min 2')
        ];
    }
}
