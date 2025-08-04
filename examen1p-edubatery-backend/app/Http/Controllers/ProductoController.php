<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $productos = Producto::all();
        if ($productos->isEmpty()) {
            return response()->json([
                'mensaje' => 'No hay productos disponibles',
                'productos' => $productos,
            ], 404);
        }
        return response()->json([
            'mensaje' => 'Lista de productos recuperada exitosamente',
            'productos' => $productos,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'marca_id' => 'required|exists:marcas,id',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $producto = Producto::create($request->all());
        return response()->json( [
            'mensaje' => 'Producto creado exitosamente',
            'producto' => $producto,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $producto = Producto::find($id);
        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado',
            ],404);
        }
        return response()->json([
            'mensaje' => 'Producto obtenido exitosamente',
            'producto' => $producto,
        ],200);
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
