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
        $this->authorize('update',$address);
        $success=Auth::user()->update(['default_address'=>$address->id]);
        return AddressResponse::setDefault($success,Auth::user()->defaultAddress);
    }

    public function update(AddressRequest $request, Address $address)
    {
        $request->addressExists();
        $this->authorize('update',$address);
        return AddressResponse::update( $address->update($request->all()));
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete',$address);
        return AddressResponse::destroy($address->delete());
    }
}
