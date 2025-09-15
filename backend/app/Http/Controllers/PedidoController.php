<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Pedido::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $pedido = Pedido::create($request->all());
        return response()->json($pedido, 201); // Return 201 Created with the new resource
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Pedido::findOrFail($id); // Return 404 if not found
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        return response()->json($pedido, 200); // Return updated resource
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pedido::destroy($id);
        return response()->json(null, 204); // Return 204 No Content
    }
}
