<?php

namespace App\Responses\Json;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\AddressResource;

class AddressResponse
{
    public function index($addresses)
    {
        return ['addresses' => AddressResource::collection($addresses)];
    }

    public function store($address)
    {
        return $address ? response(['address'=>AddressResource::make($address), 'message' => 'Address Added Sucsessfully'], 201)
            : response(['message' => 'SomeThing Went Wrong!'], 401);
    }

    public function setDefault($success,$default)
    {
        return $success ? response([
            'default'=>AddressResource::make($default),
            'message' => 'Address Set As Default Successfully'], 201)
            : response(['message' => 'SomeThing Went Wrong!'], 401);
    }

    public function update($success)
    {
        return $success ? response(['message' => 'Address Updated Successfully'], 201)
            : response(['message' => 'SomeThing Went Wrong!'], 401);
    }

    public function destroy($success)
    {
        return $success ? response(['message' => 'Address Deleted Successfully'], 201)
            : response(['message' => 'SomeThing Went Wrong!'], 401);
    }


}
