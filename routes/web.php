<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomAuthuserController;


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

Route::domain('user.' . env('APP_URL'))->group(function () {   
Route::get('/', [CustomAuthuserController::class, 'dashboard']);  
Route::get('dashboard', [CustomAuthuserController::class, 'dashboard']); 
Route::get('/login', [CustomAuthuserController::class, 'index'])->name('loginu');
Route::post('/custom-loginu', [CustomAuthuserController::class, 'customLogin'])->name('login.customu'); 
Route::get('/registration', [CustomAuthuserController::class, 'registration'])->name('register-useru');
Route::post('/custom-registrationu', [CustomAuthuserController::class, 'customRegistration'])->name('register.customu');
Route::get('/signoutu', [CustomAuthuserController::class, 'signOut'])->name('signout'); 
Route::get('/loginuser', [CustomAuthuserController::class, 'index'])->name('loginuser');

});
Route::domain('admin.' . env('APP_URL'))->group(function () {
// Route::get('/', [CustomAuthController::class, 'dashboard']);  
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('/login', [CustomAuthController::class, 'index'])->name('adminLogin');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', [CustomAuthController::class, 'dashboard'])->name('adminDashboard');
 
    }); 
    
});

