<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Admin\UserController;
use App\Http\Controllers\Panel\Admin\DashboardController;
use App\Http\Controllers\Panel\Admin\FornecedorController;
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
    
    Route::resource('fornecedor',FornecedorController::class);
    // Rota do usuario 
    Route::resource('user',UserController::class);
});
