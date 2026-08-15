<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireClientKey
{
    public function handle(Request $request, Closure $next): Response
    {
        logger('KEY - Validando credencial');

        $clientKey = $request->header('X-Lab-Key');

        // No se envió la credencial
        if ($clientKey === null) {
            logger('KEY - Credencial ausente');

            return response()->json([
                'message' => 'Credencial requerida'
            ], 401);
        }

        // Se envió una credencial incorrecta
        if ($clientKey !== 'PW2-2026') {
            logger('KEY - Credencial incorrecta');

            return response()->json([
                'message' => 'Credencial incorrecta'
            ], 403);
        }

        logger('KEY - Credencial correcta');

        return $next($request);
    }
}