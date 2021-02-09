<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{


    public function store(Request $request)
    {
        $servicio = Servicio::create($request->all());
        return response()->json($servicio, 200);
    }


    public function show($id)
    {
        $sql=DB::table('clientes')->Join('servicios','clientes.id', '=' ,'servicios.cliente_id')->where('servicios.cliente_id', '=', $id)->get();
        return response()->json($sql);

    }

}
