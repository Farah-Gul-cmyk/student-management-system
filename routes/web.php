<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RoleController; 
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;

Route::resource('enrollments', EnrollmentController::class);
Route::resource('batches', BatchController::class);
Route::resource('teachers', TeacherController::class);
Route::get('/', [StudentController::class, 'index']);
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::match(['put', 'post'], '/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');