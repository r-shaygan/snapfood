<?php

namespace App\Observers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressObserver
{

    public function created(Address $address)
    {
        Auth::user()->update(['default_address'=>$address->id]);
    }

    public function deleting(Address $address)
    {
        $default=Auth::user()->addresses->where('id','!=',$address->id)->first();
        Auth::user()->update(['default_address'=>$default? $default->id: null]);
    }
}
