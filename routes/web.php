<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\OutputController;
use App\Http\Controllers\User\HashtagController;
use App\Http\Controllers\User\CommentController;

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
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('outputs/random', [OutputController::class, 'random'])
    ->name('outputs.random');
    Route::get('outputs/create', [OutputController::class, 'create'])
    ->name('outputs.create');
    Route::get('outputs/show', [OutputController::class, 'show'])
    ->name('outputs.show');

    Route::get('hashtags/refer', [HashtagController::class, 'refer'])
    ->name('hashtags.refer');
    Route::get('hashtags/emotion/{emotion}', [HashtagController::class, 'emotion'])
    ->name('hashtags.emotion');
    Route::get('hashtags/period/{period}', [HashtagController::class, 'period'])
    ->name('hashtags.period');
    Route::get('hashtags/group/{group}', [HashtagController::class, 'group'])
    ->name('hashtags.group');

    Route::get('comments/show', [CommentController::class, 'show'])
    ->name('comments.show');
});


Route::resource('comments', CommentController::class)
    ->middleware('auth:users')->except('show');



Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
