<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */


    public function update(User $user, Address $address)
    {
        return $address->user->id == Auth::user()->id;
    }

    public function delete(User $user, Address $address)
    {
        return $address->user->id == Auth::user()->id;
    }

    public function restore(User $user, Address $address)
    {
        //
    }

    public function forceDelete(User $user, Address $address)
    {
        //
    }
}
