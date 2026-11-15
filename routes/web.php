<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use PhpParser\Node\Name;

// Route::get('/', fn() => Inertia::render('Welcome'));
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'));
Route::get('/layout', fn() => view('layout'));
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/about', [AboutController::class, 'index']);
Route::get('/admin/classroom', [ClassroomController::class, 'index']);
Route::get('/admin/subjects', [SubjectController::class, 'index']);
Route::get('/admin/teachers', [TeacherController::class,'index']);

Route::prefix('admin')->group(function () {
    Route::get('/student', [StudentController::class, 'index'])
        ->name('admin.students.index');
    Route::post('/student', [StudentController::class, 'store'])
        ->name('admin.students.store');
});
