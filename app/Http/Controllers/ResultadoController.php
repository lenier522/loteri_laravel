<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    // Obtener todos los resultados
    public function index()
    {
        $resultados = Resultado::all();
        return response()->json($resultados);
    }

    // Obtener un resultado específico por ID
    public function show($id)
    {
        $resultado = Resultado::find($id);
        if ($resultado) {
            return response()->json($resultado);
        } else {
            return response()->json(['message' => 'Resultado no encontrado'], 404);
        }
    }

    // Crear un nuevo resultado
    public function store(Request $request)
    {
        $request->validate([
            'fijo' => 'required|string',
            'corrido' => 'required|string',
            'session' => 'required|string|in:día,noche',
            'estado' => 'required|string|in:completo,en espera',
            'fecha' => 'required|string',
        ]);

        $fijos = array_map('trim', explode(',', $request->input('fijo')));
        $corridos = array_map('trim', explode(',', $request->input('corrido')));

        if (count($fijos) !== count($corridos)) {
            return response()->json(['message' => 'La cantidad de valores en fijo y corrido debe ser igual'], 400);
        }

        $resultados = [];

        foreach ($fijos as $index => $fijo) {
            $resultado = Resultado::create([
                'fijo' => $fijo,
                'corrido' => $corridos[$index],
                'session' => $request->input('session'),
                'estado' => $request->input('estado'),
                'fecha' => $request->input('fecha'),
            ]);

            $resultados[] = $resultado;
        }

        return response()->json($resultados, 201);
    }


    // Actualizar un resultado existente
    public function update(Request $request, $id)
    {
        $resultado = Resultado::find($id);

        if ($resultado) {
            $resultado->update($request->all());
            return response()->json($resultado);
        } else {
            return response()->json(['message' => 'Resultado no encontrado'], 404);
        }
    }

    // Eliminar un resultado
    public function destroy($id)
    {
        $resultado = Resultado::find($id);

        if ($resultado) {
            $resultado->delete();
            return response()->json(['message' => 'Resultado eliminado']);
        } else {
            return response()->json(['message' => 'Resultado no encontrado'], 404);
        }
    }

    // Obtener los últimos 10 resultados
    public function latest()
    {
        $resultados = Resultado::orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($resultados);
    }
}
