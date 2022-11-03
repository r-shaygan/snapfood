<?php

namespace App\Responses\Facades;

use App\Events\SendResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Facade;

class EateryTypeResponse extends Facade
{

    protected static function getFacadeAccessor()
    {
        $responseType=Event::dispatch(new SendResponse(),[],true);
        $responseClass='App\Responses\\'.$responseType.'\EateryTypeResponse';
        return $responseClass;
    }

}
