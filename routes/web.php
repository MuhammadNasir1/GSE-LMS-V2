<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Mail\registrationMail;
use Illuminate\Support\Facades\Mail;

// language route
// Authentication
Route::get('email', function () {
    Mail::to("muhammadnasir.dev@gmail.com")->send(new registrationMail("test" , "test"));
    return 'Email sent!';
});


Route::get('setupPassword', function () {
    return view('Auth.setup_password');
});
Route::post('login', [authController::class, 'login']);
Route::post('registerdata', [authController::class, 'register']);
Route::post('updateUser/{id}', [authController::class, 'update'])->name("update");
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/notifications', function () {
    return view('notification');
});

Route::middleware('custom')->group(function () {

    Route::get('/setting', [authController::class, 'settingdata']);
    Route::post('updateSettings', [authController::class, 'updateSet']);
    // Route::get('/', [userController::class, 'Dashboard']);
    Route::get('help', function () {
        return view('help');
    });



    Route::get('register', function () {

        return view("register");
    });
    Route::get('/user-profile', function () {

        return view("user_profile");
    });
    Route::get('/user-profile/{user_id}', [userController::class, 'userAssignmentData']);


    Route::controller(ResourceController::class)->group(function () {
        Route::post('/addRecource', 'add')->name('addRecource');
        Route::get('/view/resources', 'index')->name('viewResource');
        Route::get('/delResource/{id}', 'delete')->name("getForUpdateResource");
        Route::get('/update-customer/{id}', 'get');
        Route::post('/updateResource/{id}', 'update');
        Route::post('/updateResource/{id}', 'update');
        Route::get('/view/resources', 'index')->name('viewResource');

        Route::get('resources', function () {
            return view('view_resources');
        });
    });

    Route::controller(AssignmentController::class)->group(function () {
        Route::post('/addAssignment', 'add');
        Route::get('assignment', 'index');
        Route::post('/assignmentReview/{assignment_id}', 'assignmentReview');
    });
    Route::get('/', [userController::class, 'Dashboard']);

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course', 'index');
        Route::post('/addCourse', 'insert');
        Route::get('/getSingleCourse/{course_id}', 'getSingleCourse');
    });
    Route::middleware('Admin')->group(function () {
        Route::get('/users', [userController::class, 'users']);
        Route::post('/addUser', [userController::class, 'insert']);
        Route::get('/deleteUser/{id}', [userController::class, 'deleteUser'])->name("deleteUser");
        Route::get('/update-user/{id}', [userController::class, 'updateUser'])->name("updateUser");
        Route::post('/updateUserCar/{id}', [userController::class, 'updateUserCar']);
        // Route::get('/', [userController::class, 'Dashboard']);
    });
});
