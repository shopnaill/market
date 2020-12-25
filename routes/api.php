<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post('/order_api/{id}/{user}', [App\Http\Controllers\ApiController::class, 'create_order'])->name('order.api');
    Route::post('/login_api', [App\Http\Controllers\ApiController::class, 'login'])->name('login.api');
    Route::post('/register_api', [App\Http\Controllers\ApiController::class, 'register'])->name('register.api');

});
