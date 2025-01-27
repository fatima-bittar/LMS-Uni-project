<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AttendanceRecordController;

// Public Routes (Guest Access)
Route::get('/dashboard', function () {
    return view('dashboard');  // A generic dashboard view
});


// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Admin & Super Admin)
Route::middleware(['auth', 'role:admin,super-admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Students CRUD Routes
    Route::resource('grades.sections.students', StudentController::class)->except(['show']);


    // Sections CRUD Routes
    Route::resource('grades.sections', SectionController::class)->shallow();


    // Grades CRUD Routes
    Route::resource('grades', GradeController::class);

    // Attendance Routes
    // Routes for Attendance management under Grade -> Section -> Students
    Route::prefix('grades/{grade}/sections/{section}/students')->group(function () {
    // Show the attendance form for taking attendance (POST for storing attendance)
        Route::get('attendance', [AttendanceRecordController::class, 'index'])->name('grades.sections.students.attendance.index');  // For displaying the students and attendance options
    
    // Store attendance for the students (POST request)
        Route::post('attendance', [AttendanceRecordController::class, 'store'])->name('grades.sections.students.attendance.store');  // For creating attendance records
    
    // Edit attendance (GET request) — For displaying the form to edit attendance
        Route::get('attendance/{studentId}/{date}/edit', [AttendanceRecordController::class, 'edit'])->name('grades.sections.students.attendance.edit');
    
    // Update attendance (PUT request) — For updating the attendance status
        Route::put('attendance/{studentId}/{date}', [AttendanceRecordController::class, 'update'])->name('grades.sections.students.attendance.update');
});    

});

// Super Admin Routes (Super Admin only)
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');

    // User Management Routes (CRUD)
    Route::resource('users', UserController::class);  // User management (CRUD)
});
