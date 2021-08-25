<?php

use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDataController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::get('get_user_data',[UserDataController::class,'userData'] )->middleware('auth:api');
Route::resource('cv_file', PDFController::class)->middleware('auth:api');
Route::get('get_expertise',[ExpertiseController::class,'getExpertiseList'])->middleware('auth:api');
Route::post('update_user_expertise',[ExpertiseController::class ,'selectExpertise'])->middleware('auth:api');
Route::get('get_jobs', [JobsController::class,'getJobs'])->middleware('auth:api');

