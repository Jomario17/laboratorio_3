<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TraceRequest
{
    public function handle(Request $request, Closure $next): Response
    {
        // Generar identificador único para la petición
        $traceId = (string) Str::uuid();

        // Registrar entrada al middleware
        logger('TRACE - INICIO', [
            'trace_id' => $traceId
        ]);

        // Continuar con el pipeline
        $response = $next($request);

        // Agregar el Trace ID a la respuesta
        $response->headers->set('X-Trace-Id', $traceId);

        // Registrar regreso de la respuesta
        logger('TRACE - FINAL', [
            'trace_id' => $traceId
        ]);

        return $response;
    }
}