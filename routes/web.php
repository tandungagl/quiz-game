<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\GameController;
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

Route::middleware("web")->group(function () {
    Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
    Route::get('/name-entry', [GameController::class, 'entryNamePage'])->name('entry.name');
    Route::post('/submit-name', [GameController::class, 'submitName'])->name('submit.name');
    Route::get('/questions/{index}', [GameController::class, 'showQuestion'])->name('question.show');
    Route::post('/questions', [GameController::class, 'answer'])->name('question.answer');
    Route::get('/finish', [GameController::class, 'finish'])->name('question.finish');
    Route::get('/result', [GameController::class, 'resultPage'])->name('result');
    Route::get('/leaderboard', [LeaderboardController::class, 'leaderboardPage'])->name('leaderboard');

    Route::prefix('admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showAdminLoginPage'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('submit-login');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::middleware('auth')->group(function () {
            Route::get('/question-list', [AdminQuestionController::class, 'list'])->name('question.list');
            Route::get('/edit-question/{id}', [AdminQuestionController::class, 'edit'])->name('question.edit');
            Route::get('/create-question', [AdminQuestionController::class, 'create'])->name('question.create');
            Route::post('/store-question', [AdminQuestionController::class, 'store'])->name('question.store');
            Route::post('/update-question/{id}', [AdminQuestionController::class, 'update'])->name('question.update');
            Route::get('/delete-question/{id}', [AdminQuestionController::class, 'delete'])->name('question.delete');
       });
    });
});

