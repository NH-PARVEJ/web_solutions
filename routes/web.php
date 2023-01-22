<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\EmployeeController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





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

Route::middleware(['prefix' => 'admin'], function(){

    route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'verified'])->name('dashboard');

    route::group(['prefix' => 'attendance'], function(){
        route::get('/manage', [AttendanceController::class, 'index'])->name('attendance.manage');
        route::get('/create', [AttendanceController::class, 'create'])->name('attendance.create');
        route::post('/store', [AttendanceController::class, 'store'])->name('attendance.store');
        route::get('/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
        route::patch('/update', [AttendanceController::class, 'update'])->name('attendance.update');
        route::delete('/destroy', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
    });


    
    route::group(['prefix' => 'employee'], function(){
        route::get('/manage', [EmployeeController::class, 'index'])->name('employee.manage');
        route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        route::get('/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        route::patch('/update', [EmployeeController::class, 'update'])->name('employee.update');
        route::delete('/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });

    
});























