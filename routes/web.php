<?php
use Illuminate\Support\Facades\App;

use App\Http\Controllers\GeneratePdf;
use App\Http\Controllers\ExcelExportControllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/personas-pdf',[GeneratePdf::class, 'PDFPersonas'])->name('print.personas');
Route::get('/empleados-pdf',[GeneratePdf::class, 'PDFEmpleados'])->name('print.empleados');
Route::get('/clientes-pdf',[GeneratePdf::class, 'PDFClientes'])->name('print.clientes');
Route::get('/registros-pdf',[GeneratePdf::class, 'PDFRegistros'])->name('print.registros');
Route::get('/recursos-pdf',[GeneratePdf::class, 'PDFRecursos'])->name('print.recursos');
Route::get('/planilla-pdf',[GeneratePdf::class, 'PDFPlanilla'])->name('print.planilla');


Route::get('/personas-ecxel',[ExcelExportControllers::class, 'CSVPersonas'])->name('csv.personas');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');