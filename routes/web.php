<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewUserRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');



//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);


Route::middleware('auth')->group(function () {
    Route::get('borang-user', [App\Http\Controllers\NewUserRegistrationController::class, 'index'])->name('borang-user');
    Route::post('daftar-user/{id?}', [App\Http\Controllers\NewUserRegistrationController::class, 'store'])->name('store');
    Route::get('senarai-user', [App\Http\Controllers\NewUserRegistrationController::class, 'senaraiUser'])->name('senaraiUser');
    Route::delete('senarai-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'destroy'])->name('destroy');
    Route::get('edit-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'edit'])->name('edit-user');
    Route::put('update-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'update'])->name('update');
    
});

Route::middleware('auth')->group(function () {
    Route::get('proposal-form', [App\Http\Controllers\ProposalController::class, 'index'])->name('index');
  
});