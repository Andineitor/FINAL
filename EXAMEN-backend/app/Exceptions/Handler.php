<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
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

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
   /**
 * Register the exception handling callbacks for the application.
 *
 * @return void
 */
public function register()
{
    $this->reportable(function (Throwable $e) {
        
    });

    $this->renderable(function (Throwable $e, $request) {
        if ($e instanceof ModelNotFoundException) {
            return response()->json(["res" => false, "error" => "Error de modelo"], 400);
        }

        if ($e instanceof QueryException) {
            return response()->json(["res" => false, "message" => "Error de consulta BDD " , $e->getMessage()], 500);
        }

        if ($e instanceof HttpException) {
            return response()->json(["res" => false, "message" => "Error de ruta"], $e->getStatusCode());
        }

        if ($e instanceof AuthenticationException) {
            return response()->json(["res" => false, "message" => "Error de autenticación"], 401);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json(["res" => false, "message" => "Error de autorización, no tiene permisos"], 403);
        }
    });
}

}
