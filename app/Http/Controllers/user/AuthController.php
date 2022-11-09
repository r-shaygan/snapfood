<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $user=User::create($request->all());
        $token=$user->createToken('userAuthToken')->plainTextToken;
        return response([$user,$token],201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return[
            'message'=>'logged Out'
        ];
    }
}
