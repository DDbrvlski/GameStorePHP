<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProductsController;
use App\Models\Developer;
use Illuminate\Support\Facades\Route;

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

//Strona główna
Route::get('/', [HomeController::class, "index"]);

//Gatunek
Route::get('/genre', [GenreController::class, "index"]);
Route::get('/genre/edit/{id}', [GenreController::class, "edit"]);
Route::post('/genre/update/{id}', [GenreController::class, "update"]);
Route::get('/genre/delete-details/{id}', [GenreController::class, "delete_details"]);
Route::get('/genre/delete/{id}', [GenreController::class, "delete"]);
Route::get('/genre/details/{id}', [GenreController::class, "details"]);
Route::get('/genre/create', [GenreController::class, "create"]);
Route::post('/genre/create', [GenreController::class, "addToDB"]);

//Platforma
Route::get('/platform', [PlatformController::class, "index"]);
Route::get('/platform/edit/{id}', [PlatformController::class, "edit"]);
Route::post('/platform/update/{id}', [PlatformController::class, "update"]);
Route::get('/platform/delete-details/{id}', [PlatformController::class, "delete_details"]);
Route::get('/platform/delete/{id}', [PlatformController::class, "delete"]);
Route::get('/platform/details/{id}', [PlatformController::class, "details"]);
Route::get('/platform/create', [PlatformController::class, "create"]);
Route::post('/platform/create', [PlatformController::class, "addToDB"]);

//Producent
Route::get('/developer', [DeveloperController::class, "index"]);
Route::get('/developer/edit/{id}', [DeveloperController::class, "edit"]);
Route::post('/developer/update/{id}', [DeveloperController::class, "update"]);
Route::get('/developer/delete-details/{id}', [DeveloperController::class, "delete_details"]);
Route::get('/developer/delete/{id}', [DeveloperController::class, "delete"]);
Route::get('/developer/details/{id}', [DeveloperController::class, "details"]);
Route::get('/developer/create', [DeveloperController::class, "create"]);
Route::post('/developer/create', [DeveloperController::class, "addToDB"]);

//Klienci
Route::get('/clients', [ClientsController::class, "index"]);
Route::get('/clients/edit/{id}', [ClientsController::class, "edit"]);
Route::post('/clients/update/{id}', [ClientsController::class, "update"]);
Route::get('/clients/delete-details/{id}', [ClientsController::class, "delete_details"]);
Route::get('/clients/delete/{id}', [ClientsController::class, "delete"]);
Route::get('/clients/details/{id}', [ClientsController::class, "details"]);
Route::get('/clients/create', [ClientsController::class, "create"]);
Route::post('/clients/create', [ClientsController::class, "addToDB"]);

//Zamówienia
Route::get('/orders', [OrdersController::class, "index"]);
Route::get('/orders-preview/{id}', [OrdersController::class, "index_preview"]);
Route::get('/orders-preview/details/{id}', [OrdersController::class, "details_preview"]);
Route::get('/orders/edit/{id}', [OrdersController::class, "edit"]);
Route::post('/orders/update/{id}', [OrdersController::class, "update"]);
Route::get('/orders/delete-details/{id}', [OrdersController::class, "delete_details"]);
Route::get('/orders/delete/{id}', [OrdersController::class, "delete"]);
Route::get('/orders/details/{id}', [OrdersController::class, "details"]);
Route::get('/orders/create', [OrdersController::class, "create"]);
Route::post('/orders/create', [OrdersController::class, "addToDB"]);
Route::get('/orders/search', [OrdersController::class, "search"]);

//Produkty
Route::get('/products', [ProductsController::class, "index"]);
Route::get('/products-preview', [ProductsController::class, "index_preview"]);
Route::get('/products-preview/details/{id}', [ProductsController::class, "details_preview"]);
Route::get('/products/edit/{id}', [ProductsController::class, "edit"]);
Route::post('/products/update/{id}', [ProductsController::class, "update"]);
Route::get('/products/delete-details/{id}', [ProductsController::class, "delete_details"]);
Route::get('/products/delete/{id}', [ProductsController::class, "delete"]);
Route::get('/products/details/{id}', [ProductsController::class, "details"]);
Route::get('/products/create', [ProductsController::class, "create"]);
Route::post('/products/create', [ProductsController::class, "addToDB"]);
Route::get('/products/search', [ProductsController::class, "search"]);