<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
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

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Se lanzan errores personalizados
    public function render($request, Throwable $e)
    {
        switch ($e) {
            case ($e instanceof ModelNotFoundException):
                return response()->json([
                    "message" => "El modelo al que quiere acceder no existe.",
                    "error" => $e->getMessage()
                ], 404);
                break;

            case ($e instanceof AuthenticationException):
                return response()->json([
                    "message" => "Debe iniciar sesión.",
                    "error" => $e->getMessage()
                ], 401);
                break;

            case ($e instanceof MethodNotAllowedHttpException):
                return response()->json([
                    "message" => "El método actual no es compatible con esta ruta.",
                    "error" => $e->getMessage()
                ], 405);
                break;

            case ($e instanceof NotFoundHttpException):
                return response()->json([
                    "message" => "El recurso no se encuentra.",
                    "error" => $e->getMessage()
                ], 404);
                break;

            case ($e instanceof QueryException):
                return response()->json([
                    "message" => "La conexión con la base de datos se ha interrumpido.",
                    "error" => $e->getMessage()
                ], 500);
                break;

            default:
                break;
        }

        return parent::render($request, $e);
    }
}
