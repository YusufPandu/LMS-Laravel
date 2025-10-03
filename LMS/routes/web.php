<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'permission:manage_users'])->group(function () {
    Route::get('/admin', function () {
        return "Admin Dashboard";
    })->name('admin.dashboard');
});
Route::middleware(['auth', 'permission:create_course'])->group(function () {
    Route::get('/courses/create', function () {
        return "Form Create Course";
    })->name('courses.create');
});

Route::middleware(['auth', 'permission:grade_assignment'])->group(function () {
    Route::get('/assignments/{id}/grade', function ($id) {
        return "Form Grade Assignment $id";
    });
});
Route::middleware(['auth', 'permission:view_course'])->group(function () {
    Route::get('/courses', function () {
        return "List Courses";
    })->name('courses.index');
});

Route::middleware(['auth', 'permission:submit_assignment'])->group(function () {
    Route::post('/assignments/{id}/submit', function ($id) {
        return "Submit Assignment $id";
    });
});
Route::middleware(['auth', 'permission:submit_assignment'])->group(function () {
    Route::get('/assignment', function () {
        return "Submit Assignment";
    })->name('assignment.index');
});


require __DIR__.'/auth.php';
