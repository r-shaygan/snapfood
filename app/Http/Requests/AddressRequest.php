<?php

namespace App\Http\Requests;

use App\Exceptions\RecordExistsException;
use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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

    public function addressExists()
    {
        $address=Address::where('address_long', $this->address_long)
            ->where('address_lat', $this->address_lat)
            ->where('user_id', Auth::user()->id)
            ->exists();
        if ($address)
            throw new RecordExistsException('This Address Is Already Registered For This User!');
    }
}
