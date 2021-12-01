<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Parametros;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


    public function index(){

         $respuesta3 = Http::get('http://localhost:3000/api/seguridad/1');
         $seguridad3 =  json_decode($respuesta3->getBody());
        if(Parametros::TiempoPass(auth()->user()->id)){

            return view('admin.inactivo.pass', ['id' => auth()->user()->id])->with('seguridad3', $seguridad3);

        } else if (auth()->user()->est_user) {
            return view('admin.index');
        } else {
            return view('admin.inactivo.index', ['id' => auth()->user()->id])->with('seguridad3', $seguridad3);
        }


    }
}
