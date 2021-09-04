<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserFoodPageController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\WelcomePageController::class,'index']);

Auth::routes();



Route::group(['middleware'=>'auth'], function(){
    Route::get('/normaluser', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/user',[App\Http\Controllers\UserController::class, 'index']); 
    Route::get('/user/{id}/edit',[App\Http\Controllers\UserController::class, 'edit']); 
    Route::post('/user/{id}/update',[App\Http\Controllers\UserController::class, 'update']);
    Route::get('/user/{id}/editprofile',[App\Http\Controllers\UserController::class, 'editprofile']);
    Route::post('/user/{id}/updateprofile',[App\Http\Controllers\UserController::class, 'updateprofile']); 
    Route::delete('/user/{id}/delete',[App\Http\Controllers\UserController::class, 'destroy']); 
    Route::get('/searchuser',[App\Http\Controllers\UserController::class,'search']);



    Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']); 

    Route::get('/staff',[App\Http\Controllers\StaffController::class, 'index']); 

    Route::resource('category',CategoryController::class);
    Route::get('/searchcategory',[CategoryController::class,'search']);

    Route::resource('food',FoodController::class);
    Route::get('/searchfood',[FoodController::class,'search']);
    Route::get('/foodlists',[UserFoodPageController::class,'index']);
    
    Route::resource('/admindashboard',AdminDashboardController::class);

    Route::get('/role',[App\Http\Controllers\RoleController::class, 'index']); 
  
    Route::post('/add/cart',[App\Http\Controllers\CartController::class, 'insert'])->name('add_to_cart');
    Route::get('/cart/show',[App\Http\Controllers\CartController::class, 'show'])->name('cart_show');
    Route::get('/cart/remove/{rowId}',[App\Http\Controllers\CartController::class, 'remove'])->name('remove_item');
    Route::post('/cart/update',[App\Http\Controllers\CartController::class, 'update'])->name('update_cart');
 
    Route::get('/check/out',[App\Http\Controllers\CheckOutController::class, 'check'])->name('check_out');
    Route::post('/checkout/new/order',[App\Http\Controllers\CheckOutController::class, 'order'])->name('new_order');

    Route::get('/order',[App\Http\Controllers\OrderController::class, 'index'])->name('show_order');
    Route::get('/view/order/detail/{order_id}',[App\Http\Controllers\OrderController::class, 'viewOrder'])->name('view_order');
    Route::get('/view/invoice/{order_id}',[App\Http\Controllers\OrderController::class, 'viewInvoice'])->name('view_order_invoice');
    Route::delete('/order/delete/{order_id}',[App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('delete_order');

    Route::get('/orderhistory/{user_id}',[App\Http\Controllers\OrderHistoryController::class, 'viewHistory'])->name('view_order_history');
    Route::get('/userinvoice/{order_id}',[App\Http\Controllers\OrderHistoryController::class, 'viewInvoice'])->name('user_order_invoice');

});
