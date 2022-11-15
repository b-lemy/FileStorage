<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FormController;
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

/** for side bar menu active */
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
    Route::get('dashboard.home',function()
    {
        return view('dashboard.home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
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

// ----------------------------- lock screen --------------------------------//
Route::controller(LockScreen::class)->group(function () {
    Route::get('lock_screen', 'lockScreen')->middleware('auth')->name('lock_screen');
    Route::post('unlock', 'unlock')->name('unlock');
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

// ----------------------------- form staff ------------------------------//
Route::controller(FormController::class)->group(function () {
    /** form input full */
    Route::get('form/staff/new', 'index')->middleware('auth')->name('form/staff/new');
    Route::post('form/save', 'saveRecord')->name('form/save');
    Route::get('form/view/detail', 'viewRecord')->middleware('auth')->name('form/view/detail');
    Route::get('form/view/detail/{id}', 'viewDetail')->middleware('auth');
    Route::post('form/view/update', 'viewUpdate')->name('form/view/update');
    Route::get('delete/{id}', 'viewDelete')->middleware('auth');

    /** form checkbox */
    Route::get('form/checkbox/new', 'formCheckbox')->middleware('auth')->name('form/checkbox/new');
    Route::post('form/checkbox/save', 'checkboxSaveRecord')->middleware('auth')->name('form/checkbox/save');
});
