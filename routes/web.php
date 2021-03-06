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

        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        //============================Grades====================================================
        Route::resource('grades', GradeController::class);
        Route::post('/grades/delete_all', [\App\Http\Controllers\GradeController::class, 'delete_all'])->name('grades.delete_all');
        //============================Classrooms=================================================
        Route::resource('classrooms', ClassroomController::class);
        Route::post('/classrooms/delete_all', [\App\Http\Controllers\ClassroomController::class, 'delete_all'])->name('classrooms.delete_all');
        //============================Sections====================================================
        Route::resource('sections', SectionController::class);
        Route::post('/sections/delete_all', [\App\Http\Controllers\SectionController::class, 'delete_all'])->name('sections.delete_all');
        Route::get('classes/{id}', [\App\Http\Controllers\SectionController::class, 'getClasses'])->name('sections.getClasses');
        //============================Parents======================================================
        Route::view('parents/add_parents', 'livewire.parents.show_wizard_form')->name('add_parents');
        //============================Teachers=====================================================
        Route::resource('teachers', TeacherController::class);
        //============================Students=====================================================
        Route::resource('students',StudentController::class);
        Route::get('getSections/{id}', [\App\Http\Controllers\StudentController::class, 'getSections'])->name('students.getSections');
        Route::post('/students/upload/{id}', [\App\Http\Controllers\StudentController::class, 'upload_images'])->name('images.upload_images');
        Route::get('/students/download/{id}/{name}', [\App\Http\Controllers\StudentController::class, 'download_image'])->name('images.download_image');
        Route::delete('/students/delete_image/{stud_id}/{name}/{img_id}', [\App\Http\Controllers\StudentController::class, 'delete_image'])->name('images.delete_image');
        //============================Students Promotions==========================================
        Route::resource('promotions',PromotionController::class);
        //============================Students Graduated===========================================
        Route::resource('graduates',GraduatedController::class);
    });

});
