<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Http;

class BitacorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create', 'store');
        $this->middleware('can:admin.clientes.edit')->only('edit', 'update');
        $this->middleware('can:admin.clientes.show')->only('show', 'destroy');
    }
    public function index()
    {
        $response = Http::get("http://localhost:3000/api/bitacoras");
        $bitacoras = json_decode($response->getBody());
        
        $estado = auth()->user()->est_user;

        if ($estado) {

            return view('admin.bitacora.index', ['bitacoras' => $bitacoras]);

        } else {
            return view('admin.inactivo.index');
        }
        
    }
}
