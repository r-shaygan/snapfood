<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $user=User::create($request->all());
        $token=$user->createToken('userAuthToken')->plainTextToken;
        return response([$user,$token],201);
    }

    public function login(LoginRequest $request)
    {
        $user=User::where('email',$request->email)->where('password',$request->password)->first();
        if(!$user)
            return Response(['bad creds'],401);
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
