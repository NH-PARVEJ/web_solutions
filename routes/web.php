<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AttendanceController;
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
// Route::get('/', function () {
//     return view('frontend/pages/home');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




// Route::middleware('auth')->group(function () {
//     route::get('/{id}', [FrontendController::class, 'index'])->name('employee.dashboard');
// });


// Route::get('/', function () {
//     return view('frontend.pages.home');
        route::get('/employee/dashboard/  {id}', [FrontendController::class, 'employee_dashboard'])->middleware('auth')->name('employee.dashboard');
// });

// Route::group(['prefix' => '/'], function(){
//     route::get('{id}', [FrontendController::class, 'employee_dashboard'])->middleware('auth')->name('employee.dashboard');
// });




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

    route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'IsAdmin')->name('admin.dashboard');

    route::group(['prefix' => 'attendance'], function(){
        route::get('/manage', [AttendanceController::class, 'index'])->middleware(['auth'])->name('attendance.manage');
        route::get('/create', [AttendanceController::class, 'create'])->middleware(['auth'])->name('attendance.create');
        route::post('/store', [AttendanceController::class, 'store'])->middleware(['auth'])->name('attendance.store');
    });


    
    route::group(['prefix' => 'employee'], function(){
        route::get('/manage', [EmployeeController::class, 'index'])->middleware(['auth'])->name('employee.manage');
        route::get('/create', [EmployeeController::class, 'create'])->middleware(['auth'])->name('employee.create');
        route::post('/store', [EmployeeController::class, 'store'])->middleware(['auth'])->name('employee.store');
        route::get('/edit/{id}', [EmployeeController::class, 'edit'])->middleware(['auth'])->name('employee.edit');
        route::post('/update/{id}', [EmployeeController::class, 'update'])->middleware(['auth'])->name('employee.update');
        route::post('/destroy/{id}', [EmployeeController::class, 'destroy'])->middleware(['auth'])->name('employee.destroy');
    });

     
});

require __DIR__.'/auth.php';





















