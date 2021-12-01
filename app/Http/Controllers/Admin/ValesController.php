<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Parametros;
use Illuminate\Support\Facades\Http;

class ValesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/vales");
        $vales = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return view('admin.vale.index', ['vales' => $vales]);
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
        $response = Http::get("http://localhost:3000/api/empleados");
        $empleados = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.vale.create', ['empleados' => $empleados]);

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
            'codigo_empleado' => 'required',
            'vale' => 'required|numeric',
            'fecha_vale' => 'required|date'
        ]);

        $response = Http::post('http://localhost:3000/api/vales/',[
            "cod_empleado" => $request['codigo_empleado'],
            "vales" => $request['vale'],
            "fecha_vale" => $request['fecha_vale'],
            "usr_registro" => auth()->user()->name
        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.vales.index')->with('info', 'Se registro el vale con exito');

        } else {
            return view('admin.inactivo.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vale)
    {
        $response = Http::get("http://localhost:3000/api/vales/".$vale);
        $vales = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['vale'] = $vale;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.vale.show', ['vales' =>$vales]);

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
    public function edit($vale)
    {
        $response = Http::get("http://localhost:3000/api/vales/".$vale);
        $vales = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['vale'] = $vale;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.vale.edit',['vales' =>$vales]);

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
    public function update(Request $request, $vale)
    {
        $request->validate([
            'vale' => 'required|numeric',
            'fecha_vale' => 'required|date'
        ]);

        $response = Http::put('http://localhost:3000/api/vales/'. $vale, [
            "vales" => $request['vale'],
            "fecha_vale" => $request['fecha_vale'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.vales.index')->with('info', 'Se actualizo el vale con exito');

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
    public function destroy($vale)
    {
        $response = Http::delete('http://localhost:3000/api/vales/'.$vale,[
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.vales.index')->with('info', 'Se elimino el vale con exito');

        } else {
            return view('admin.inactivo.index');
        }
    }
}
