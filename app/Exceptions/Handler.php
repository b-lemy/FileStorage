<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];


    protected $dontReport = [
        //
    ];


    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


//    public function register()
//    {
//        $this->reportable(function (Throwable $e) {
//            //
//        });
//    }

    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Object not found'], status: 404);
            }
        });
    }
}
