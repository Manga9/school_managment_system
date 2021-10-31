<?php

//use App\Http\Controllers\ClassroomController;
//use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    Auth::routes(['register' => false]);

    Route::view('/', 'auth.login')->middleware('guest');


    // start
    Route::group(['middleware' => 'auth'], function () {

        Route::view('/dashboard', 'dashboard');

        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::resource('grades', GradeController::class);
        Route::post('/grades/delete_all', [\App\Http\Controllers\GradeController::class, 'delete_all'])->name('grades.delete_all');

        Route::resource('classrooms', ClassroomController::class);
        Route::post('/classrooms/delete_all', [\App\Http\Controllers\ClassroomController::class, 'delete_all'])->name('classrooms.delete_all');

        Route::resource('sections', SectionController::class);
        Route::post('/sections/delete_all', [\App\Http\Controllers\SectionController::class, 'delete_all'])->name('sections.delete_all');
        Route::get('classes/{id}', [\App\Http\Controllers\SectionController::class, 'getClasses'])->name('sections.getClasses');

        Route::view('parents/add_parents', 'livewire.parents.show_wizard_form')->name('add_parents');

        Route::resource('teachers', TeacherController::class);
    });

});
