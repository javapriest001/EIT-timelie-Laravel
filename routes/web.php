<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\deskofficerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\accountantController;
use App\Http\Controllers\utilityController;

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



Route::controller(loginController::class)->group(function(){
    Route::get('/',  'userLoginPage')->name('staffLogin');
    Route::post('/', 'LoginStaff')->name('staffLogin');
    Route::get('admin',  'adminLoginPage')->name('adminLogin');
    Route::post('admin',  'LoginAdmin')->name('adminLogin');
});



//ADMIN ROUTE WITH GROUP MIDDLEWARE, AND CONTROLLER
Route::prefix('admin')->controller(adminController::class)->middleware('adminLogin')->group(function(){
    Route::get('dashboard' , "index")->name('dashboard');
    Route::post('dashboard' , "addFee")->name('dashboard');
    Route::get('newstaff' , "addStaff")->name('newstaff');
    Route::post('newstaff' , "newstaff")->name('newstaff');
    Route::get('accountantrecord' , "accountantrecord")->name('accountantRecord');
    Route::get('deskofficerrecord' , "deskofficerrecord")->name('deskofficerRecord');
    Route::get('utilityofficerrecord' , "utilityofficerrecord")->name('utilityofficerrecord');
    Route::get('staff' , "staff")->name('staff');
    Route::get('fees' , "fees")->name('fees');
    Route::post('fees' , "addFees")->name('fees');
    Route::get('logout',  "logout")->name('logout');
});

//ACCOUNTANT ROUTE WITH GROUP MIDDLEWARE, AND CONTROLLER

Route::prefix('accountant')->controller(accountantController::class)->middleware('staffLogin')->group(function(){
    Route::get('dashboard' , "index")->name('Accountantdashboard');
    Route::get('records' , "records")->name('records');
    Route::post('records' , "singleRecord")->name('singlerecord');
    Route::get('fees' , "fees")->name('fees');
    Route::get('accountantLogout' ,  "logout")->name('accountantLogout');
    Route::get('profile' ,  "profile")->name('profile');
    Route::post('profile' ,  "updateprofile")->name('updateprofile');
    Route::post('dashboard' ,  "addTimeline")->name('addTimeline');
    Route::get('tester' ,  "test");
   
});

//DESKOFFICER ROUTE WITH GROUP MIDDLEWARE, AND CONTROLLER

Route::prefix('deskofficer')->controller(deskofficerController::class)->middleware('staffLogin')->group(function(){
    Route::get('dashboard' , "index")->name('deskofficerdashboard');
    Route::post('records' , "singleRecord")->name('desksinglerecord');
    Route::get('records' , "records")->name('deskofficerrecords');
    Route::get('fees' , "fees")->name('deskofficerfees');
    Route::get('deskofficerLogout' ,  "logout")->name('deskofficerLogout');
    Route::get('profile' ,  "profile")->name('deskofficerprofile');
    Route::post('profile' ,  "updateprofile")->name('deskofficerupdateprofile');
    Route::post('dashboard' ,  "addTimeline")->name('deskofficernewtimeline');
   
});

// UTILITY ROUTE WITH GROUP MIDDLEWARE, AND CONTROLLER

Route::prefix('utilityofficer')->controller(utilityController::class)->group(function(){

    Route::get('dashboard' , "index")->name('utilitydashboard');
    Route::get('records' , "records")->name('utilityrecords');
    Route::get('deskofficerLogout' ,  "logout")->name('utilityLogout');
    Route::get('profile' ,  "profile")->name('utilityprofile');
    Route::post('profile' ,  "updateprofile")->name('utilityupdateprofile');
    Route::post('dashboard' ,  "addTimeline")->name('utilityaddnewtimeline');
   

});

