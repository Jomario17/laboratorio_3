<?php

namespace App\Http\Controllers;

class AcademicController extends Controller
{
    public function courses()
    {
        logger('CONTROLLER: consultando cursos');

        /*
        |--------------------------------------------------------------------------
        | EXPERIMENTO 5 - LATENCIA ARTIFICIAL
        |--------------------------------------------------------------------------
        | 500000 microsegundos = 500 milisegundos
        
        usleep(500000);
        */

        return response()->json([
            'courses' => [
                'Programación Web 2',
                'Arquitectura de Software',
                'Bases de Datos'
            ]
        ]);
    }
}