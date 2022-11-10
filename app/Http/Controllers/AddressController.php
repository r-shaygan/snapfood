<?php

namespace App\Http\Controllers;

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
        return AddressResponse::index(Address::where('user_id',Auth::user()->id)->get());
    }

    public function store(AddressRequest $request)
    {
        $address=!$this->addressExists($request);
        $address && $address=Address::create($request->all()+['user_id'=>Auth::user()->id]);
        return AddressResponse::store($address);
    }

    public function setDefault($id)
    {
        $success=$this->isUserAddress($id) && User::find(Auth::user()->id)->update(['default_address'=>$id]);
        return AddressResponse::setDefault($success);
    }

    public function update(AddressRequest $request, Address $address)
    {
        $success=$this->isUserAddress($address->id) && $address->update($request->all());
        return AddressResponse::update($success);
    }

    public function destroy(Address $address)
    {
        $success=$this->isUserAddress($address->id) && $address->delete();
        return AddressResponse::destroy($success);
    }

    public function addressExists(AddressRequest $request)
    {
       return Address::where('address_long', $request->address_long)
            ->where('address_lat', $request->address_lat)
            ->where('user_id', Auth::user()->id)
            ->exists();
    }

    public function isUserAddress($id)
    {
        return Address::find($id)->user_id == Auth::user()->id;
    }
}
