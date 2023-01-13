<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\EmotionController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\SongController;
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
    return view('admin.welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');


Route::resource('images', ImageController::class)
    ->middleware('auth:admin')->except(['show']);

Route::resource('emotions', EmotionController::class)
    ->except(['edit' , 'update'])
    ->middleware('auth:admin');

Route::middleware('auth:admin')->group(function () {
    Route::get('emotions/{emotion_name}/edit', [EmotionController::class, 'emotion_name_edit'])
    ->name('emotion_name.edit');
    Route::put('emotions/{emotion_name}', [EmotionController::class, 'emotion_name_update'])
    ->name('emotion_name.update');
    Route::get('emotions/{emotion_registered_song}/edit', [EmotionController::class, 'emotion_registered_song_edit'])
    ->name('emotion_registered_song.edit');
    Route::put('emotions/{emotion_registered_song}', [EmotionController::class, 'emotion_registered_song_update'])
    ->name('emotion_registered_song.update');

});

Route::resource('periods', PeriodController::class)
    ->middleware('auth:admin');

Route::resource('groups', GroupController::class)
    ->middleware('auth:admin');

Route::resource('songs', SongController::class)
    ->middleware('auth:admin');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
