<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//index
Route::get('/',[ProductosController::class,'index'])->name('index');

//nosotros
Route::get('/nosotros',function(){
    return view('nosotro.index');
})->name('nosotros');

//productos
Route::get('/productos{productos}/show',[ProductosController::class,'show'])->name('ProductosShow');


Route::middleware(['auth','admin'])->group(function(){
    //prodcutos
    Route::get('/productos/create',[ProductosController::class,'create'])->name('ProductosCreate');
    Route::post('/productos',[ProductosController::class,'store'])->name('ProductosStore');
    Route::get('/productos/{productos}/edit', [ProductosController::class,'edit'])->name('ProductosEdit');
    Route::patch('/productos/{productos}', [ProductosController::class,'update'])->name('ProductosUpdate');
    Route::delete('/productos/{productos}', [ProductosController::class,'destroy'])->name('ProductosDestroy');
});

//auth
Route::get('/login',[UserController::class,'indexLogin'])->name('IndexLogin');
Route::post('/login',[UserController::class,'login'])->name('Login');
Route::get('/registro',[UserController::class,'indexRegistro'])->name('IndexRegistro');
Route::post('/registro',[UserController::class,'registro'])->name('Registro');
Route::post('/logout',[UserController::class,'logout'])->name('Logout');
