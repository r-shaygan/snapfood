<?php

namespace App\Http\Controllers;

use App\Exceptions\RecordExistsException;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use App\Responses\Facades\AddressResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        return AddressResponse::index(Auth::user()->addresses);
    }

    public function store(AddressRequest $request)
    {
        $request->addressExists();
        $address=Address::create($request->all()+['user_id'=>Auth::id()]);
        return AddressResponse::store($address);
    }

    public function setDefault(Address $address)
    {
        $success=$this->isUserAddress($address) && Auth::user()->update(['default_address'=>$address->id]);
        return AddressResponse::setDefault($success,Auth::user()->defaultAddress);
    }

    public function update(AddressRequest $request, Address $address)
    {
        $request->addressExists();
        $success=$this->isUserAddress($address->id) && $address->update($request->all());
        return AddressResponse::update($success);
    }

    public function destroy(Address $address)
    {
        $success=$this->isUserAddress($address->id) && $address->delete();
        return AddressResponse::destroy($success);
    }

    public function isUserAddress($address)
    {
        return $address->user->id == Auth::user()->id;
    }
}
