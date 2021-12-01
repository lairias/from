<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GeneratePdf extends Controller
{
    public function PDFPersonas(){
        $response = Http::get("http://localhost:3000/api/personas");
        $personas = json_decode($response->getBody());
        $titulo="Reporte Personas";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.personas' ,compact('personas' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }

    public function PDFEmpleados(){
        $response = Http::get("http://localhost:3000/api/empleados");
        $empleados = json_decode($response->getBody());
        $titulo="Reporte empleados";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.empleados' ,compact('empleados' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }
    public function PDFClientes(){
        $response = Http::get("http://localhost:3000/api/clientes");
        $clientes = json_decode($response->getBody());
        $titulo="Reporte clientes";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.clientes' ,compact('clientes' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }
    public function PDFRegistros(){
        $response = Http::get("http://localhost:3000/api/registro");
        $registros = json_decode($response->getBody());
        $titulo="Reporte Registros";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.registros' ,compact('registros' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }
    public function PDFRecursos(){
        $response = Http::get("http://localhost:3000/api/recursos");
        $recursos = json_decode($response->getBody());
        $titulo="Reporte Recursos";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.recursos' ,compact('recursos' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }
    public function PDFPlanilla(){
        $response = Http::get("http://localhost:3000/api/planilla");
        $planillas = json_decode($response->getBody());
        $titulo="Reporte Planillas";
        $nombre = auth()->user()->name;
        $rol = Auth::user()->roles->implode('name', '');

   $pdf = \PDF::loadView('Reports.planilla' ,compact('planillas' , 'titulo','rol','nombre'));
   
     return $pdf->stream();
        return $pdf->download('primvberpdf.pdf');
        // return view('Reports.personas');
    }
}
