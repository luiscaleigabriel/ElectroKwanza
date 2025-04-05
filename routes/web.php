<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('home.about');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::get('/store/{slug?}', [StoreController::class, 'index'])->name('home.loja');
Route::get('/products/{id}/details', [ControllersProductController::class, 'details'])->name('product.details');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

/*
|--------------------------------------------------------------------------
| Checkout & Payment Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(
    function () {
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/initiate', [CheckoutController::class, 'initiateCheckout'])->name('checkout.initiate');
        Route::post('/pay/visa', [PaymentController::class, 'visa'])->name('pay.visa');
        Route::post('/pay/unitel', [PaymentController::class, 'unitelMoney'])->name('pay.unitelmoney');
        Route::get('/payment/method', [PaymentController::class, 'index'])->name('payment.method');
    }
);

/*
|--------------------------------------------------------------------------
| User (Costumer) Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'customer'])->group(
    function () {
        Route::get('/user/pane', [CustomerController::class, 'index'])->name('customer.index');
        Route::post('/user/pane', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/user/orders', [CustomerController::class, 'myorders'])->name('customer.orders');
        Route::get('/user/newpass', [CustomerController::class, 'newpass'])->name('customer.newpass');
        Route::post('/user/newpass', [CustomerController::class, 'reset'])->name('customer.resetpass');
    }
);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(
    function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
    }
);

Route::prefix('auth')->name('auth.')->group(
    function () {
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
        Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('/admin/create/products', [ProductController::class, 'create'])->name('admin.products.create');
        Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::post('/admin/create/product', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    }
);
