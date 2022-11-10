<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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

    public function rules()
    {
        return [
            'address_text'=>'required|min:10|max:100',
            'address_long'=>'required|between:-90,90',
            'address_lat'=>'required|between:-180,180'
        ];
    }
}
