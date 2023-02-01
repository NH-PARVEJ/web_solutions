<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\AttendanceController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;



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

    });

     
});

require __DIR__.'/auth.php';





















