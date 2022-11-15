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
        return $address ? response(['address'=>AddressResource::make($address), 'status' => 'address added sucsessfull'], 201)
            : response(['status' => 'This address already exist'], 401);
    }

    public function setDefault($success,$default)
    {
        return $success ? response([
            'default'=>AddressResource::make($default),
            'message' => 'address is set as default successfully'], 201)
            : response(['message' => 'invalid information'], 401);
    }

    public function update($success)
    {
        return $success ? response(['status' => 'address updated successfully'], 201)
            : response(['status' => 'invalid information'], 401);
    }

    public function destroy($success)
    {
        return $success ? response(['status' => 'address deleted successfully'], 201)
            : response(['status' => 'invalid information'], 401);
    }


}
