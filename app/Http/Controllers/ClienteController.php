<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        //
        return Cliente::all();
    }


    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 200);
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        Cliente::find($id)->update($request->all());
        return response()->json(['message'=>'actualizado', 'status'=>200]);
    }


    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return response()->json(['message'=>'Eliminado con exito', 'status'=>200]);

    }
}
