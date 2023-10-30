<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductIndexController;
use App\Http\Controllers\MarketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', "middleware" => 'role:admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/{user}', [AdminController::class, 'edit'])->name('user.edit');
    Route::delete('/{user}', [AdminController::class, 'delete'])->name('user.delete');
    Route::put('/{user}/permission/{permission}/revoke', [AdminController::class, 'revokePermission'])->name('users.permission.revoke');
    Route::post('/{user}/permission/assign', [AdminController::class, 'givePermission'])->name('users.permission.assign');
    Route::put('/{user}/role/{role}/remove', [AdminController::class, 'removeRole'])->name('users.role.remove');
    Route::post('/{user}/role/assign', [AdminController::class, 'assignRole'])->name('users.role.assign');
});

Route::group(['prefix' => 'seller', 'middleware' => 'role:seller|admin'], function () {
    Route::resource('/products', ProductController::class);
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [MarketController::class, 'index'])->name('market.index');
    Route::get('/choose/{product}', [MarketController::class, 'show'])->name('market.show');
    Route::get('/addcart/{product}', [MarketController::class, 'addCart'])->name('market.add.cart')->middleware('auth');
});
