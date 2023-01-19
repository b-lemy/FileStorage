<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserManagementController;

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

/** for sidebar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{

    Route::get('dashboard.home',function()
    {
        return view('dashboard.home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::post('/home', 'store')->name('home');
});

// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('home');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});

// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');
});

// ----------------------------- reset password -----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');
});

// ----------------------------- user profile ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('profile_user', 'profile')->name('profile_user');
    Route::post('profile_user/store', 'profileStore')->name('profile_user/store');
});

// ----------------------------- user userManagement -----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('userManagement', 'index')->middleware('auth')->name('userManagement');
    Route::get('user/add/new', 'addNewUser')->middleware('auth')->name('user/add/new');
    Route::post('user/add/save', 'addNewUserSave')->name('user/add/save');
    Route::get('view/detail/{id}', 'viewDetail')->middleware('auth');
    Route::post('update', 'update')->name('update');
    Route::get('delete_user/{id}', 'delete')->middleware('auth');
    Route::get('activity/log', 'activityLogInLogOut')->middleware('auth')->name('activity/log');
    Route::get('activity/login/logout', 'activityLogInLogOut')->middleware('auth')->name('activity/login/logout');
    Route::get('change/password', 'changePasswordView')->middleware('auth')->name('change/password');
    Route::post('change/password/db', 'changePasswordDB')->name('change/password/db');
});

//-------------------------------------- File urls ---------------------------------//
Route::controller(FileController::class)->group(function (){
//   Route::post('file', 'store')->name('file');
    Route::get('home/download/{id}', 'DLoad')->name('home/download');
    Route::get('home/delete/{file}', 'destroy')->name('home/delete');

});

Route::get('home/generate', [PDFController::class, 'generatePDF']);



