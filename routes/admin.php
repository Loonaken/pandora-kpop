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
use App\Http\Controllers\Admin\UserInformationController;
use App\Http\Controllers\Admin\ProfileController;
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

Route::get('/dashboard', [UserInformationController::class, 'dashboard'])
    ->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::get('user-info' , [UserInformationController::class, 'index' ])
    ->middleware('auth:admin')
    ->name('user.index');

Route::resource('images', ImageController::class)
    ->middleware('auth:admin')->except(['show']);

Route::resource('emotions', EmotionController::class)
    ->except(['edit' , 'update' ])
    ->middleware('auth:admin');

Route::resource('periods', PeriodController::class)
    ->except(['edit' , 'update' ])
    ->middleware('auth:admin');

Route::resource('groups', GroupController::class)
    ->except(['destroy'])
    ->middleware('auth:admin');

Route::resource('songs', SongController::class)
    ->middleware('auth:admin');

Route::middleware('auth:admin')->group(function () {

    Route::prefix('emotions')->controller(EmotionController::class)->name('emotions.')->group(function(){
        Route::get('{name}/name/edit','nameEdit')->name('name.edit');
        Route::put('{name}/name','nameUpdate')->name('name.update');
        Route::get('{song}/song/add','songAdd')->name('song.add');
        Route::put('{song}/song','songStore')->name('song.store');
        Route::get('{song}/song/destroy','songDestroy')->name('song.destroy');

    });

    // Period Route
    Route::prefix('periods')->controller(PeriodController::class)->name('periods.')->group(function(){
        Route::get('{term}/term/edit','termEdit')->name('term.edit');
        Route::put('{term}/term','termUpdate')->name('term.update');
        Route::get('{song}/song/add','songAdd')->name('song.add');
        Route::put('{song}/song','songStore')->name('song.store');
        Route::get('{song}/song/destroy','songDestroy')->name('song.destroy');
    });

    Route::prefix('groups')->controller(GroupController::class)->name('groups.')->group(function(){
        Route::delete('{group}/group','groupDestroy')->name('group.destroy');
        Route::delete('{song}/song','songDestroy')->name('song.destroy');
    });

    Route::prefix('profile')->controller(ProfileController::class)->name('profile.')->group(function(){
        Route::get('', 'edit')->name('edit');
        Route::patch('', 'update')->name('update');
        Route::delete('', 'destroy')->name('destroy');
    });

});


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
