<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\AttendanceController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LeaveController;
use App\Http\Controllers\Backend\OfficeExpenseController;



/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('auth/login');
});


Route::group(['prefix' => '/employee'], function(){
    route::get('/dashboard', [FrontendController::class, 'employee_dashboard'])->middleware(['auth'])->name('employee.dashboard');
    route::get('/profile/{id}', [FrontendController::class, 'profile'])->middleware(['auth'])->name('profile');

    route::group(['prefix' => 'attendance'], function(){
        route::get('/create', [AttendanceController::class, 'create'])->middleware(['auth'])->name('attendance.create');
        route::post('/store', [AttendanceController::class, 'store'])->middleware(['auth'])->name('attendance.store');
    });

    route::group(['prefix' => 'leave'], function(){
        route::get('/create', [LeaveController::class, 'create'])->middleware(['auth'])->name('leave.create');
        route::post('/store', [LeaveController::class, 'store'])->middleware(['auth'])->name('leave.store');
        route::get('/edit/{id}', [LeaveController::class, 'edit'])->middleware(['auth'])->name('leave.edit');
        route::post('/update/{id}', [LeaveController::class, 'update'])->middleware(['auth'])->name('leave.update');
        route::post('/destroy/{id}', [LeaveController::class, 'destroy'])->middleware(['auth'])->name('leave.destroy');


    });
        
});



/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/admin'], function(){
    route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->middleware(['auth','IsAdmin'])->name('admin.dashboard');
    route::get('/profile/{id}', [DashboardController::class, 'admin_profile'])->middleware(['auth','IsAdmin'])->name('admin.profile');
    
    route::group(['prefix' => 'employee'], function(){
        route::get('/manage', [EmployeeController::class, 'index'])->middleware(['auth','IsAdmin'])->name('employee.manage');
        route::get('/create', [EmployeeController::class, 'create'])->middleware(['auth','IsAdmin'])->name('employee.create');
        route::post('/store', [EmployeeController::class, 'store'])->middleware(['auth','IsAdmin'])->name('employee.store');
        route::get('/edit/{id}', [EmployeeController::class, 'edit'])->middleware(['auth','IsAdmin'])->name('employee.edit');
        route::post('/update/{id}', [EmployeeController::class, 'update'])->middleware(['auth','IsAdmin'])->name('employee.update');
        route::post('/destroy/{id}', [EmployeeController::class, 'destroy'])->middleware(['auth','IsAdmin'])->name('employee.destroy');
        route::get('/profile/{id}', [EmployeeController::class, 'employee_profile'])->middleware(['auth', 'IsAdmin'])->name('employee.profile'); 
        route::get('/profile/{id}', [EmployeeController::class, 'employee_view'])->middleware(['auth', 'IsAdmin'])->name('view.employee.profile');  
        route::group(['prefix' => 'attendance'], function(){
            route::get('/manage', [AttendanceController::class, 'manage'])->middleware(['auth','IsAdmin'])->name('attendance.manage');
        });

        route::group(['prefix' => 'leave'], function(){
            route::get('manage', [LeaveController::class, 'index'])->middleware(['auth','IsAdmin'])->name('leave.manage');
            route::get('/edit/{id}', [LeaveController::class, 'admin_edit'])->middleware(['auth','IsAdmin'])->name('leave.admin_edit');
            route::post('/update/{id}', [LeaveController::class, 'admin_update'])->middleware(['auth','IsAdmin'])->name('leave.admin_update');
            route::post('/destroy/{id}', [LeaveController::class, 'destroy'])->middleware(['auth'])->name('leave.destroy');
        }); 
    });


    route::group(['prefix' => 'expance'], function(){
        route::get('manage', [OfficeExpenseController::class, 'index'])->middleware(['auth','IsAdmin'])->name('expance.manage');
        route::get('/edit/{id}', [OfficeExpenseController::class, 'edit'])->middleware(['auth','IsAdmin'])->name('expance.edit');
        route::post('/update/{id}', [OfficeExpenseController::class, 'update'])->middleware(['auth','IsAdmin'])->name('expance.update');
        route::post('/destroy/{id}', [OfficeExpenseController::class, 'destroy'])->middleware(['auth','IsAdmin'])->name('expance.destroy');
    });

     
});

require __DIR__.'/auth.php';





















