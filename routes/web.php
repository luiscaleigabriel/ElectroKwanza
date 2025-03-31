<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\SubCategoryController;
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
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
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
        Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/admin/create/category', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

        // SubCategories operaction
        Route::get('/admin/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
        Route::get('/admin/create/subcategory', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
        Route::get('/admin/subcategories/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategories.show');
        Route::post('/admin/create/subcategory', [SubCategoryController::class, 'store'])->name('admin.subcategories.store');
        Route::get('/admin/subcategories/{id}/edit', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
        Route::put('/admin/subcategories/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategories.update');
        Route::delete('/admin/subcategories/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategories.destroy');

        // Brands operaction
        Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands');
        Route::get('/admin/create/brands', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::get('/admin/brands/{id}', [BrandController::class, 'show'])->name('admin.brands.show');
        Route::post('/admin/create/brand', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

        // Product operaction
        Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands');
        Route::get('/admin/create/brands', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::get('/admin/brands/{id}', [BrandController::class, 'show'])->name('admin.brands.show');
        Route::post('/admin/create/brand', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    }
);
