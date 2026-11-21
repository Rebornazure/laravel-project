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

Route::prefix('admin')->group(function () {
    Route::get('/student', [StudentController::class, 'index'])
        ->name('admin.students.index');
    Route::get('/student/create', [StudentController::class, 'create'])
        ->name('admin.students.create');
    Route::get('/student/{student}/edit', [StudentController::class, 'edit'])
        ->name('admin.students.edit');
    Route::put('/student/{student}', [StudentController::class, 'update'])
        ->name('admin.students.update');
    Route::post('/student', [StudentController::class, 'store'])
        ->name('admin.students.store');
    Route::delete('/student/{student}', [StudentController::class, 'destroy'])
        ->name('admin.students.destroy');

    Route::get('/classroom', [ClassroomController::class, 'index'])
        ->name('admin.classrooms.index');
    Route::get('/classroom/create', [ClassroomController::class, 'create'])
        ->name('admin.classrooms.create');
    Route::post('/classroom', [ClassroomController::class, 'store'])
        ->name('admin.classrooms.store');
    Route::get('/classroom/{classroom}/edit', [ClassroomController::class, 'edit'])
        ->name('admin.classrooms.edit');
    Route::put('/classroom/{classroom}', [ClassroomController::class, 'update'])
        ->name('admin.classrooms.update');
    Route::delete('/classroom/{classroom}', [ClassroomController::class, 'destroy'])
        ->name('admin.classrooms.destroy');

    Route::get('/subjects', [SubjectController::class, 'index'])
        ->name('admin.subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])
        ->name('admin.subjects.create');
    Route::post('/subjects', [SubjectController::class, 'store'])
        ->name('admin.subjects.store');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])
        ->name('admin.subjects.destroy');

    Route::get('/teachers', [TeacherController::class, 'index'])
        ->name('admin.teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])
        ->name('admin.teachers.create');
    Route::post('/teachers', [TeacherController::class, 'store'])
        ->name('admin.teachers.store');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])
        ->name('admin.teachers.destroy');

});
