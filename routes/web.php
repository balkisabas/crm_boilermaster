<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\RfqtypesController;
use App\Http\Controllers\RfqStatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\CustomersController;
use App\http\Controllers\BranchesController;
use App\http\Controllers\VendorController;
use App\http\Controllers\DashboardController; 

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

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('companies', CompaniesController::class);
    Route::resource('documents', DocumentsController::class);
    Route::resource('positions', PositionsController::class);
    Route::resource('rfqtypes', RfqtypesController::class);
    Route::resource('rfqstatus', RfqStatusController::class);
    Route::resource('users', UserController::class);
    Route::resource('proposals', ProposalController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('branches', BranchesController::class);
    Route::resource('vendors', VendorController::class);
    Route::get('delete_doc/{id}/{rfqid}', [ProposalController::class, 'delete_doc'])->name('delete_doc');
    Route::get('delete_pic_vendor/{id}/{page_modual}/{parent_id}', 'App\Http\Controllers\VendorController@delete_pic')->name('delete_pic_vendor'); 
    Route::get('delete_pic_customer/{id}/{page_modual}/{parent_id}', [CustomersController::class, 'delete_pic'])->name('delete_pic_customer'); 
  });


Route::get('Dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('index_dash'); 
Route::get('proposal-list-submited', [App\Http\Controllers\DashboardController::class, 'rfqSubmitted'])->name('proposal_submited');
Route::get('proposal-list-inprogress', [App\Http\Controllers\DashboardController::class, 'rfqinporgress'])->name('proposal_inprogress');
Route::get('proposal-list-notsubmited', [App\Http\Controllers\DashboardController::class, 'rfqnotsubmited'])->name('proposal_notsubmited');
Route::get('proposal-list-awarded', [App\Http\Controllers\DashboardController::class, 'rfqawarded'])->name('proposal_awarded');

Route::get('proposal-list-submited/{name}/{type}', [App\Http\Controllers\ProposalController::class, 'rfqSubmitted'])->name('rfqreport_submited');
Route::get('proposal-list-inprogress/{name}/{type}', [App\Http\Controllers\ProposalController::class, 'rfqinporgress'])->name('rfqreport_inprogress');
Route::get('proposal-list-notsubmited/{name}/{type}', [App\Http\Controllers\ProposalController::class, 'rfqnotsubmited'])->name('rfqreport_notsubmited');
Route::get('proposal-list-awarded/{name}/{type}', [App\Http\Controllers\ProposalController::class, 'rfqawarded'])->name('rfqreport_awarded');
Route::get('proposal-list-submited/{name}/{type}/{date_from}/{date_to}', [App\Http\Controllers\ProposalController::class, 'rfqSubmitted_filter'])->name('rfqreport_submited_date');
Route::get('proposal-list-inprogress/{name}/{type}/{date_from}/{date_to}', [App\Http\Controllers\ProposalController::class, 'rfqinporgress_filter'])->name('rfqreport_inprogress_date');
Route::get('proposal-list-notsubmited/{name}/{type}/{date_from}/{date_to}', [App\Http\Controllers\ProposalController::class, 'rfqnotsubmited_filter'])->name('rfqreport_notsubmited_date');
Route::get('proposal-list-awarded/{name}/{type}/{date_from}/{date_to}', [App\Http\Controllers\ProposalController::class, 'rfqawarded_filter'])->name('rfqreport_awarded_date');
Route::get('proposal-report', [App\Http\Controllers\ProposalController::class, 'rfq_report'])->name('rfqreport')->middleware('permission:view_proposalreport');
Route::get('proposal-report-filter', [App\Http\Controllers\ProposalController::class, 'rfq_report_filter'])->name('rfqreportfilter');
Route::get('proposal-list', [App\Http\Controllers\ProposalController::class, 'senaraiRfq'])->name('proposal-list');
