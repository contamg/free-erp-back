<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
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

Route::group([
    'prefix' => 'auth',
], function($router) {
    $router->post('register', [AuthController::class, 'register'])->name('register');
    $router->post('login', [AuthController::class, 'login'])->name('login');
    $router->post('logout', [AuthController::class, 'logout'])->name('logout');
    $router->get('refresh', [AuthController::class, 'refresh'])->name('refresh');
    $router->get('me', [AuthController::class, 'me'])->name('me');
});

Route::group([
    'middleware' => 'auth:api',
], function($router) {
    $router->apiResource('accounts', AccountController::class);
});
