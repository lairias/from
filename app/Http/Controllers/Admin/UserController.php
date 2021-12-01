<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Parametros;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('can:admin.users.index');
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = Http::get('http://localhost:3000/api/users');

        $users = json_decode($respuesta->getBody());

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.users.index',['users' => $users]);

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
        $roles = Role::all();
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.users.create', ['roles' => $roles]);

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
            'nombre' => 'required',
            'correo' => 'required',
            'pass' => 'required',
            'rol' => 'required',
        ]);

        Http::post('http://localhost:3000/api/users', [

            "name" =>$request['nombre'],
            "email" => $request['correo'] ,
            "password" => bcrypt( $request['pass']),
            "rol_id" => $request['rol']

        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.users.index');

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
    public function show(Request $request, User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $respuesta = Http::get('http://localhost:3000/api/roles/'. $user->id);
        $rol = json_decode($respuesta->getBody());

        $roles = Role::all();
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.users.edit', compact('user', 'roles','rol'));

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
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        Http::put('http://localhost:3000/api/users/'. $user->id, [
            'cod'=> $user->id,
            'Estado' => $request->est
        ]);
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignaron los cambios correctamente');

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
    public function destroy(Request $request, User $user)
    {
        //
    }
}
