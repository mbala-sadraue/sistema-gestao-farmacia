<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Admin\UserController;
use App\Http\Controllers\Panel\Admin\ItensController;
use App\Http\Controllers\Panel\Admin\ProdutoController;
use App\Http\Controllers\Panel\Admin\DashboardController;
use App\Http\Controllers\Panel\Admin\FornecedorController;
use App\Http\Controllers\Panel\Vendedor\VendaController;
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
    
    Route::resource('produto',ProdutoController::class);
    Route::resource('fornecedor',FornecedorController::class);
    Route::resource('itens',ItensController::class);
    Route::get('/itens/detail/{id}',[ItensController::class,'detailsItem'])->name('itens.detail');
    Route::post('/itens/update-estoque',[ItensController::class,'addNewEstoque'])->name('intes.addnewestoque');
    Route::get('/venda/create',[VendaController::class,'create'])->name('venda.create');
    // Rota do usuario 
    Route::resource('user',UserController::class);
});
Route::prefix('admin')->group(function(){

    Route::get('/itens/serach-by-code/{codProduto}',[ItensController::class,'searchItemBycode'])->name('intes.searchProdutoBycode');
});
