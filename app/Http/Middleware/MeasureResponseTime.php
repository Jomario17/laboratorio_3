<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeasureResponseTime
{
    public function handle(Request $request, Closure $next): Response
    {
        logger('TIMER - INICIO');

        // Tiempo inicial
        $start = microtime(true);

        // Continuar con el pipeline
        $response = $next($request);

        // Calcular tiempo transcurrido en milisegundos
        $elapsed = (microtime(true) - $start) * 1000;

        // Agregar tiempo a la respuesta
        $response->headers->set(
            'X-Response-Time',
            round($elapsed, 2) . ' ms'
        );

        logger('TIMER - FINAL', [
            'time_ms' => round($elapsed, 2)
        ]);

        return $response;
    }
}