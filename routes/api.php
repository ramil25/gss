<?php

use App\Http\Controllers\CouncellingResultsController;
use App\Http\Controllers\DownloadableFilesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestResultsController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::resource('/users',UserController::class);
Route::resource('/students',StudentController::class);
Route::resource('/councelling_results',CouncellingResultsController::class);
Route::resource('/downloadable_files',DownloadableFilesController::class);
Route::resource('/test_results',TestResultsController::class);
