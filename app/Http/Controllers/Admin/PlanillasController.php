<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use App\Http\Controllers\Parametros;

class PlanillasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.planillas.index')->only('index');
        $this->middleware('can:admin.planillas.create')->only('create', 'store');
        $this->middleware('can:admin.planillas.edit')->only('edit', 'update');
        $this->middleware('can:admin.planillas.show')->only('show', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/planilla");
        $planillas = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.planilla.index', ['planillas' => $planillas]);

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

        return view('admin.planilla.create', ['empleados' => $empleados]);

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

        // dd($request->all());
        $request->validate([
            "codigo_empleado" => 'required',
            "monto_pago" => 'required|numeric',
            "ihss" => 'required',
            "rap" => 'required',
            "vales" => 'required|numeric',
            "fec_pago_planilla" => 'required|date|after:yesterday'
        ]);


        $response = Http::post('http://localhost:3000/api/planilla/',[
            "cod_empleado" => $request['codigo_empleado'],
            "mon_pago" => $request['monto_pago'],
            "ihss" => $request['ihss'],
            "rap" => $request['rap'],
            "vales" => $request['vales'],
            "fec_pago_planilla" => $request['fec_pago_planilla'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.planillas.index')->with('info', 'Se registro el pago a empleado con exito');

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
    public function edit($planilla)
    {
        $response = Http::get("http://localhost:3000/api/planilla/".$planilla);
        $planillas = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['planilla'] = $planilla;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.planilla.edit',['planillas' =>$planillas]);

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
    public function update(Request $request, $planilla)
    {
        $request->validate([
            "monto_pago" => 'required|numeric',
            "ihss" => 'required',
            "rap" => 'required',
            "vales" => 'required|numeric',
            "fec_pago_planilla" => 'required|date'
        ]);

        $response = Http::put('http://localhost:3000/api/planilla/'. $planilla, [
            "mon_pago" => $request['monto_pago'],
            "ihss" => $request['ihss'],
            "rap" => $request['rap'],
            "vales" => $request['vales'],
            "fec_pago_planilla" => $request['fec_pago_planilla'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.planillas.index')->with('info', 'Se Actualizo el pago a empleado con exito');

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
    public function show($planilla)
    {
        $response = Http::get("http://localhost:3000/api/planilla/".$planilla);
        $planillas = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['planilla'] = $planilla;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.planilla.show', ['planillas' =>$planillas]);

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
    public function destroy($planilla)
    {
        $response = Http::delete('http://localhost:3000/api/planilla/'.$planilla,[
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado) {

        return redirect()->route('admin.planillas.index')->with('info', 'Se elimino el pago a empleado con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }
}
