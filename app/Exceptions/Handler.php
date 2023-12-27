<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            if ($statusCode === 404 || $statusCode === 401 || $statusCode === 403 ) {
                return response()->view('error', ['statusCode' => $statusCode], $statusCode);
            }
        }
    
        try {
            throw $exception;
        } catch (AuthorizationException $e) {
            return response()->view('error', [], 403);
        } catch (Throwable $e) {
            return parent::render($request, $e);
        }
    }
}
