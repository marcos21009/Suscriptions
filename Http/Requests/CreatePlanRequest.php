<?php

namespace Modules\Suscriptions\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePlanRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'code'=>'required',
          'frequency'=>'required',
          'bill_cycle'=>'required',
          'product_id'=>'required|exists:suscriptions__products,id',

        ];
    }

    public function translationRules()
    {
        return [
          'name'=>'required|min:2'
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
        return [];
    }
}
