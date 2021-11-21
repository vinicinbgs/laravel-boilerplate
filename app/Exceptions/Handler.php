<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Validation\ValidationException;

use Symfony\Component\HttpKernel\Exception\HttpException;

use App\Exceptions\ValidationException as RequestException;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        "current_password",
        "password",
        "password_confirmation",
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

    /**
     * @param Illuminate\Http\Request $request
     * @param \Throwable $exception
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return (new RequestException(
                $exception,
                $request->all()
            ))->render();
        }

        if ($exception instanceof HttpException) {
            return response()->json(
                [
                    "title" => "error",
                    "message" => $exception->getMessage(),
                    "code" => $exception->getStatusCode(),
                ],
                $exception->getStatusCode()
            );
        }

        return parent::render($request, $exception); // render custom exceptions
    }
}
