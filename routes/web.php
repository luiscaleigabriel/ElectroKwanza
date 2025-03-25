<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('site.home');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(
    function () {
        Route::get('/admin/dashboard', [DashController::class, 'index']);
    }
);
