<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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



Route::group(['middleware'=>'auth'], function(){
    Route::get('/normaluser', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/user',[App\Http\Controllers\UserController::class, 'index']); 
    Route::get('/user/{id}/edit',[App\Http\Controllers\UserController::class, 'edit']); 
    Route::post('/user/{id}/update',[App\Http\Controllers\UserController::class, 'update']); 
    Route::delete('/user/{id}/delete',[App\Http\Controllers\UserController::class, 'destroy']); 


    Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']); 

    Route::get('/staff',[App\Http\Controllers\StaffController::class, 'index']); 

    Route::resource('category',CategoryController::class);

    Route::resource('food',FoodController::class);
    
    Route::resource('/admindashboard',AdminDashboardController::class);

    Route::get('/role',[App\Http\Controllers\RoleController::class, 'index']);    
});
