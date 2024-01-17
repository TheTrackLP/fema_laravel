<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BorrowerController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\PlanController;
use App\Http\Controllers\Backend\Loan_listController;
use App\Http\Controllers\Backend\Staffs_MembersController;
use App\Http\Controllers\Backend\PaymentsController;
use App\Http\Controllers\Backend\ReportsController;

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
});


Route::middleware(['auth', 'usertype:admin'])->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::controller(BorrowerController::class)->group(function (){
        Route::get('/admin/borrowers', 'AllBorrowers')->name('all.borrowers');
        Route::post('/admin/borrowers/add', 'AddBorrower')->name('add.borrower');
        Route::get('/admin/borrower/edit/{id}', 'EditBorrower')->name('edit.borrower');
        Route::post('/admin/borrowers/update', 'UpdateBorrower')->name('update.borrower');
        Route::get('/admin/borrower/delete/{id}', 'DeleteBorrower')->name('delete.borrower');
    });

    Route::controller(DepartmentController::class)->group(function (){
        Route::get('/admin/departments', 'AllDepartments')->name('all.departments');
        Route::post('/admin/departments/add', 'AddDepartment')->name('add.department');
        Route::get('/admin/departments/delete/{id}', 'DeleteDepartment')->name('delete.department');
    });

    Route::controller(PlanController::class)->group(function (){
        Route::get('/admin/plans', 'AllPlans')->name('all.plans');
        Route::post('/admin/plan/add', 'AddPlan')->name('add.plans');
    });

    Route::controller(Loan_listController::class)->group(function (){
        Route::get('/admin/loans', 'AllActives')->name('all.actives');
        Route::post('/admin/loans/add', 'AddActives')->name('add.actives');
        Route::get('/admin/loans/edit/{id}', 'EditActives')->name('edit.actives');
        Route::get('/admin/borrowers/get/{id}', 'GetValueBorrower');
        Route::post('/admin/loans/update', 'UpdateActives')->name('update.actives');
    });

    Route::controller(PaymentsController::class)->group(function() {
        Route::get('/admin/payments', 'ViewPayments')->name('all.payments');
        Route::get('/admin/payments/{id}', 'GetPayments')->name('edit.payments');
        Route::post('/admin/payments/store', 'StorePayments')->name('store.payment');
    });

    Route::controller(Staffs_MembersController::class)->group(function (){
        Route::get('/admin/Staffs_Borrowers', 'StaffsMembers')->name('staffs.members');
        Route::get('/admin/Staffs_Borrowers/{id}', 'EditStaffMember')->name('edit.staff');
        Route::post('/admin/Staffs_Borrowers/update', 'UpdateStaffMember')->name('update.staff');
    });

    Route::controller(ReportsController::class)->group(function (){
        Route::get('/admin/reports', 'ViewReports')->name('view.reports');
        Route::get('/admin/reports/FilterDate', 'FilterDate')->name('filter.reports');
    });
});

Route::middleware(['auth', 'usertype:user'])->group(function (){
    Route::get('/user/dashboard', [AdminController::class, 'UserDashboard'])->name('user.dashboard');
});


require __DIR__.'/auth.php';