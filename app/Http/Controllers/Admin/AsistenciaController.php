<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Parametros;
use Illuminate\Support\facades\Http;


class AsistenciaController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');

    //     //$this->middleware('can:admin.users.index');
    //     $this->middleware('can:admin.asistencia.index')->only('index');
    //     $this->middleware('can:admin.asistencia.edit')->only('edit', 'update');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/empleados");
        $empleados = json_decode($response->getBody());
        $response = Http::get("http://localhost:3000/api/asistencia");
        $asistencias = json_decode($response->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return view('admin.asistencia.index', ['empleados' => $empleados, 'asistencias'=>$asistencias]);
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
        return view('admin.asistencia.create');
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

        $request->validate([
'cod_empleado' =>  'required',
'estado_asistencia' =>  'required',
'horas_asistidas' =>  'required',
'fecha_asistencia' =>  'required',
        ]);

        $response = Http::post('http://localhost:3000/api/asistencia/', [

          "cod_empleado" => $request['cod_empleado'],
            "asistencia" => $request['estado_asistencia'],
            "des_asistencia" => $request['excusa'],
            "hrs_asistidas" => $request['horas_asistidas'],
            "fec_asistencia" => $request['fecha_asistencia'],
            "usr_registro" =>  auth()->user()->name

        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return redirect()->route('admin.asistencia.index')->with('info', 'Se registro el empleado con exito');
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
    public function edit($empleado)
    {
        $response = Http::get("http://localhost:3000/api/empleados/" . $empleado);
        $empleados = json_decode($response->getBody()->getContents())[0];

        $data = [];
        $data['empleado'] = $empleado;

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

            return view('admin.asistencia.edit', ['empleados' => $empleados]);
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
    public function update(Request $request, $id)
    {
        //
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
