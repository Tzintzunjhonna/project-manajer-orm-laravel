<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('getAllProjects', [ProjectController::class, 'getAllProjects']);
Route::get('getTenProjects', [ProjectController::class, 'getTenProjects']);
Route::get('getChunkProjects', [ProjectController::class, 'getChunkProjects']);
Route::get('getFirstorFailProject', [ProjectController::class, 'getFirstorFailProject']);
Route::post('project/store', [ProjectController::class, 'storeProject']);
Route::post('project/update/{id}', [ProjectController::class, 'updateProject']);
Route::post('project/destroy/{id}', [ProjectController::class, 'destroyProject']);

