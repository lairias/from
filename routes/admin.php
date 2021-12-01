<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\PersonasController;
use App\Http\Controllers\Admin\RecursosController;
use App\Http\Controllers\Admin\UserPassController;
use App\Http\Controllers\Admin\BitacorasController;
use App\Http\Controllers\Admin\EmpleadosController;
use App\Http\Controllers\Admin\PlanillasController;
use App\Http\Controllers\Admin\RegistrosController;
use App\Http\Controllers\Admin\RespaldosController;
use App\Http\Controllers\Admin\AsistenciaController;
use App\Http\Controllers\Admin\ParametrosController;
use App\Http\Controllers\Admin\UserPassTimeController;
use App\Http\Controllers\Admin\ValesController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('vales', ValesController::class)->names('admin.vales');

Route::resource('asistencia', AsistenciaController::class)->only('index', 'edit', 'update','create','store')->names('admin.asistencia');

Route::resource('parametros', ParametrosController::class)->only('index', 'edit', 'update','create','store')->names('admin.parametros');

Route::resource('userspasstime', UserPassTimeController::class)->only('edit', 'update')->names('admin.passwordtime');

Route::resource('userspass', UserPassController::class)->only('edit', 'update')->names('admin.password');

Route::resource('users', UserController::class)->only('index', 'edit', 'update','create','store')->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('bitacoras', BitacorasController::class)->names('admin.bitacoras');

Route::resource('respaldos', RespaldosController::class)->names('admin.respaldos');

Route::resource('personas', PersonasController::class)->names('admin.personas');
Route::resource('empleados', EmpleadosController::class)->names('admin.empleados');
Route::resource('clientes', ClientesController::class)->names('admin.clientes');
Route::resource('registros', RegistrosController::class)->names('admin.registros');
Route::resource('recursos', RecursosController::class)->names('admin.recursos');
Route::resource('planillas', PlanillasController::class)->names('admin.planillas');
