<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::resource('products', ProductController::class);

// Route::get('/products',[ProductController::class, 'index']);
// 

//PUBLIC REGISTER ROUTE
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

//PRODUCT PUBLIC ROUTES
Route::get('/products',[ProductController::class, 'index']);
Route::get('/products/{id}',[ProductController::class, 'show']);
Route::get('/products/search/{name}',[ProductController::class, 'search']);

//CUSTOMER PUBLIC ROUTES
Route::get('/customers',[CustomerController::class, 'index']);
Route::get('/customers/{id}',[CustomerController::class, 'show']);
Route::get('/customers/search/{firstname}',[CustomerController::class, 'search']);


// INVOICE PUBLIC ROUTES
Route::get('/invoices',[InvoiceController::class, 'index']);
Route::get('/invoices/{id}',[InvoiceController::class, 'show']);




// PROTECTED ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth Route
    Route::post('/logout',[AuthController::class, 'logout']);


    // Product Protected Routes
    Route::post('/products',[ProductController::class, 'store'])->name('product.store');
    Route::put('/products/{id}',[ProductController::class, 'update']);
    Route::delete('/products/{id}',[ProductController::class, 'destroy']);


    // Customer Protected Routes
    Route::post('/customers',[CustomerController::class, 'store']);
    Route::put('/customers/{id}',[CustomerController::class, 'update']);
    Route::delete('/customers/{id}',[CustomerController::class, 'destroy']);


    // Invoice Protected Routes
    Route::post('/invoices',[InvoiceController::class, 'store']);
    Route::put('/invoices/{id}',[InvoiceController::class, 'update']);
    Route::delete('/invoices/{id}',[InvoiceController::class, 'destroy']);
});






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
