<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard', function() {
        return redirect()->route('admin.dashboard');
    });

    Route::group(['prefix' => 'admin/inventory', 'as' => 'admin.inventory.'], function () {
        Route::get('/', [InventoryController::class, 'index'])->name('index');
        Route::get('/create', [InventoryController::class, 'create'])->name('create');
        Route::post('/', [InventoryController::class, 'store'])->name('store');
        Route::get('/{inventory}/edit', [InventoryController::class, 'edit'])->name('edit');
        Route::patch('/{inventory}', [InventoryController::class, 'update'])->name('update');
        Route::delete('/{inventory}', [InventoryController::class, 'delete'])->name('delete');

        Route::group(['prefix' => '/{inventory}/item', 'as' => 'item.'], function () {
            Route::get('/', [ItemController::class, 'index'])->name('index');
            Route::get('/create', [ItemController::class, 'create'])->name('create');
            Route::post('/', [ItemController::class, 'store'])->name('store');
            Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('edit');
            Route::patch('/{item}', [ItemController::class, 'update'])->name('update');
            Route::delete('/{item}', [ItemController::class, 'delete'])->name('delete');
        });

    });

    Route::group(['prefix' => 'admin/seller', 'as' => 'admin.seller.'], function () {
        Route::get('/', [SellerController::class, 'index'])->name('index');
        Route::get('/create', [SellerController::class, 'create'])->name('create');
        Route::post('/', [SellerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SellerController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [SellerController::class, 'update'])->name('update');
        Route::delete('/{id}', [SellerController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'admin/profile', 'as' => 'admin.profile.'], function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [ProfileController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('destroy');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
