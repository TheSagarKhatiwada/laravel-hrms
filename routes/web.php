<?php

use App\Http\Controllers\ProfileController;
use App\Models\Employee;
use App\Models\Asset;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\Holiday;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Demo data for dashboard
    $employeeCount = Employee::count();
    $assetCount = Asset::count();
    $leaveCount = Leave::count();
    $attendanceCount = Attendance::count();
    $todayAttendance = Attendance::whereDate('date', now()->toDateString())->count();
    $pendingLeaves = Leave::where('status', 'pending')->count();
    $upcomingHolidays = Holiday::where('date', '>=', now()->toDateString())->count();
    return view('dashboard', compact('employeeCount', 'assetCount', 'leaveCount', 'attendanceCount', 'todayAttendance', 'pendingLeaves', 'upcomingHolidays'));
});

Route::get('/dashboard', function () {
    // Demo data for dashboard
    $employeeCount = Employee::count();
    $assetCount = Asset::count();
    $leaveCount = Leave::count();
    $attendanceCount = Attendance::count();
    $todayAttendance = Attendance::whereDate('date', now()->toDateString())->count();
    $pendingLeaves = Leave::where('status', 'pending')->count();
    $upcomingHolidays = Holiday::where('date', '>=', now()->toDateString())->count();
    return view('dashboard', compact('employeeCount', 'assetCount', 'leaveCount', 'attendanceCount', 'todayAttendance', 'pendingLeaves', 'upcomingHolidays'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Add resource routes for all modules
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::resource('assets', App\Http\Controllers\AssetController::class);
Route::resource('leaves', App\Http\Controllers\LeaveController::class);
Route::resource('holidays', App\Http\Controllers\HolidayController::class);
Route::resource('attendances', App\Http\Controllers\AttendanceController::class);
Route::resource('payrolls', App\Http\Controllers\PayrollController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);

require __DIR__.'/auth.php';
