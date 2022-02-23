<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->middleware('auth')->group(function(){
    
    Route::prefix('usuarios')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('dashboard.users');
        Route::get('/cadastro', [UserController::class, 'create'])->name('dashboard.users.create');
        Route::get('/{user}', [UserController::class, 'show'])->name('dashboard.users.show');
        Route::get('/{user}/editar', [UserController::class, 'edit'])->name('dashboard.users.edit');
    
        Route::post('/', [UserController::class, 'store'])->name('dashboard.users.store');
    
        Route::delete('/', [UserController::class, 'destroy'])->name('dashboard.users.destroy');
        Route::put('/', [UserController::class, 'update'])->name('dashboard.users.update');

        Route::get('{id}/permissoes',[UserController::class,'permissions'])->name('dashboard.users.permissions');
        Route::put('{user}/permissoes/update',[UserController::class,'permissionsUpdate'])->name('dashboard.users.permissions.update');
        Route::get('{id}/funcoes',[UserController::class,'roles'])->name('dashboard.users.roles');
    });

    Route::prefix('permissoes')->group(function(){
        Route::get('/',[PermissionController::class,'index'])->name('dashboard.permissions');
        Route::get('/{id}/editar',[PermissionController::class,'edit'])->name('dashboard.permissions.edit');
        Route::get('/criar',[PermissionController::class,'create'])->name('dashboard.permissions.create');
        Route::get('/{id}',[PermissionController::class,'show'])->name('dashboard.permissions.show');
        Route::put('/',[PermissionController::class,'update'])->name('dashboard.permissions.update');
        Route::post('/',[PermissionController::class,'store'])->name('dashboard.permissions.store');
        Route::delete('/',[PermissionController::class,'destroy'])->name('dashboard.permissions.destroy');
  
    });

    Route::prefix('funcoes')->group(function(){
        Route::get('/',[RoleController::class,'index'])->name('dashboard.roles');
        Route::get('/{id}/editar',[RoleController::class,'edit'])->name('dashboard.roles.edit');
        Route::get('/criar',[RoleController::class,'create'])->name('dashboard.roles.create');
        Route::get('/{id}',[RoleController::class,'show'])->name('dashboard.roles.show');
        Route::put('/',[RoleController::class,'update'])->name('dashboard.roles.update');
        Route::post('/',[RoleController::class,'store'])->name('dashboard.roles.store');
        Route::delete('/',[RoleController::class,'destroy'])->name('dashboard.roles.destroy');
  
    });


});
