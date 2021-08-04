<?php

use App\Http\Controllers\bookController;
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

Route::prefix('product')->group(function (){
    Route::get('/list',[bookController::class,'index'])->name('product.index');
    Route::get('/create',[bookController::class,'create'])->name('product.create');
    Route::post('/createProduct',[bookController::class,'store'])->name('product.store');
    Route::get('/update/{id}',[bookController::class,'edit'])->name('product.edit');
    Route::post('/updateProduct/{id}',[bookController::class,'update'])->name('product.update');
    Route::get('/delete/{id}',[bookController::class,'destroy'])->name('product.delete');
});

