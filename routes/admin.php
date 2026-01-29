<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\PasswordResetController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Service\CategoryController;
use App\Http\Controllers\Admin\Service\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'create'])->name('login');

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);

    Route::get('forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'store'])->name('password.email');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('password', [ProfileController::class, 'password'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::prefix('category')
        ->name('category.')
        ->controller(CategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{category}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');

            Route::get('/form/{id?}', 'form')->name('form');
            Route::get('/datatable', 'dataTable')->name('datatable');
            Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        });

    Route::prefix('product')
        ->name('product.')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{product}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');

            Route::get('/form/{id?}', 'form')->name('form');
            Route::get('/datatable', 'dataTable')->name('datatable');
            Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        });

    Route::prefix('slider')
        ->name('slider.')
        ->controller(SliderController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{slider}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');

            Route::get('/form/{id}', 'form')->name('form');
            Route::get('/datatable', 'dataTable')->name('datatable');
            Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        });

    Route::prefix('about')
        ->name('about.')
        ->controller(AboutController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });

    Route::prefix('client-reviews')
        ->name('client-reviews.')
        ->controller(ClientReviewController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{client-review}', 'destroy')->name('destroy');

            Route::get('/form/{id?}', 'form')->name('form');
            Route::get('/datatable', 'dataTable')->name('datatable');
            Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        });

    Route::prefix('settings')
        ->name('settings.')
        ->controller(SettingsController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });

    Route::prefix('booking')
        ->name('booking.')
        ->controller(BookingController::class)
        ->group(function () {
            Route::get('/datatable', 'dataTable')->name('datatable');
            Route::post('/status', 'updateStatus')->name('status.update');
        });
});
