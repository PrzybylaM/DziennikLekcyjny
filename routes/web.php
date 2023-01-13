<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Thesepomoc
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('journal', [\App\Http\Controllers\DbController::class, 'showStudentsGradeAndLogs']);
Route::get('students', [\App\Http\Controllers\DbController::class, 'showListStudents']);
Route::get('teachers', [\App\Http\Controllers\DbController::class, 'showListTeachers']);
Route::get('users', [\App\Http\Controllers\AdminController::class, 'showListUsers'])->middleware('admin');

Route::get('/new-grade', [\App\Http\Controllers\TeacherController::class, 'newGrade'])->name('newGrade');
Route::post('/add-grade', [\App\Http\Controllers\TeacherController::class, 'addGrade'])->name('addGrade');

Route::get('/edit-grade/{grade}', [\App\Http\Controllers\TeacherController::class, 'editGrade'])->name('editGrade')->middleware('teacher');
Route::post('/update-grade/{grade}', [\App\Http\Controllers\TeacherController::class, 'updateGrade'])->name('updateGrade')->middleware('teacher');

Route::get('/approve-grade-delete/{grade}', [\App\Http\Controllers\TeacherController::class, 'approveGrade'])->name('approveGrade')->middleware('teacher');
Route::get('/delete-grade/{grade}', [\App\Http\Controllers\TeacherController::class, 'deleteGrade'])->name('deleteGrade')->middleware('teacher');

Route::get('/approve-user-delete/{user}', [\App\Http\Controllers\AdminController::class, 'approveUserDelete'])->name('approveUser')->middleware('admin');
Route::get('/delete-user/{user}', [\App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser')->middleware('admin');

Route::get('/edit-user/{user}', [\App\Http\Controllers\AdminController::class, 'showRegisteredUser'])->name('showUser')->middleware('admin');
Route::POST('/update-user/{user}', [\App\Http\Controllers\AdminController::class, 'updateRegisteredUser'])->name('updateUser')->middleware('admin');

Auth::routes();

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('admin');




