<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\StaffController;



Route::resource('/students', StudentController::class);
Route::get('get-students', [StudentController::class,'showStudentPage']);
Route::get('del-student/{id}', [StudentController::class,'delStudent']);



Route::get('/',[AdminController::class, 'showDashboard']) -> name('admin.dashboard.page');
Route::resource('/staffs', StaffController::class);
Route::resource('/skills', SkillController::class);