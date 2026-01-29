<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('web.index');
Route::get('/about', [HomeController::class, 'about'])->name('web.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('web.contact');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('web.contact.store');
Route::get('/service-list', [ServiceController::class, 'index'])->name('web.service-list');
Route::post('/consultant', [HomeController::class, 'store'])->name('consultant.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/admin.php';
// require __DIR__ . '/auth.php';

Route::get('/center/{slug}', [ServiceController::class, 'center'])->name('web.center-details');
Route::get('/{slug}', [ServiceController::class, 'show'])->name('web.service-details');
Route::fallback(function () {
    return abort(404);
});
