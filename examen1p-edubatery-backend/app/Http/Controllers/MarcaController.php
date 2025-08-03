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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
