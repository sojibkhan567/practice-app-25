<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('role:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('role:teacher')->group(function () {
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

Route::middleware('role:student')->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
});

Route::middleware('role:organization')->group(function () {
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::view('/dashboard', 'index');
