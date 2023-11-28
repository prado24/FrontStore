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


Route::middleware(['auth','Administrador'])->group(function(){
    //Blog
    Route::get('/productos/create',[ProductosController::class,'create'])->name('ProductosCreate');
    // Route::post('/blog',[EntradasController::class,'store'])->name('BlogStore');
    // Route::get('/blog/{blog}/edit', [EntradasController::class,'edit'])->name('BlogEdit');
    // Route::patch('/blog/{blog}', [EntradasController::class,'update'])->name('BlogUpdate');
    // Route::delete('/blog/{blog}', [EntradasController::class,'destroy'])->name('BlogDestroy');

    // //Anuncios
    // Route::get('/anuncios/create',[AnunciosController::class,'create'])->name('AnunciosCreate');
    // Route::post('/anuncios',[AnunciosController::class,'store'])->name('AnunciosStore');
    // Route::get('/anuncios/{anuncio}/edit',[AnunciosController::class,'edit'])->name('AnunciosEdit');
    // Route::patch('/anuncios/{anuncio}',[AnunciosController::class,'update'])->name('AnunciosUpdate');
    // Route::delete('/anuncios/{anuncio}',[AnunciosController::class,'destroy'])->name('AnunciosDestroy');

    
});

//auth
Route::get('/login',[UserController::class,'indexLogin'])->name('IndexLogin');
Route::post('/login',[UserController::class,'login'])->name('Login');
Route::get('/registro',[UserController::class,'indexRegistro'])->name('IndexRegistro');
Route::post('/registro',[UserController::class,'registro'])->name('Registro');
Route::post('/logout',[UserController::class,'logout'])->name('Logout');
