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


Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload', [\App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
Route::post('/upload-file', [\App\Http\Controllers\HomeController::class, 'uploadExcelFile'])->name('upload-file');

Route::get('/survey-data', [\App\Http\Controllers\HomeController::class, 'show'])->name('survey');
Route::get('/import-survey-data', [\App\Http\Controllers\HomeController::class, 'survey'])->name('import-survey');
Route::post('/import-survey-file', [\App\Http\Controllers\HomeController::class, 'importSurveyFile'])->name('import-survey-file');

