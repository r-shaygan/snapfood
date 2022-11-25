<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ActionNotAllowedException extends HttpException
{
    public function __construct(string $message = 'Action Not Allowed', \Throwable $previous = null, int $code = 405, array $headers = [])
    {
        parent::__construct(405, $message, $previous, $headers, $code);
    }

    public function render($request)
    {
        return $this->shouldReturnJson($request)
            ? $this->prepareJsonResponse($request)
            : $this->prepareResponse($request);
    }

    protected function shouldReturnJson($request)
    {
        return $request->expectsJson();
    }


    protected function prepareJsonResponse($request)
    {
        return new JsonResponse(['message'=>$this->message],$this->code);
    }

}
