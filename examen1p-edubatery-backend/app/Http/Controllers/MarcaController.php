<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        if ($marcas->isEmpty()) {
            return response()->json([
                'mensaje' => 'No hay marcas disponibles',
                'marcas' => $marcas,
            ], 404);
        }
        return response()->json([
            'mensaje' => 'Lista de marcas recuperada exitosamente',
            'marcas' => $marcas,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $resquest->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $marca = Marca::create($request->all());
        return response()->json([
            'mensaje' => 'Marca creada exitosamente',
            'marca' => $marca,
],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);
        if (!$marca) {
            return response()->json([
                'mensaje' => 'Marca no encontrada',
            ],404);
        }
        return response()->json([
            'mensaje' => 'Marca obtenida exitosamente',
            'marca' => $marca,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $id,
        ]);
        $marca = Marca::find($id);
        if (!$marca) {
            return response()->json([
                'mensaje' => 'Marca no encontrada',
            ], 404);
        }
        $marca->update($request->all());
        return response()->json([
            'mensaje' => 'Marca actualizada exitosamente',
            'marca' => $marca,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);
        if (!$marca) {
            return response()->json([
                'mensaje' => 'Marca no encontrada',
            ], 404);
        }
        $marca->delete();
        return response()->json([
            'mensaje' => 'Marca eliminada de manera exitosa',
        ],200);
    }
}
