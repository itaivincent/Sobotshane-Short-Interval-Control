<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\PlanningController;
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
    Route::get('/contracts/index', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/parameters', [ContractController::class, 'parameters'])->name('contracts.parameters');
    Route::post('/contracts/routeStore', [ContractController::class, 'routeStore'])->name('contracts.routeStore');
    Route::post('/contracts/formulaStores', [ContractController::class, 'formulaStores'])->name('contracts.formulaStores');
    Route::post('/contracts/formulaStoress', [ContractController::class, 'formulaStoress'])->name('contracts.formulaStoress');
    Route::post('/contracts/escalationFormula', [ContractController::class, 'escalationFormula'])->name('contracts.escalationFormula');
    Route::post('/contracts/formulaStore', [ContractController::class, 'formulaStore'])->name('contracts.formulaStore');
    Route::get('/contracts/edit/{id}', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/contracts/update/{id}', [ContractController::class, 'update'])->name('contracts.update');
    Route::put('/contracts/updateformula/{id}', [ContractController::class, 'updateformula'])->name('contracts.updateformula');
    Route::get('/download-pdf/{id}', [ContractController::class, 'pdf'])->name('contracts.pdf');
    Route::resource('contracts', ContractController::class);

    //Drivers
    Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
    Route::get('/drivers/index', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/drivers/store', [DriverController::class, 'store'])->name('drivers.store');
    Route::get('/drivers/edit/{id}', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('/drivers/update/{id}', [DriverController::class, 'update'])->name('drivers.update');

    //Assignments 
    Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::get('/assignments/routesasset', [AssignmentController::class, 'routesasset'])->name('assignments.routesasset');
    Route::get('/assignments/assetdriver', [AssignmentController::class, 'assetdriver'])->name('assignments.assetdriver');
    Route::get('/assignments/index', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/show/{id}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/assignments/store', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::get('/assignments/capability', [AssignmentController::class, 'capability'])->name('assignments.capability');
    Route::post('/assignments/storeroutesasset', [AssignmentController::class, 'storeroutesasset'])->name('assignments.storeroutesasset');
    Route::post('/assignments/storeassetdriver', [AssignmentController::class, 'storeassetdriver'])->name('assignments.storeassetdriver');

    //Planning
    Route::get('/planning/contractplan', [PlanningController::class, 'contractplan'])->name('assignments.contractplan');
    Route::get('/planning/routeplan', [PlanningController::class, 'routeplan'])->name('assignments.routeplan');
    Route::get('/planning/showcontractplan/{id}', [PlanningController::class, 'showcontractplan'])->name('assignments.showcontractplan');
    Route::get('/planning/showcontractplanweekly/{id}', [PlanningController::class, 'showcontractplanweekly'])->name('assignments.showcontractplanweekly');
    Route::get('/planning/showcontractplandaily/{id}', [PlanningController::class, 'showcontractplandaily'])->name('assignments.showcontractplandaily');
    Route::get('/planning/showrouteplan/{id}', [PlanningController::class, 'showrouteplan'])->name('assignments.showrouteplan');
    Route::get('/planning/showrouteplanweekly/{id}', [PlanningController::class, 'showrouteplanweekly'])->name('assignments.showrouteplanweekly');
    Route::get('/planning/showrouteplandaily/{id}', [PlanningController::class, 'showrouteplandaily'])->name('assignments.showrouteplandaily');
    Route::get('/planning/showallcontractplan', [PlanningController::class, 'showallcontractplan'])->name('assignments.showallcontractplan');
    Route::get('/planning/showallrouteplan', [PlanningController::class, 'showallrouteplan'])->name('assignments.showallrouteplan');

});

require __DIR__.'/auth.php';
