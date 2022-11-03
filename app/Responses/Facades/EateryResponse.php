<?php

namespace App\Responses\Facades;

use App\Events\SendResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Facade;

class EateryResponse extends Facade
{

    protected static function getFacadeAccessor()
    {
        $responseType=Event::dispatch(new SendResponse(),[],true);
        $responseClass='App\Responses\\'.$responseType.'\EateryResponse';
        return $responseClass;
    }

}
