<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class Parametros extends Controller
{
  public static function Sidebar()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/13');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {

      $dato =   $seguri->dato;
    }
    if ($dato == 'si') {
      return true;
    } else {
      return false;
    }
  }
  public static function BarraTop()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/18');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {

      $dato =   $seguri->dato;
    }
    if ($dato == 'si') {
      return true;
    } else {
      return false;
    }
  }
  public static function ModoOscuro()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/17');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {

      $dato =   $seguri->dato;
    }
    if ($dato == 'si') {
      return true;
    } else {
      return false;
    }
  }
  public static function TiempoTokenCorreo()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/2');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function MaxInput()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/3');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function MinInput()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/4');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function MinInputPass()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/5');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function MaxInputPass()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/6');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function Correo_espacio()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/9');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function Nombre_empresa()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/10');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function Nombre_Header($id)
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/' . $id);
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function Datos($id)
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/' . $id);
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {
      $dato =   $seguri->dato;
    }
    return $dato;
  }
  public static function IVM()
  {
    $respuesta = Http::get('http://localhost:3000/api/seguridad/19');
    $respuesta2 = Http::get('http://localhost:3000/api/seguridad/21');
    $seguridad = json_decode($respuesta->getBody());
    foreach ($seguridad as $seguri) {$IVM =   $seguri->dato;}

    $seguridad2 = json_decode($respuesta2->getBody());
    foreach ($seguridad2 as $seguri) {$SALARIO =   $seguri->dato;}
    return $SALARIO * $IVM;
  }

  public static function EFM()
  {
    $respuesta1 = Http::get('http://localhost:3000/api/seguridad/20');
    $respuesta2 = Http::get('http://localhost:3000/api/seguridad/21');

    $seguridad1 = json_decode($respuesta1->getBody());
    foreach ($seguridad1 as $seguri) {
      $EFM =   $seguri->dato;
    }

    $seguridad2 = json_decode($respuesta2->getBody());
    foreach ($seguridad2 as $seguri) {
      $SALARIO =   $seguri->dato;
    }
    return $SALARIO * $EFM;
  }

  public static function  TiempoPass($id)
{


    //Peticiones a la Api
    $respueta = Http::get('http://localhost:3000/api/seguridad/');
    $respueta2 = Http::get('http://localhost:3000/api/users/fechaPass/' . $id);

    //Asignaciones de la respuestas
    $seguridad = $respueta->json();
    $seguridad2 = $respueta2->json();

    foreach ($seguridad as $seguri) {
      $fecha_sistema = $seguri["fecha_sis"];
      break;
    }

    foreach ($seguridad2 as $seguri) {
      $fecha_pass = $seguri["fecha_pass"];
      break;
    }

    if ($fecha_sistema >= $fecha_pass) {
      return true;
    } else {
      return false;
    }
}
}