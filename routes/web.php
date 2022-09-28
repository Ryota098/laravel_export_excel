<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload', [\App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
Route::post('/upload-file', [\App\Http\Controllers\HomeController::class, 'uploadExcelFile'])->name('upload-file');

Route::get('/upload-survey-data', [\App\Http\Controllers\HomeController::class, 'survey'])->name('upload-survey');
Route::post('/upload-survey-file', [\App\Http\Controllers\HomeController::class, 'uploadSurveyFile'])->name('upload-survey-file');
// Route::get('/export', [\App\Http\Controllers\HomeController::class, 'export'])->name('export');

