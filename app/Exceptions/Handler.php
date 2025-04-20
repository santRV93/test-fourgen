<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
        //
    }

    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'error',
                'message' => $this->getErrorMessage($exception),
                'errors' => $this->getValidationErrors($exception),
            ], $this->getStatusCode($exception));
        }

        return parent::render($request, $exception);
    }

    protected function getStatusCode(Throwable $e)
    {
        if ($e instanceof AuthenticationException) {
            return 401;
        }

        if ($e instanceof ValidationException) {
            return 422;
        }

        if ($e instanceof NotFoundHttpException) {
            return 404;
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return 405;
        }

        return 500;
    }

    protected function getErrorMessage(Throwable $e)
    {
        if ($e instanceof AuthenticationException) {
            return 'You are not logged, please login';
        }

        if ($e instanceof ValidationException) {
            return 'Validate data not found';
        }

        if ($e instanceof NotFoundHttpException) {
            return 'Route not found';
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return 'HTTP method not allowed.';
        }
        echo $e;
        return 'Internal error';
    }
    
    protected function getValidationErrors(Throwable $e)
    {
        return $e instanceof ValidationException
            ? $e->errors()
            : null;
    }
}
