<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use App\Http\Controllers\Parametros;

class RecursosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.recursos.index')->only('index');
        $this->middleware('can:admin.recursos.create')->only('create', 'store');
        $this->middleware('can:admin.recursos.edit')->only('edit', 'update');
        $this->middleware('can:admin.recursos.show')->only('show', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/recursos");
        $recursos = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.recurso.index', ['recursos' => $recursos]);

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
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.recurso.create');

        } else {
        return view('admin.inactivo.index');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "descripción_recurso" => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            "serie_recurso" =>'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            "almacen" => 'required|numeric',
            "cantidad" => 'required|numeric',
        ]);

        $respuesta = Http::post('http://localhost:3000/api/recursos/',[
            "des_recurso" => $request['descripción_recurso'],
            "serie_recurso" => $request['serie_recurso'],
            "almacen" => $request['almacen'],
            "cantidad" => $request['cantidad'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.recursos.index')->with('info', 'Se registro el recurso con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($recurso)
    {
        $response = Http::get("http://localhost:3000/api/recursos/".$recurso);
        $recursos = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['recurso'] = $recurso;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.recurso.edit',['recursos' =>$recursos]);

        } else {
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
    public function update(Request $request, $recurso)
    {
        $request->validate([
            "descripción_recurso" => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            "serie_recurso" =>'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            "almacen" => 'required|numeric',
        ]);

        $recurso = Http::put('http://localhost:3000/api/recursos/'.$recurso, [
            "des_recurso" => $request['descripción_recurso'],
            "serie_recurso" => $request['serie_recurso'],
            "almacen" => $request['almacen'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.recursos.index')->with('info', 'Se actualizo el recurso con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recurso)
    {
        $response = Http::get("http://localhost:3000/api/recursos/".$recurso);
        $recursos = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['recurso'] = $recurso;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.recurso.show', ['recursos' =>$recursos]);

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
    public function destroy($recurso)
    {
        $response = Http::delete('http://localhost:3000/api/recursos/'.$recurso,[
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.recursos.index')->with('info', 'Se elimino el recurso con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }
}
