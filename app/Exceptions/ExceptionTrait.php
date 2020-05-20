<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiExceptions($request, $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response([
                "errors" => "Model not found for the Product"
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response([
                "errors" => "URL not found"
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}
