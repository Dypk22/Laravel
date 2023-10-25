
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\AdminAuthenticate;

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

Route::resource('/', FrontController::class)->middleware('AdminGuest');
Route::get('register',[FrontController::class,'register'])->middleware('AdminGuest');
Route::post('register',[FrontController::class,'registerForm'])->name('register');

Route::get('login',[FrontController::class,'login'])->name('login');
Route::post('login',[FrontController::class,'login'])->name('AdminLogin');
Route::get('password-recovery',[FrontController::class,'password_recovery']);
Route::post('reset-password-email',[FrontController::class,'reset_password_email']);
Route::post('verify-email-reset',[FrontController::class,'verify_email_reset']);
Route::post('reset-password',[FrontController::class,'reset_password']);
Route::post('reset_password_form',[FrontController::class,'reset_password_form']);
Route::get('email-recovery/{token}',[FrontController::class,'email_recovery']);


/************************************************/
/*       Admin Code Begin From Here Here        */
/************************************************/

Route::prefix('admin/')->group(function () {
    Route::get('/',[AdminController::class,'login'])->middleware('AdminGuest');
    Route::get('logout',[AdminController::class,'logout']);
    Route::get('dashboard',[AdminController::class,'dashboard'])->middleware('AdminAuthenticate');
    Route::get('data-table',[AdminController::class,'dashboard'])->middleware('AdminAuthenticate');
    Route::get('profile',[AdminController::class,'profile']);
    Route::post('profile',[AdminController::class,'profile_data']);
    Route::get('settings',[AdminController::class,'settings'])->middleware('AdminAuthenticate');
    Route::post('settings',[AdminController::class,'settings_update'])->middleware('AdminAuthenticate');
});


