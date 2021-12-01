<?php

namespace App\Http\Controllers\Admin;

use exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Parametros;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use Illuminate\Support\Facades\Cache;


class ParametrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.parametros.index')->only('index');
        $this->middleware('can:admin.parametros.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = Http::get('http://localhost:3000/api/seguridad/parametros/1');
        $seguridad = json_decode($respuesta->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            Cache::flush();
            return view('admin.parametro.index', compact('seguridad'));


        } else {
            return view('admin.inactivo.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = Http::get('http://localhost:3000/api/seguridad/' . $id);
        $seguridad = json_decode($respuesta->getBody());


        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return view('admin.parametro.edit', compact('seguridad'));

        } else {
            Cache::flush();
            return view('admin.inactivo.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $request->validate([
            'Parametro' => 'required|regex:/\S/',
        ]);

        Http::put('http://localhost:3000/api/seguridad/upparametro/' . $id, [
            "dato" => $request['Parametro'],
            "nombre" => $request['Nombre_parametro'],
        ]);


        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return redirect()->route('admin.parametros.index');

        } else {
            return view('admin.inactivo.index');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
