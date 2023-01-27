<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;



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
    return view('frontend/pages/home');
});

route::group(['prefix' => 'employee'], function(){
    route::get('/dashboard/{id}', [FrontendController::class, 'index'])->middleware(['auth','IsAdmin'])->name('employee.dashboard');
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

Route::group(['prefix' => 'admin'], function(){

    route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'IsAdmin'])->name('admin.dashboard');

    route::group(['prefix' => 'attendance'], function(){
        route::get('/manage', [AttendanceController::class, 'index'])->name('attendance.manage');
        route::get('/create', [AttendanceController::class, 'create'])->name('attendance.create');
        route::post('/store', [AttendanceController::class, 'store'])->name('attendance.store');
    });


    
    route::group(['prefix' => 'employee'], function(){
        route::get('/manage', [EmployeeController::class, 'index'])->name('employee.manage');
        route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        route::post('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });

     
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__.'/auth.php';





















