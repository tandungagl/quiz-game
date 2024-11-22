<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'showHomePage']);
Route::get('/name-entry', [PlayerController::class, 'entryNamePage']);
Route::get('/questions', [QuestionController::class, 'startQuizPage']);
Route::get('/result', [ScoreController::class, 'resultPage']);
Route::get('/leaderboard', [LeaderboardController::class, 'leaderboardPage']);

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLoginPage']);
    Route::get('/question-manager', [QuestionController::class, 'adminQuestionManager']);
    Route::get('/question-list', [QuestionController::class, 'adminQuestionList']);
});

