<?php

use Illuminate\Support\Facades\Route;

//

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Course\CategoryCourseController;
use App\Http\Controllers\Course\VideoController;

//
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::namespace('Course')->group(function () {

    Route::prefix('categoryCourse')->group(function () {

        Route::get('/categoryCourse', [CategoryCourseController::class, 'index'])->name('categoryCourse.index');
        Route::get('/create', [CategoryCourseController::class, 'create'])->name('categoryCourse.create');
        Route::post('/store', [CategoryCourseController::class, 'store'])->name('categoryCourse.store');
        Route::get('/show/{id}', [CategoryCourseController::class, 'show'])->name('categoryCourse.show');
        Route::get('/edit/{id}', [CategoryCourseController::class, 'edit'])->name('categoryCourse.edit');
        Route::put('/update/{id}', [CategoryCourseController::class, 'update'])->name('categoryCourse.update');
    });


    Route::prefix('course')->group(function () {

        Route::get('/courses', [CourseController::class, 'index'])->name('Course.index');
        Route::get('/create', [CourseController::class, 'create'])->name('course.create');
        Route::post('/store', [CourseController::class, 'store'])->name('course.store');
        Route::get('/show/{id}', [CourseController::class, 'show'])->name('course.show');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('course.update');


        Route::post('/soft-delete/{id}', [CourseController::class, 'softdelete'])->name('course.soft.delete');
        Route::get('/soft-delete', [CourseController::class, 'softdeleteshow'])->name('course.soft.delete.show');
    });


    Route::prefix('video')->group(function () {

        Route::get('/videos', [VideoController::class, 'index'])->name('video.index');
        Route::get('/create', [VideoController::class, 'create'])->name('video.create');
        Route::post('/store', [VideoController::class, 'store'])->name('video.store');
        Route::get('/show/{id}', [VideoController::class, 'show'])->name('video.show');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('/update/{id}', [VideoController::class, 'update'])->name('video.update');
    });
});
