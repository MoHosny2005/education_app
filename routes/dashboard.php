<?php

use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\teacherProfileController;
use App\Http\Controllers\yearController;

use App\Http\Middleware\ManagerAuth;
use App\Http\Middleware\ManagerGuest;
use App\Http\Middleware\TeacherAuth;

use Illuminate\Support\Facades\Route;


// manager routes
Route::middleware(ManagerAuth::class)->group(
    function(){
        Route::get('index' , function(){
         return view('dashboard.pages.index') ;
        })->name('manager.index');


        Route::resource("year" , yearController::class);
        Route::resource("subject" , subjectController::class);
        Route::resource("teacher" , teacherController::class);
        Route::resource("manager" , managerController::class);

        Route::get('sort.subject/{key}' ,[subjectController::class , 'sort'] )->name('sort.subject');
        Route::get('sort.teacher/{key}' , [teacherController::class , 'sort'] )->name('sort.teacher');

        // logout
        Route::get('auth_manager_logout'  , [ManagerAuthController::class , 'logout'] )->name('auth_manager_logout');

        //profile details

    }
);


//  manager Guest
Route::middleware([ManagerGuest::class  ])->group(
    function(){
        Route::get('auth_manager_form'  , [ManagerAuthController::class , 'show_form'] )->name('auth_manager_form');
        Route::post('auth_manager_check'  , [ManagerAuthController::class , 'login_check'] )->name('auth_manager_check');

    }
);


//teacher routes
Route::middleware(TeacherAuth::class)->group(
    function(){
        Route::get('index2' , function(){
         return view('dashboard.pages.index') ;
        })->name('teacher.dash');



        Route::get('auth_teacher_logout'  , [managerAuthController::class , 'logout'] )->name('auth_teacher_logout');

         //profile details
        Route::resource('teacherProfile' , teacherProfileController::class);

        Route::get('UpdateTeacherProfilePhoto' , function(){
         return view('dashboard.pages.profile details.teachers.updateTeacherProfilePhoto') ;
        })->name('UpdateTeacherProfilePhoto');
        Route::get('UpdateTeachercoverPhoto' , function(){
         return view('dashboard.pages.profile details.teachers.updateTeacherCoverImg') ;
        })->name('UpdateTeachercoverPhoto');


          Route::put('updatingTeacherProfilePhoto/{id}' , [teacherProfileController::class , 'updateProfileImage'])->name('updatingTeacherProfilePhoto');
          Route::put('updatingTeacherCoverPhoto/{id}' , [teacherProfileController::class , 'updateCoverImage'])->name('updatingTeacherCoverImg');
    }



);










?>
