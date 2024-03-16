<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login',[LoginController::class,'showFormLogin'])->name('login');
Route::post('/login',[LoginController::class,'loginIn'])->name('login.sign-in');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');
Route::get('/verify',[LoginController::class,'verify']);
