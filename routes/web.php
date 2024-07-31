<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectVersionController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('projects', ProjectController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::resource('projects.submissions', SubmissionController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);
Route::resource('projects.versions', ProjectVersionController::class)
    ->middleware(['auth', 'verified']);
Route::post('/projects/{project}/versions/{version}/publish', [ProjectVersionController::class, 'publish'])
    ->name('projects.versions.publish')
    ->middleware(['auth', 'verified']);

Route::get('/p/{project:slug}', [ProjectController::class, 'show'])->name('project.page');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects/{project}/submissions', [SubmissionController::class, 'store'])
    ->name('projects.submissions.store');

Route::view('/terms', 'terms')->name('terms');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// https://laravel.com/docs/11.x/billing#quickstart-selling-products
Route::get('/checkout', [CheckoutController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('checkout');
Route::get('/checkout/success', [CheckoutController::class, 'show'])->name('checkout-success');
Route::view('/checkout/cancel', 'checkout.cancel')->name('checkout-cancel');

require __DIR__ . '/auth.php';
