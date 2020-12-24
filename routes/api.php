<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', 'Auth\LoginController@Login');
    });
    Route::middleware(['auth:api'])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', 'Dashboard\DashboardController@getDashboard');
        });
        Route::prefix('invoices')->group(function () {
            Route::get('/', 'Invoices\InvoiceController@getInvoices');
            Route::get('/getnumber', 'Invoices\InvoiceController@getNoInvoice');
            Route::get('/detail/{id}', 'Invoices\InvoiceController@detailInvoices');
            Route::post('/', 'Invoices\InvoiceController@createInvoices');
            Route::get('/delete/{id}', 'Invoices\InvoiceController@deleteInvoices');
            Route::post('/update/{id}', 'Invoices\InvoiceController@updateInvoices');
        });
        Route::prefix('estimates')->group(function () {
            Route::get('/', 'Estimates\EstimatesController@getEstimates');
            Route::get('/detail/{id}', 'Estimates\EstimatesController@detailEstimates');
            Route::post('/', 'Estimates\EstimatesController@createEstimates');
            Route::get('/delete/{id}', 'Estimates\EstimatesController@deleteEstimates');
            Route::post('/update/{id}', 'Estimates\EstimatesController@updateEstimates');
        });
        Route::prefix('workorder')->group(function () {
            Route::get('/', 'WorkOrder\WorkOrderController@getWorkOrder');
            Route::get('/detail/{id}', 'WorkOrder\WorkOrderController@detailWorkOrder');
            Route::post('/', 'WorkOrder\WorkOrderController@createWorkOrder');
            Route::get('/delete/{id}', 'WorkOrder\WorkOrderController@deleteWorkOrder');
            Route::post('/update/{id}', 'WorkOrder\WorkOrderController@updateWorkOrder');
            Route::get('/generate-number', 'WorkOrder\WorkOrderController@generateNumberWorkOrder');
        });
        Route::prefix('client')->group(function () {
            Route::get('/', 'Clients\ClientController@getClients');
            Route::get('/detail/{id}', 'Clients\ClientController@detailClient');
            Route::post('/', 'Clients\ClientController@createClient');
            Route::get('/delete/{id}', 'Clients\ClientController@deleteClient');
        });
        Route::prefix('company')->group(function () {
            Route::get('/', 'Company\CompanyController@getCompany');
            Route::post('/update/{id}', 'Company\CompanyController@updateCompany');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', 'Products\ProductController@getProducts');
            Route::get('/detail/{id}', 'Products\ProductController@getDetailProduct');
            Route::get('/delete/{id}', 'Products\ProductController@deleteProduct');
        });
        Route::prefix('tax')->group(function () {
            Route::get('/', 'Taxs\TaxController@getTaxs');
            Route::post('/', 'Taxs\TaxController@addTax');
            Route::get('/delete/{id}', 'Taxs\TaxController@deleteTax');
        });
        Route::prefix('staff')->group(function () {
            Route::get('/', 'Staff\StaffController@getStaff');
            Route::post('/update-tracking', 'Staff\StaffController@updateLocationStaff');
        });
        Route::prefix('timesheet')->group(function () {
            Route::get('/', 'TimeSheet\TimeSheetController@getTimeSheet');
            Route::post('/', 'TImeSheet\TimeSheetController@addTimeSheet');
            Route::get('/settings', 'TimeSheet\TimeSheetController@getTimeSheetSetting');
            Route::post('/settings', 'TimeSheet\TimeSheetController@updateTimesheetSetting');
        });
        Route::prefix('creditnotes')->group(function () {
            Route::get('/', 'Sales\CreditNotesController@getCreditNotes');
        });
        Route::prefix('project')->group(function () {
            Route::get('/', 'Projects\ProjectController@getProjects');
            Route::get('/detail/{id}', 'Projects\ProjectController@detailProjects');
            Route::post('/', 'Projects\ProjectController@addProject');
            Route::post('/update/{id}', 'Projects\ProjectController@updateProject');
            Route::get('/delete/{id}', 'Projects\ProjectController@deleteProject');
            Route::get('/update-status/{id}', 'Projects\ProjectController@updateStatusProject');
        });
        Route::prefix('finance')->group(function () {
            Route::get('/expenses', 'Finance\ExpensesController@getExpenses');
            Route::post('/expenses', 'Finance\ExpensesController@addExpenses');
            Route::get('/expenses/delete/{id}', 'Finance\ExpensesController@deleteExpenses');
            Route::get('/expenses/category', 'Finance\ExpensesController@getCategoryExpenses');
            Route::post('/expenses/category', 'Finance\ExpensesController@addCategoryExpenses');
            Route::post('/expenses/category/update/{id}', 'Finance\ExpensesController@updateCategoryExpenses');
            Route::get('/expenses/category/delete/{id}', 'Finance\ExpensesController@deleteCategoryExpenses');
        });
        Route::prefix('/inventory')->group(function () {
            Route::get('/manage-supplier', 'Inventory\ManageSuppliersController@getSuppliers');
            Route::get('/manage-supplier/detail/{id}', 'Inventory\ManageSuppliersController@detailSuppliers');
            Route::get('/manage-supplier/summary/{id}', 'Inventory\ManageSuppliersController@summarySupplier');
            Route::get('/manage-supplier/delete/{id}', 'Inventory\ManageSuppliersController@deleteSupplier');
        });
    });
});