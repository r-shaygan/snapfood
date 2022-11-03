<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Eatery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EateryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Eatery  $eatery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Eatery $eatery)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        if($user->is_validate)
            return false;
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Eatery  $eatery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Eatery $eatery)
    {
        if( $eatery->seller_id!=$user->id)
            return false;
        return true;
    }

    public function delete(Admin $user, Eatery $eatery)
    {
        if(!Auth::guard('admin')->check())
            return false;
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Eatery  $eatery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Eatery $eatery)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Eatery  $eatery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Eatery $eatery)
    {
        //
    }
}
