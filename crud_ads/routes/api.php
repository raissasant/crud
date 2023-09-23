<?php

use App\Http\Controllers\Api\AlunosControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('alunos/login', [AlunosControllerApi::class, 'loginapi']);



Route::group(['middleware' => 'auth:api'], function () {
    Route::get('alunos', [AlunosControllerApi::class, 'index']);
    });
    Route::post('alunos/login', [AlunosControllerApi::class, 'loginapi']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
