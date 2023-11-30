<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ContractController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Users Routes
    Route::get('/users/parameters', [UserController::class, 'parameters'])->name('users.parameters');
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/userRole', [UserController::class, 'userRole'])->name('users.userRole');


    //Assets Routes
    Route::get('/assets/parameters', [AssetController::class, 'parameters'])->name('assets.parameters');
    Route::get('/assets/index', [AssetController::class, 'index'])->name('assets.index');
    Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
    Route::post('/assets/store', [AssetController::class, 'store'])->name('assets.store');
    Route::get('/assets/edit/{id}', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('/assets/update/{id}', [AssetController::class, 'update'])->name('assets.update');

    //Contracts
    Route::get('/contracts/parameters', [ContractController::class, 'parameters'])->name('contracts.parameters');
    Route::post('/contracts/routeStore', [ContractController::class, 'routeStore'])->name('contracts.routeStore');
    Route::resource('contracts', ContractController::class);
});

require __DIR__.'/auth.php';
