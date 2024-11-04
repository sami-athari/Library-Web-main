<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PerpusCon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Index
Route::get('/index', [PerpusCon::class, 'index'])->name('index');

// Login & Registration
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

// Logout
Route::post('logout', [CustomAuthController::class, 'signOut'])->name('logout');

// Admin Routes (only accessible by admin users)
Route::middleware(['auth', 'can:isAdmin'])->prefix('admin')->group(function () {
    Route::get('/', [PerpusCon::class, 'adminIndex'])->name('admin.dashboard'); // Admin dashboard route
    Route::get('/create', [PerpusCon::class, 'create'])->name('admin.create'); // Admin create route
    Route::post('/store', [PerpusCon::class, 'store'])->name('admin.store'); // Admin store route
    Route::get('/edit/{id}', [PerpusCon::class, 'edit'])->name('admin.edit'); // Admin edit route
    // web.php
Route::get('/admin/reports', [PerpusCon::class, 'viewReports'])->name('admin.reports');

    Route::put('/admin/update/{id}', [PerpusCon::class, 'update'])->name('admin.update'); // Admin update route
    Route::delete('/destroy/{id}', [PerpusCon::class, 'destroy'])->name('admin.destroy');
});

// User Routes (only accessible by regular users)
Route::middleware(['auth', 'can:isUser'])->prefix('user')->group(function () {
    Route::get('/users', [PerpusCon::class, 'usersindex'])->name('users.index');
    Route::get('/borrow/{id}', [PerpusCon::class, 'borrow'])->name('users.borrow'); // Borrow item route
    Route::post('/borrow/{id}', [PerpusCon::class, 'borrowStore'])->name('users.borrow.store'); // Store borrowed item
    Route::post('/return/{id}', [PerpusCon::class, 'returnItem'])->name('users.return'); // Return item route
    Route::get('/users/cart', [PerpusCon::class, 'userCart'])->name('users.cart'); // Cart page route
    Route::get('/users/dashboard', [PerpusCon::class, 'userDashboard'])->name('users.dashboard'); // User dashboard route



});
