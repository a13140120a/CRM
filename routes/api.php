<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'redirectToLogin']);

Route::group(['prefix' => 'admin'], function () {
    //login post route to admin auth controller
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');

    Route::get('verifyToken', [LoginController::class, 'TokenVerify'])->name('admin.verify');

});

