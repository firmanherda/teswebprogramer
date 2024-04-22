<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::group(['prefix'=>'admin', 'as' => 'admin.'], function() {
        Route::group(['prefix'=>'product', 'as' => 'product.'], function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/create', [ProductController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');

            Route::get('/exportFiltered', [ProductController::class, 'exportFiltered'])->name('exportFiltered');
        });

        Route::group(['prefix'=>'profile', 'as' => 'profile.'], function() {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
        });
    });
});



