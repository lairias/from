<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Parametros;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('can:admin.users.index');
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.show')->only('show', 'destroy');

    }

    public function index()
    {
        $roles = Role::all();
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.roles.index', compact('roles'));

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function create()
    {
        $permissions = Permission::all();
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.roles.create', compact('permissions'));

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required','unique:roles','regex:/^[a-zA-Z0-9]{8,20}$/']
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creo con exito');

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function show(Role $role)
    {
        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.roles.show', compact('role'));

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return view('admin.roles.edit', compact('role', 'permissions'));

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se actualizo con exito');

        } else {
            return view('admin.inactivo.index');
        }
        
    }

    public function destroy(Role $role)
    {
        $role->delete();

        $estado = auth()->user()->est_user;

        if ($estado && !Parametros::TiempoPass(auth()->user()->id)) {

        return redirect()->route('admin.roles.index')->with('info', 'El rol se elimino con exito');

        } else {
            return view('admin.inactivo.index');
        }
        
    }
}
