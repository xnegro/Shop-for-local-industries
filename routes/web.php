<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\familiesController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/products', [UserController::class, 'products'])->name('products');

Route::get('/product/{id}/view', [UserController::class, 'product_view'])->name('product_view');
Route::post('/order/store', [UserController::class, 'order_store'])->name('order_store');
Route::post('/comment/store', [UserController::class, 'comment_store'])->name('comment_store');


// Family
Route::get('family/panel', [familiesController::class, 'index'])->name('family.panel');
Route::get('family/register', [familiesController::class, 'register'])->name('family.register');
Route::get('family/login', [familiesController::class, 'login'])->name('family.login');
Route::post('family/register/save', [familiesController::class, 'register_save'])->name('family.register.save');
Route::post('family/login_val', [familiesController::class, 'family_validate_login'])->name('family.log.val');
Route::post('image/upload/store', [familiesController::class, 'fileStore']);
Route::get('family/products/all', [familiesController::class, 'products_all'])->name('family.proud.all');
Route::get('family/product/new', [familiesController::class, 'products_new'])->name('family.products_new');
Route::post('family/product/store', [familiesController::class, 'products_store'])->name('family.products_store');
Route::get('family/product/{id}/edit', [familiesController::class, 'product_edit'])->name('family.product_edit');
Route::post('family/product/{id}/update', [familiesController::class, 'product_update'])->name('family.product_update');
Route::get('family/product/{id}/delete', [familiesController::class, 'product_delete'])->name('family.product_delete');
Route::get('family/request/{id}/details', [familiesController::class, 'orders_index'])->name('orders_index');
Route::get('family/request/{id}/completed', [familiesController::class, 'orders_completed'])->name('orders_completed');
Route::get('family/request/{id}/cancel', [familiesController::class, 'orders_cancel'])->name('orders_cancel');
Route::get('family/request/{id}/delete', [familiesController::class, 'orders_delete'])->name('orders_delete');
Route::get('family/settings', [familiesController::class, 'settings'])->name('family.settings');
Route::post('family/settings/info/update', [familiesController::class, 'settings_info_update'])->name('family.settings_info_update');
Route::post('family/settings/pass/update', [familiesController::class, 'settings_pass_update'])->name('family.settings_pass_update');
Route::get('family/contacts', [familiesController::class, 'contacts'])->name('family.contacts');
Route::post('family/msg/{id}/update', [familiesController::class, 'contacts_replay'])->name('family.contacts_replay');
Route::get('family/panel', [familiesController::class, 'index'])->name('family.panel');
Route::get('family/register', [familiesController::class, 'register'])->name('family.register');
Route::get('/family/login', [familiesController::class, 'login'])->name('family.login');
Route::post('family/register/save', [familiesController::class, 'register_save'])->name('family.register.save');
Route::post('/family/login_val', [familiesController::class, 'family_validate_login'])->name('family.log.val');
Route::post('image/upload/store', [familiesController::class, 'fileStore']);
Route::get('family/products/all', [familiesController::class, 'products_all'])->name('family.proud.all');
Route::get('family/product/new', [familiesController::class, 'products_new'])->name('family.products_new');
Route::post('family/product/store', [familiesController::class, 'products_store'])->name('family.products_store');
Route::get('family/product/{id}/edit', [familiesController::class, 'product_edit'])->name('family.product_edit');
Route::post('family/product/{id}/update', [familiesController::class, 'product_update'])->name('family.product_update');
Route::get('family/product/{id}/delete', [familiesController::class, 'product_delete'])->name('family.product_delete');
Route::get('family/request/{id}/details', [familiesController::class, 'orders_index'])->name('orders_index');
Route::get('family/request/{id}/completed', [familiesController::class, 'orders_completed'])->name('orders_completed');
Route::get('family/request/{id}/cancel', [familiesController::class, 'orders_cancel'])->name('orders_cancel');
Route::get('family/request/{id}/delete', [familiesController::class, 'orders_delete'])->name('orders_delete');
Route::get('family/settings', [familiesController::class, 'settings'])->name('family.settings');
Route::post('family/settings/info/update', [familiesController::class, 'settings_info_update'])->name('family.settings_info_update');
Route::post('family/settings/pass/update', [familiesController::class, 'settings_pass_update'])->name('family.settings_pass_update');
Route::get('family/contacts', [familiesController::class, 'contacts'])->name('family.contacts');
Route::post('family/msg/{id}/update', [familiesController::class, 'contacts_replay'])->name('family.contacts_replay');
Route::get('family/logout', [familiesController::class, 'logout'])->name('family.logout');

