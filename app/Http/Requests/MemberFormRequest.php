<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemberFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|',
            'last_name' => 'required|',
            'email' => 'required|email',
            'billing_address1' => 'required|',
            'billing_address2' => '',
            'billing_address3' => '',
            'billing_town' => 'required|',
            'billing_postcode' => 'required|',
            'rhif_ffon' => 'required|',
            'notes' => '',
        ];
    }
}
