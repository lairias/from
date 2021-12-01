<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use App\Http\Controllers\Parametros;

class RegistrosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $this->middleware('can:admin.registros.index')->only('index');
        $this->middleware('can:admin.registros.create')->only('create', 'store');
        $this->middleware('can:admin.registros.edit')->only('edit', 'update');
        $this->middleware('can:admin.registros.show')->only('show', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/registro");
        $registros = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.registro.index', ['registros' => $registros]);

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

        $response2 = Http::get("http://localhost:3000/api/clientes");
        $clientes = json_decode($response2->getBody());

        $response3 = Http::get("http://localhost:3000/api/recursos");
        $recursos = json_decode($response3->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.registro.create', ['empleados' => $empleados, 'clientes' => $clientes,'recursos' => $recursos]);

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
      

        
       $recursos = $request['recursos'];
                foreach($recursos as $recurso){

                    Http::post('http://localhost:3000/api/registro/',[
                "cod_empleado" => $request['codigo_empleado'],
                "cod_cliente" => $request['codigo_cliente'],
                "cod_recurso" => $recurso,
                "fec_asignado" => $request['fec_asignado'],
                "turno_asignado" => $request['turno_asignado'],
                "usr_registro" => auth()->user()->name
            ]);
                    }
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.registros.index')->with('info', 'Se almaceno el registro diario con exito');

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
    public function edit($registro)
    {
        $response = Http::get("http://localhost:3000/api/registro/".$registro);
        $registros = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['registro'] = $registro;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.registro.edit',['registros' =>$registros]);

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
    public function update(Request $request, $registro)
    {
        $request->validate([
            "fec_asignado" => 'required|date',
            "turno_asignado" => 'required'
        ]);
        $response = Http::put('http://localhost:3000/api/registro/'. $registro, [
            "cod_empleado" => $request['codigo_empleado'],
            "cod_cliente" => $request['codigo_cliente'],
            "cod_recurso" => $request['codigo_recurso'],
            "fec_asignado" => $request['fec_asignado'],
            "turno_asignado" => $request['turno_asignado'],
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.registros.index')->with('info', 'Se actualizo el registro diario con exito');

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
    public function show($registro)
    {
        $response = Http::get("http://localhost:3000/api/registro/".$registro);
        $registros = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['registro'] = $registro;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.registro.show', ['registros' =>$registros]);

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
    public function destroy($registro)
    {
        $response = Http::delete('http://localhost:3000/api/registro/'.$registro,[
            "usr_registro" => auth()->user()->name
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.registros.index')->with('info', 'Se elimino el registro diario con exito');

        } else {
            return view('admin.inactivo.index');
        }

    }
}
