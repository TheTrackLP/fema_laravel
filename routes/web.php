<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BorrowerController;
use App\Http\Controllers\Backend\LoanController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\LoanPlanController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'usertype:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::controller(BorrowerController::class)->group(function (){
        Route::get('/borrowers/list', 'BorrowerList')->name('borrowers.list');
        Route::post('/borrowers/add', 'AddBorrower')->name('borrowers.add');
    });

    Route::controller(LoanController::class)->group(function (){
        Route::get('loan/list', 'LoanList')->name('loan.list');
    });

    Route::controller(DepartmentController::class)->group(function (){
        Route::get('/departments', 'DepartmentList')->name('department.list');
        Route::post('department/add', 'AddDept')->name('dept.add');
    });

    Route::controller(LoanPlanController::class)->group(function (){
        Route::get('/plans', 'LoanPLans')->name('loan.plan');
        Route::post('/plan/add', 'AddPlans')->name('add.plan');
    });
});

require __DIR__.'/auth.php';