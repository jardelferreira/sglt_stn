<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard.users');
    Route::get('/usuarios/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('dashboard.users.show');
    Route::get('/usuarios/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('dashboard.users.edit');
    
    Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/usuarios/cadastro', [App\Http\Controllers\UserController::class, 'create'])->name('dashboard.users.create');
    
    Route::delete('/usuarios/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('dashboard.users.destroy');
    Route::put('/usuarios/update', [App\Http\Controllers\UserController::class, 'update'])->name('dashboard.users.update');
    
});
