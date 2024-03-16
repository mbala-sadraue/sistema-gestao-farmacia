<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Admin\UserController;
use App\Http\Controllers\Panel\Admin\DashboardController;

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



Route::middleware('auth','role:administrador')->get("/", [DashboardController::class,'index']);
Route::middleware('auth','role:administrador')->prefix('admin')->group(function(){
    
    Route::get("/", [DashboardController::class,'index'])->name('admin.dashboard');
    /*
    |ROUTA DE USUARIOS
    */
    Route::resource('user',UserController::class);
});
