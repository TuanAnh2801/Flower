<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubcribe;
use App\Http\Controllers\Web\AuthenticateController as WebAuthenticateController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CartCotroller;
use App\Http\Controllers\Web\CateGoryController;
use App\Http\Controllers\Web\ChangePasswordController;
use App\Http\Controllers\Web\IntroduceController;
use App\Http\Controllers\Web\PostsNewsController;
use App\Http\Controllers\Web\ProductCotroller;
use App\Http\Controllers\Web\UserSubcribeController;
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


Route::get('/', [WebAuthenticateController::class, 'showIndex']);
Route::get('index/login', [WebAuthenticateController::class, 'showIndex'])->name('flower.index');
// ->middleware('must-auth')
Route::get('showlogin', [WebAuthenticateController::class, 'showlogin']);
Route::post('login', [WebAuthenticateController::class, 'login']);
Route::get('register', [WebAuthenticateController::class, 'showRegisterForm']);
Route::post('register',[WebAuthenticateController::class,'register'])->name('register');
Route::get('logout',[WebAuthenticateController::class,'logout']);
//category
Route::get('categories/{category}/products', [CateGoryController::class, 'index'])->name('frontend.category-product.index');

//user
Route::get('user/profile',[UserController::class,'profile']);
Route::get('user/editProfile',[UserController::class,'editProfile']);
Route::put('user/updateProfile',[UserController::class,'updateProfile']);

//change password
Route::get('user/changePassword/showMail',[ChangePasswordController::class,'showMail']);
Route::post('user/changePassword/forget-password',[ChangePasswordController::class,'postForgetPass']);
Route::get('user/changePassword/get-password/{custormer}/{token}',[ChangePasswordController::class,'getPass'])->name('custormer.getPass');
Route::post('user/changePassword/post-password/{user}/{token}',[ChangePasswordController::class,'postPass']);

//introduce
Route::get('showIntroduce',[IntroduceController::class,'showIntroduce']);

//product
Route::get('product/{id}/details',[ProductCotroller::class,'detail_Product'])->name("product.detail")->middleware('must-auth');
Route::post('product/{id}/details',[ProductCotroller::class,'store']);
Route::post('product/{id}/comment_replies',[ProductCotroller::class,'store2']);



Route::get('product/flower_wedding',[ProductCotroller::class,'flower_wedding']);
Route::get('product/tet_flower',[ProductCotroller::class,'tet_flower']);
Route::get('product/flower_birthday',[ProductCotroller::class,'flower_birthday']);
Route::get('product/flower_opeing',[ProductCotroller::class,'flower_opeing']);
Route::get('product/searchAll',[ProductCotroller::class,'searchAll']);
//cart
Route::get('product/AddCart/{id}',[CartController::class,'AddCart']);
Route::get('product/Delete-Item-Cart/{id}',[CartController::class,'DeleteItemCart']);
Route::get('product/shoping-cart',[CartController::class,'showShoping']);
Route::get('product/Delete-List-Item-Cart/{id}',[CartController::class,'DeleteListItemCart']);
Route::get('product/Save-List-Item-Cart/{id}/{quantity}',[CartController::class,'SaveListItemCart']);
//order-shoping

Route::get('product/showOrderDetails',[CartController::class, 'showOrderDetails'])->middleware('must-auth');
Route::put('product/updateOrder',[CartController::class, 'updateOrder']);
// user
Route::get('product/history',[CartController::class, 'history'])->middleware('must-auth');
Route::put('product/updateHistory/{id}',[CartController::class, 'updateHistory'])->middleware('must-auth')->name('campaign.history');
Route::get('product/delivery',[CartController::class, 'delivery'])->middleware('must-auth');


//mail orderdetails
Route::get('product/orderdetail', [ProductCotroller::class,'orderdetail']);

//subribe

Route::post('user/userSubcribe', [UserSubcribeController::class,'userSubcribe']);
// Route::post('user/userSubcribe', [WebAuthenticateController::class,'userSubcribe']);

//posts
Route::get('/post/showPost',[PostsNewsController::class,'showPost']);
Route::get('/post/{id}', [PostsNewsController::class,'showPostDetails'])->name('posts.details');
Route::get('/post/{category}/categoryPost', [PostsNewsController::class,'Category'])->name('posts.categoryPost');
