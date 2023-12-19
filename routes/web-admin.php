<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcribeController;
use App\Http\Controllers\Web\ProductCotroller;
use Brick\Math\Exception\RoundingNecessaryException;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\RiskyTestError;

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
//amdin
Route::get('/admin', [AuthenticateController::class, 'showLoginAdmin']);

Route::post('/admin', [AuthenticateController::class, 'loginAdmin']);
Route::group(['middleware' => 'must-admin'], function () {

    Route::get('/admin/login/index', [AuthenticateController::class, 'index']);

    Route::get('logout1', [AuthenticateController::class, 'logout']);
    // Route::get('admin/nav',[AuthenticateController::class,'showNav']);


    //account
    Route::get('admin/search/admin', [AccountController::class, 'adminInex'])->middleware('must-admin-role1');
    Route::get('admin/search/client', [AccountController::class, 'clientInex']);
    Route::get('admin/{id}/edit', [AccountController::class, 'editAccount']);
    Route::put('admin/{id}/', [AccountController::class, 'update']);
    Route::get('admin/createAdmin', [AccountController::class, 'ShowCreateAdmin'])->middleware('must-admin-role1');
    Route::post('admin/createAdmin', [AccountController::class, 'CreateAdmin'])->middleware('must-admin-role1');
    Route::delete('admin/{id}', [AccountController::class, 'delete'])->middleware('must-admin-role1');
    //Dashboard
    Route::get('admin/showDashboard', [DashboardController::class, 'showDashboard'])->name('backend.dashboard');
    //product

    Route::get('admin/product/create', [ProductController::class, 'create']);
    Route::post('admin/product/store', [ProductController::class, 'store']);
    Route::put('admin/product/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit']);
    //    Route::get('admin/product/flower_2023',[ProductController::class,'flower_2023']);

    Route::get('admin/product/all', [ProductController::class, 'allProduct']);
    Route::get('admin/product/tet_flower', [ProductController::class, 'tet_flower']);
    Route::get('admin/product/flower_wedding', [ProductController::class, 'flower_wedding']);
    Route::get('admin/product/flower_birthday', [ProductController::class, 'flower_birthday']);
    Route::get('admin/product/flower_opeing', [ProductController::class, 'flower_opeing']);

    Route::get('admin/{category}/products', [ProductController::class, 'category'])->name('backend.category-product.index');
    Route::delete('admin/delete/{id}', [ProductController::class, 'destroy']);

    // order

    Route::get('admin/order/showOrder', [OrderController::class, 'showOrder']);
    Route::get('admin/order/delivery', [OrderController::class, 'delivery']);
    Route::put('admin/order/{id}', [OrderController::class, 'updateStatus'])->name('campaigns.approve');

    Route::delete('admin/delete/order/{id}', [OrderController::class, 'delete'])->name('campaigns.delete');
    //date
    Route::post('admin/order/dateDelivery', [OrderController::class, 'dateDelivery']);
    // Route::post('admin/order/dateOrder', [OrderController::class, 'dateOrder']);
    Route::post('admin/order/showOrder', [OrderController::class, 'dateOrder']);

    //subcribe
    Route::get('admin/showSubcribe', [SubcribeController::class, 'showSubcribe']);
    Route::delete('admin/deleteSubcribe/{id}', [SubcribeController::class, 'deleteSubcribe'])->name('subcribe.delete');
    Route::post('admin/createTextMail', [SubcribeController::class, 'createTextMail']);
    //feedback
    Route::get('admin/feedback', [FeedbackController::class, 'showFeedback']);
    Route::put('/comment/update/{id}', [FeedbackController::class, 'updateFeedback'])->name('comment.update');
    // Route::get('product/{id}/details',[ProductCotroller::class,'feedback'])->name('product.details');
    Route::delete('admin/feedback/{id}', [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');

    //category

    Route::get('admin/showCategory', [CategoryController::class, 'showCategory']);
    Route::post('admin/createCategory', [CategoryController::class, 'Category']);

    Route::get('admin/showAllCategory', [CategoryController::class, 'showAllCategory']);
    Route::delete('admin/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('admin/showUpdateCategory/{id}/edit', [CategoryController::class, 'showUpdateCategory']);
    Route::put('admin/updateCategory/{id}', [CategoryController::class, 'updateCategory']);

    //Posts
    Route::get('admin/posts/showCreatePost', [PostsController::class, 'showCreatePost']);
    Route::post('admin/post/store', [PostsController::class, 'store']);
    Route::get('admin/post/allPosts', [PostsController::class, 'allPosts']);
    Route::delete('admin/post/{id}', [PostsController::class, 'delete'])->name('post.delete');
    Route::get('admin/posts/{id}/edit', [PostsController::class, 'edit']);
    Route::put('admin/posts/{id}', [PostsController::class, 'update']);
    Route::get('admin/posts/category', [PostsController::class, 'showCategoryPost']);
    Route::post('admin/posts/category', [PostsController::class, 'createCategory']);
    Route::get('admin/posts/showAllCategory', [PostsController::class, 'showAllCategory']);
    Route::get('admin/posts/allCategory', [PostsController::class, 'ShowAllCategory']);
    Route::delete('admin/posts/CategoryPost/{id}', [PostsController::class, 'deleleCategory'])->name('post.deleleCategory');
    Route::get('admin/posts/showEditCategoryPosts/{id}', [PostsController::class, 'showEditCategoryPosts']);
    Route::put('admin/posts/updateCategoryPosts/{id}', [PostsController::class, 'updateCategoryPosts']);
});
