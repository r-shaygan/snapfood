<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EateryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'phone'=>['required','regex:/^09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}$/'],
            'address_long'=>'required|numeric|between:0,99.99',
            'address_lat'=>'required|numeric|between:0,99.99',
            'address_text'=>'required',
            'deliveryCost'=>'required|integer',
            'credit'=>'required|numeric',
            'image'=>'sometimes|required|mimes:jpg,bmp,png|max:1024',
            'edit_image'=>'mimes:jpg,bmp,png|max:1024'
        ];
    }
}
