<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

class PerformanceController extends Controller
{
    public function predictPerformance(Request $request)
    {
        // Datos de entrenamiento
        $trainingData = [
            [5, 90, 8, 95],  // [Tiempo de estudio, Asistencia, Calificación previa, Calificación actual]
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
        ];
        $targets = [58.35, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5];

        // Entrenamiento del modelo
        $regression = new SVR(Kernel::LINEAR);
        $regression->train($trainingData, $targets);

        // Ejemplo de predicción para un nuevo estudiante
        $newStudent = [12, 85, 90, 100];  // [Tiempo de estudio, Asistencia, Calificación previa]
        $predictedGrade = $regression->predict($newStudent);

        return response()->json($predictedGrade);
    }
}
