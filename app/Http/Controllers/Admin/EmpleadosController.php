<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use App\Http\Controllers\Parametros;

class EmpleadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.empleados.index')->only('index');
        $this->middleware('can:admin.empleados.create')->only('create', 'store');
        $this->middleware('can:admin.empleados.edit')->only('edit', 'update');
        $this->middleware('can:admin.empleados.show')->only('show', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/empleados");
        $empleados = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.empleado.index', ['empleados' => $empleados]);

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
        $response = Http::get("http://localhost:3000/api/personasemp");
        $personas = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.empleado.create', ['personas' => $personas]);

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
            'codigo_persona' => 'required',
            'estado_empleado' => 'required',
            'tipo_empleado' => 'required',
            'horas_trabajadas' => 'required|numeric',
            'descripción_contrato' => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            'fec_ini_contrato' => 'required|date|after:yesterday',
            'fec_fin_contrato' => 'required|date|after:tomorrow'
        ]);

        $response = Http::post('http://localhost:3000/api/empleados/',[
            "cod_persona" => $request['codigo_persona'],
            "estado_empleado" => $request['estado_empleado'],
            "tipo_empleado" => $request['tipo_empleado'],
            "hrstrab_emp" => $request['horas_trabajadas'],
            "des_contrato" => $request['descripción_contrato'],
            "fec_ini_contrato" => $request['fec_ini_contrato'],
            "fec_fin_contrato" => $request['fec_fin_contrato'],
            "usr_registro" => auth()->user()->name
        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.empleados.index')->with('info', 'Se registro el empleado con exito');

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
    public function edit($empleado)
    {
        $response = Http::get("http://localhost:3000/api/empleados/".$empleado);
        $empleados = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['empleado'] = $empleado;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.empleado.edit',['empleados' =>$empleados]);

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
    public function update(Request $request, $empleado)
    {
        $request->validate([
            'estado_empleado' => 'required',
            'tipo_empleado' => 'required',
            'horas_trabajadas' => 'required|numeric',
            'descripción_contrato' => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            'fec_ini_contrato' => 'required|date',
            'fec_fin_contrato' => 'required|date'
        ]);

        $response = Http::put('http://localhost:3000/api/empleados/'. $empleado, [
            "estado_empleado" => $request['estado_empleado'],
            "tipo_empleado" => $request['tipo_empleado'],
            "hrstrab_emp" => $request['horas_trabajadas'],
            "des_contrato" => $request['descripción_contrato'],
            "fec_ini_contrato" => $request['fec_ini_contrato'],
            "fec_fin_contrato" => $request['fec_fin_contrato'],
            "usr_registro" => auth()->user()->name,
            "des_baja" => $request['descripcion_baja'],
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.empleados.index')->with('info', 'Se actualizo el empleado con exito');

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
    public function show($empleado)
    {
        $response = Http::get("http://localhost:3000/api/empleados/".$empleado);
        $empleados = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['empleado'] = $empleado;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.empleado.show', ['empleados' =>$empleados]);

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
    public function destroy($empleado)
    {
        $response = Http::delete('http://localhost:3000/api/empleados/'.$empleado,[
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.empleados.index')->with('info', 'Se elimino el empleado con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }
}
