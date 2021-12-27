<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PegawaiController;
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
Route::post('login',[AuthController::class,'login']);
// Route::group(['middleware'=>'auth:sanctum'],function(){
Route::resource('pegawai',PegawaiController::class);
Route::post('/pegawai/{id}',[PegawaiController::class,'update']);
Route::get('/jabatan_pgw',[PegawaiController::class,'jabatan_pgw']);
Route::get('/pegawai/edit/{id}',[PegawaiController::class,'edit']);
// });