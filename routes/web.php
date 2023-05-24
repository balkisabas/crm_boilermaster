<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewUserRegistrationController;
use App\http\controllers\CustomersController;
use App\http\controllers\BranchesController;
use App\http\controllers\VendorController;


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
Route::get('index', [App\Http\Controllers\HomeController::class, 'root'])->name('index');
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'root'])->name('dashboard');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');



//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

//balkis
Route::middleware('auth')->group(function () {
    Route::get('borang-user', [App\Http\Controllers\NewUserRegistrationController::class, 'index'])->name('borang-user');
    Route::post('daftar-user/{id?}', [App\Http\Controllers\NewUserRegistrationController::class, 'store'])->name('store');
    Route::get('senarai-user', [App\Http\Controllers\NewUserRegistrationController::class, 'senaraiUser'])->name('senaraiUser');
    Route::get('edit-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'edit'])->name('edit-user');
    Route::put('update-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'update'])->name('update');
    Route::delete('senarai-user/{id}', [App\Http\Controllers\NewUserRegistrationController::class, 'destroy'])->name('destroy');
    
});

//balkis
Route::middleware('auth')->group(function () {
    Route::get('proposal-form', [App\Http\Controllers\ProposalController::class, 'index'])->name('proposal-form');
    Route::post('daftar-rfq/{id?}', [App\Http\Controllers\ProposalController::class, 'daftarRfq'])->name('daftarRfq');
    Route::get('proposal-list', [App\Http\Controllers\ProposalController::class, 'senaraiRfq'])->name('proposal-list');
    Route::get('edit-proposal/{id}', [App\Http\Controllers\ProposalController::class, 'editProposal'])->name('editProposal');
    Route::put('update-proposal/{id}', [App\Http\Controllers\ProposalController::class, 'updateProposal'])->name('updateProposal');
    Route::get('senarai-docs/{id}', [App\Http\Controllers\ProposalController::class, 'viewDocsForm'])->name('viewDocsForm');
    Route::post('edit-docs', [App\Http\Controllers\ProposalController::class, 'tambahPropsalDocs'])->name('tambahPropsalDocs');
    Route::get('delete-proposal/{id}', [App\Http\Controllers\ProposalController::class, 'deleteProposal'])->name('deleteProposal');
    Route::get('delete-docs/{id}', [App\Http\Controllers\ProposalController::class, 'deleteDocs'])->name('deleteDocs');
});

//balkis
Route::middleware('auth')->group(function () {
  Route::get('upload',[App\Http\Controllers\UploadController::class, 'index'])->name('index');
  Route::post('upload-file',[App\Http\Controllers\UploadController::class, 'store'])->name('store');
});

//balkis
Route::middleware('auth')->group(function () {
  Route::get('new-user',[App\Http\Controllers\NewUserController::class, 'index'])->name('new-user');
  Route::post('daftar-user/{id?}',[App\Http\Controllers\NewUserController::class, 'daftarUser'])->name('daftarUser');
  Route::get('user-list',[App\Http\Controllers\NewUserController::class, 'userList'])->name('user-list');
  Route::get('edit-user/{id}', [App\Http\Controllers\NewUserController::class, 'editUser'])->name('editUser');
  Route::put('update-users/{id}', [App\Http\Controllers\NewUserController::class, 'updateUsers'])->name('updateUsers');
  Route::get('delete-user/{id}', [App\Http\Controllers\NewUserController::class, 'deleteUser'])->name('deleteUser');

});


// farhan cust
Route::middleware('auth')->group(function () {
  Route::get('new-customer', [App\Http\Controllers\CustomersController::class, 'index'])->name('index_customer'); 
  Route::post('new-customer', [App\Http\Controllers\CustomersController::class, 'store'])->name('store_customer');
  Route::get('list-customer', [App\Http\Controllers\CustomersController::class, 'list'])->name('list_customer') ;
  Route::get('view-customer/{id}/{page_modual}', [App\Http\Controllers\CustomersController::class, 'view_cus'])->name('view_customer');
  Route::get('Edit-customer/{id}/{page_modual}', [App\Http\Controllers\CustomersController::class, 'edit_index'])->name('Edit_view_customer');
  Route::post('Edit-customer', [App\Http\Controllers\CustomersController::class, 'edit'])->name('Edit_customer');
  Route::get('delete-customer/{id}/{page_modual}', [App\Http\Controllers\CustomersController::class, 'delete'])->name('delete_customer'); 

});

// farhan vendor
Route::middleware('auth')->group(function () {
  Route::get('new-vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('index_vendor'); 
  Route::post('new-vendor', [App\Http\Controllers\VendorController::class, 'store'])->name('store_vendor');
  Route::get('list-vendor', [App\Http\Controllers\VendorController::class, 'list'])->name('list_vendor') ;
  Route::get('view-vendor/{id}/{page_modual}', [App\Http\Controllers\VendorController::class, 'view_vendor'])->name('view_vendor'); 
  Route::get('Edit-vendor/{id}/{page_modual}', [App\Http\Controllers\VendorController::class, 'edit_index'])->name('Edit_view_vendor');
  Route::post('Edit-vendor', [App\Http\Controllers\VendorController::class, 'edit'])->name('Edit_vendor');
  Route::get('delete-vendor/{id}/{page_modual}', [App\Http\Controllers\VendorController::class, 'delete'])->name('delete_vendor'); 

});

// farhan branches

Route::middleware('auth')->group(function () {
  Route::get('Edit-branches/{id}/{page_modual}', [App\Http\Controllers\BranchesController::class, 'index_branch_edit'])->name('Edit-branches');
  Route::get('view-branches/{id}/{page_modual}', [App\Http\Controllers\BranchesController::class, 'view_branch'])->name('view-branches'); 
  Route::get('delete-branches/{id}/{page_modual}', [App\Http\Controllers\BranchesController::class, 'delete_branch'])->name('delete-branches');
  Route::get('add-branches/{id}/{page_modual}', [App\Http\Controllers\BranchesController::class, 'index_branch'])->name('add-branches');
  Route::post('/add-branches', [App\Http\Controllers\BranchesController::class, 'add_branch'])->name('edit_branch');
  Route::post('/Edit-branches', [App\Http\Controllers\BranchesController::class, 'edit_branch'])->name('edit_branch');

 });