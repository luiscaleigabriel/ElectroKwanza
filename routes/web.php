<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('site.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::prefix('auth')->name('auth.')->group(
    function() {
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(
    function () {
        Route::get('/admin/dashboard', [DashController::class, 'index'])->name('dash');
        // Categories operaction
        Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/admin/create/category', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/admin/create/category', [CategoryController::class, 'store'])->name('admin.categories.store');
    }
);
