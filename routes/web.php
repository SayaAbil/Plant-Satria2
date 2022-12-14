<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanamanController;


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

Route::get('/', [TanamanController::class, 'index'])->name('index');
Route::post('/create', [TanamanController::class, 'store']);
Route::delete('/delete/{id}',[TanamanController::class,'destroy'])->name('delete');
Route::get('/edit/{tanaman:id}',[TanamanController::class,'edit'])->name('edit.index');
Route::patch('/edit/{tanaman:id}',[TanamanController::class,'update'])->name('edit');