// admin

Route::get('admin', [AdminController::class, 'index'])->name('admin.panel');
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login/val', [AdminController::class, 'admin_validate_login'])->name('admin.login.val');
Route::get('admin/products/all', [AdminController::class, 'products_all'])->name('admin.proud.all');
Route::get('admin/product/{id}/active', [AdminController::class, 'product_active'])->name('admin.product_active');
Route::get('admin/product/{id}/deactive', [AdminController::class, 'product_deactive'])->name('admin.product_deactive');
Route::get('admin/product/{id}/edit', [AdminController::class, 'product_edit'])->name('admin.product_edit');
Route::post('admin/product/{id}/update', [AdminController::class, 'product_update'])->name('admin.product_update');
Route::get('admin/product/{id}/delete', [AdminController::class, 'product_delete'])->name('admin.product_delete');
Route::get('admin/request/{id}/details', [AdminController::class, 'orders_index'])->name('orders_index');
Route::get('admin/request/{id}/completed', [AdminController::class, 'orders_completed'])->name('orders_completed');
Route::get('admin/request/{id}/cancel', [AdminController::class, 'orders_cancel'])->name('orders_cancel');
Route::get('admin/request/{id}/delete', [AdminController::class, 'orders_delete'])->name('orders_delete');
Route::get('admin/contacts', [AdminController::class, 'contacts'])->name('admin.contacts');
Route::get('admin/cities', [AdminController::class, 'cities'])->name('admin.cities');
Route::get('admin/city/new', [AdminController::class, 'city_new'])->name('admin.city_new');
Route::post('admin/city/store', [AdminController::class, 'city_store'])->name('admin.city_store');
Route::get('admin/city/{id}/delete', [AdminController::class, 'city_delete'])->name('admin.city_delete');
Route::get('admin/categories', [AdminController::class, 'categories'])->name('admin.category');
Route::get('admin/category/{id}/delete', [AdminController::class, 'category_delete'])->name('admin.category_delete');
Route::get('admin/category/new', [AdminController::class, 'category_new'])->name('admin.category_new');
Route::post('admin/category/store', [AdminController::class, 'category_store'])->name('admin.category_store');
Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('admin/user/{id}/delete', [AdminController::class, 'user_delete'])->name('admin.user_delete');
Route::get('admin/families', [AdminController::class, 'families'])->name('admin.families');
Route::get('admin/family/{id}/active', [AdminController::class, 'families_active'])->name('admin.families_active');
Route::get('admin/family/{id}/deactive', [AdminController::class, 'families_deactive'])->name('admin.families_deactive');
Route::get('admin/family/{id}/delete', [AdminController::class, 'families_delete'])->name('admin.families_delete');
Route::get('admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
Route::get('admin/comment/{id}/delete', [AdminController::class, 'comments_delete'])->name('admin.comments_delete');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');



// Users
Route::get('customer/panel', [UserController::class, 'index'])->name('Users.panel');
Route::get('customer/orders', [UserController::class, 'orders'])->name('Users.orders');
Route::get('/customer/order/{id}/delete', [UserController::class, 'order_delete'])->name('Users.order_delete');
Route::get('customer/chat', [UserController::class, 'chat'])->name('Users.chat');

Route::post('/user/update', [UserController::class, 'user_update'])->name('Users.user_update');
Route::post('/chat/store', [UserController::class, 'chat_store'])->name('Users._chat_store');

Route::get('customer/chats', [UserController::class, 'view_chats'])->name('Users.view_chats');

Route::get('/index.html', function () {
    return redirect('/');
});



// Route::get('/about', function () {
//     return view('about');
// });
Route::get('about', [UserController::class, 'about'])->name('Users.about');
