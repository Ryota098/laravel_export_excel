<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionnaireController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/upload', [HomeController::class, 'upload'])->name('upload');
Route::post('/upload-file', [HomeController::class, 'uploadExcelFile'])->name('upload-file');

// Route::get('/survey-data', [HomeController::class, 'show'])->name('survey');
// Route::get('/import-survey-data', [HomeController::class, 'survey'])->name('import-survey');
// Route::post('/import-survey-file', [HomeController::class, 'importSurveyFile'])->name('import-survey-file');

Route::get('questionnaire/create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
Route::post('questionnaire/store', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
Route::get('questionnaire/survey-data/{questionnaire:uuid}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
Route::post('questionnaire/import-survey-file', [QuestionnaireController::class, 'importSurveyFile'])->name('import-survey-file');
Route::delete('questionnaire/{questionnaire}', [QuestionnaireController::class, 'destroy'])->name('questionnaire.delete');

