<?php

use App\Http\Controllers\ProductController;
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

Route::view('/', 'index');
Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/pdf/{product_id}', [ProductController::class, 'create_pdf'])->name('product.pdf');
