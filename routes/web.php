<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
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

Route::get('/point-of-sale', [PosController::class, 'index'])->name('pos.point-of-sale');
Route::get('/products-pos/{query}', [PosController::class, 'product'])->name('pos.get-product');
Route::post('/save-pos/', [PosController::class, 'save'])->name('pos.save');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/add-portfolio', [PortfolioController::class, 'add'])->name('portfolio.add');
Route::post('/save-portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');

Route::get('/products', [ProductController::class, 'index'])->name('pos.product');
Route::get('/add-product', [ProductController::class, 'add'])->name('product.add');
Route::post('/save-product', [ProductController::class, 'save'])->name('product.save');



Route::get('/category', [SettingController::class, 'category'])->name('setting.category');
Route::post('/add-category', [SettingController::class, 'addCategory'])->name('setting.category.add');
