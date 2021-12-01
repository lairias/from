<?php

namespace App\Http\Controllers\Admin;

use exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Parametros;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;
use Illuminate\Support\Facades\Cache;

class ClientesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create', 'store');
        $this->middleware('can:admin.clientes.edit')->only('edit', 'update');
        $this->middleware('can:admin.clientes.show')->only('show', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/clientes");
        $clientes = json_decode($response->getBody());

        $estado = auth()->user()->est_user;
        $id = auth()->user()->id;

        if ($estado && !Parametros::TiempoPass($id)) {

        return view('admin.cliente.index', ['clientes' => $clientes]);

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
        $response = Http::get("http://localhost:3000/api/personascli");
        $personas = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado  && !Parametros::TiempoPass(auth()->user()->id) ) {

            return view('admin.cliente.create', ['personas' => $personas]);

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
            'nombre_empresa' => 'required|regex:/(^([a-zA-z\s]+)(\d+)?$)/u',
            'correo_electronico' => 'required|regex:/^.\S+@.+$/i',
            'descripción_contrato' => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            'fec_ini_contrato' => 'required|date|after:yesterday',
            'fec_fin_contrato' => 'required|date|after:today'
        ]);


        $response = Http::post('http://localhost:3000/api/clientes/',[
            "cod_persona" => $request['codigo_persona'],
            "nom_empresa" => $request['nombre_empresa'],
            "correo_electronico" => $request['correo_electronico'],
            "des_contrato" => $request['descripción_contrato'],
            "fec_ini_contrato" => $request['fec_ini_contrato'],
            "fec_fin_contrato" => $request['fec_fin_contrato'],
            "usr_registro" => auth()->user()->name,
        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return redirect()->route('admin.clientes.index')->with('info', 'Se registro el cliente con exito');

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
    public function edit($cliente)
    {
        $response = Http::get("http://localhost:3000/api/clientes/".$cliente);
        $clientes = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['cliente'] = $cliente;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {
            return view('admin.cliente.edit',['clientes' =>$clientes]);
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
    public function update(Request $request, $cliente)
    {


        $request->validate([
            'nombre_empresa' => 'required|regex:/(^([a-zA-z\s]+)(\d+)?$)/u',
            'correo_electronico' => 'required|regex:/^.\S+@.+$/i',
            'descripción_contrato' => 'required|regex:/(^([\w\s]+)(\s\d\w+)?$)/u',
            'fec_ini_contrato' => 'required|date',
            'fec_fin_contrato' => 'required|date'
        ]);

        $empleado = Http::put('http://localhost:3000/api/clientes/'. $cliente, [
            "nom_empresa" => $request['nombre_empresa'],
            "correo_electronico" => $request['correo_electronico'],
            "des_contrato" => $request['descripción_contrato'],
            "fec_ini_contrato" => $request['fec_ini_contrato'],
            "fec_fin_contrato" => $request['fec_fin_contrato'],
            "usr_registro" => auth()->user()->name,
            "des_baja" => $request['descripcion_baja'],
            "estado" =>  $request['est']
        ]);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {
            return redirect()->route('admin.clientes.index')->with('info', 'Se actualizo el cliente con exito');
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
    public function show($cliente)
    {
        $response = Http::get("http://localhost:3000/api/clientes/".$cliente);
        $clientes = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['cliente'] = $cliente;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {
            return view('admin.cliente.show', ['clientes' =>$clientes]);
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
    public function destroy($cliente)
    {
        $response = Http::delete('http://localhost:3000/api/clientes/'.$cliente,[
            "usr_registro" => auth()->user()->name
        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {
            return redirect()->route('admin.clientes.index')->with('info', 'Se elimino el cliente con exito');
        } else {
            return view('admin.inactivo.index');
        }
    }
}
