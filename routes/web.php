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

    Route::prefix('outputs')->controller(OutputController::class)->name('outputs.')->group(function(){
        Route::get('random','random')->name('random');
        Route::get('create','create')->name('create');
        Route::get('show','show')->name('show');
    });

    Route::prefix('hashtags')->controller(HashtagController::class)->name('hashtags.')->group(function(){
        Route::get('refer','refer')->name('refer');
        Route::get('emotion/{emotion}','emotion')->name('emotion');
        Route::get('period/{period}','period')->name('period');
        Route::get('group/{group}','group')->name('group');
    });

    Route::controller(CommentController::class)->group(function(){
        Route::get('comments/show','show')->name('comments.show');
    });

    Route::prefix('profile')->controller(ProfileController::class)->name('profile.')->group(function(){
        Route::get('', 'edit')->name('edit');
        Route::patch('', 'update')->name('update');
        Route::delete('', 'destroy')->name('destroy');
    });

});


Route::resource('comments', CommentController::class)
    ->middleware('auth:users')->except('show');


require __DIR__.'/auth.php';
