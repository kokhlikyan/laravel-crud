<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
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

Route::get('/', function(){
    return view('index');
})->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], 'login', [UserController::class, 'login'])->name('login');

Route::middleware('auth')->prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('user.page');
})->name('user');

Route::middleware('auth')->prefix('companies')->group(function(){
    Route::middleware('auth')->resource('/company', CompaniesController::class, [
        'names' => [
            'index' => 'companies.company.index',
            'create' => 'companies.company.create',
            'store' => 'companies.company.store',
            'show' => 'companies.company.show',
            'edit' => 'companies.company.edit',
            'update' => 'companies.company.update',
            'destroy' => 'companies.company.destroy',
        ]
    ]);
    Route::middleware('auth')->resource('employee', EmployeesController::class, [
        'names' => [
            'index' => 'companies.company.employee.index',
            'create' => 'companies.company.employee.create',
            'store' => 'companies.company.employee.store',
            'show' => 'companies.company.employee.show',
            'edit' => 'companies.company.employee.edit',
            'update' => 'companies.company.employee.update',
            'destroy' => 'companies.company.employee.destroy',
        ]
    ]);
})->name('companies');

