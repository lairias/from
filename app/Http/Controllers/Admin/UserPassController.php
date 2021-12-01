<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Parametros;


class UserPassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.users.edit.password')->only('edit', 'update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $respuesta = Http::get('http://localhost:3000/api/users/'. $id);
        $respuesta3 = Http::get('http://localhost:3000/api/seguridad/1');
        $seguridad3 = json_decode($respuesta3->getBody());
        $users = json_decode($respuesta->getBody());

        return view('admin.password.edit', ['users'=>$users])->with('seguridad3', $seguridad3);
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
        $data=request();


            $request->validate([
                'password' => ['required', 'regex:/^[a-zA-Z0-9\_\-\@]{8,20}$/'],
                'current_password' => ['required', 'regex:/^[a-zA-Z0-9\_\-\@]{8,20}$/']

            ]);
            if ($data['password'] == $data['current_password']) {

                Http::put('localhost:3000/api/users/password_now/' . $id, [
                    'pass' => Hash::make($data['password']),
                ]);
                return redirect()->route('admin.password.edit', $id)->with('info', 'La contraseña se actualizo con exito');
            } else {

                return redirect()->route('admin.password.edit', $id)->with('danger', 'La contraseña no coinciden');
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
