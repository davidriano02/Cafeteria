<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VenderController;

use App\Http\Controllers\VentasController;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>['auth']],function(){
Route::resource('productos',ProductoController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('ventas',VentasController::class);
Route::resource('vender',VenderController::class);
Route::resource('clientes',ClienteController::class);
   // Rutas de VenderController
  

Route::post('/terminarOCancelarVenta', [VenderController::class, 'terminarOCancelarVenta'])->name('terminarOCancelarVenta');;
Route::post('/agregarProductoVenta', [VenderController::class, 'agregarProductoVenta'])->name('agregarProductoVenta');;
Route::delete('/agregarProductoVenta', [VenderController::class, 'quitarProductoDeVenta'])->name('quitarProductoDeVenta');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



