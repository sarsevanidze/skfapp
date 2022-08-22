<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('customer', [CustomersController::class, 'getUser']);
Route::get('customers', [CustomersController::class, 'all']);
Route::get('orders', [OrdersController::class, 'all']);
Route::get('order/{id}', [OrdersController::class, 'getByOrderId']);
Route::get('syncorders', [OrdersController::class, 'syncorders']);
