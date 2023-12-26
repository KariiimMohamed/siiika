<?php

use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\StaticController;
use Illuminate\Support\Facades\Route;

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

Route::get('/'            , [AuthController::class , 'show_login'])->name('login');
Route::post('login-post'  , [AuthController::class , 'login'])->name('login.post');
Route::get('/logout'      , [AuthController::class , 'logout'])->name('logout');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');


Route::prefix('admin')->middleware('localization')->name('admin.')->group(function () {

    /* Dashboard Routes */
    Route::middleware('auth')->group(function () {
        Route::get('/home'           , [HomeController::class , 'home'])->name('home');
        Route::resource('admins'     , AdminController::class)->except('show');
        Route::resource('users'      , UserController::class)->except('show');
        Route::resource('banners'    , BannerController::class)->except('show');
        Route::resource('categories' , CategoryController::class)->except('show');
        Route::resource('products'   , ProductController::class)->except('show');
        Route::resource('statics'    , StaticController::class)->except('show');
        Route::resource('services'   , ServiceController::class)->except('show');
        Route::resource('settings'   , SettingsController::class)->only(['index' , 'update']);
    });


});