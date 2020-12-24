<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\AuthController@loginView')->name('login');
Route::post('/', 'Auth\AuthController@login')->name('loginPost');

Route::get('/reset', 'Auth\AuthController@resetPasswordView')->name('resetPasswordGet');
Route::post('/reset', 'Auth\AuthController@resetPassword')->name('resetPasswordPost');

Route::get('/verify/reset-password', 'Auth\AuthController@verifyResetPassword');
Route::post('/verify/reset-password', 'Auth\AuthController@updateNewPassword')->name('updateNewPassword');

Route::group(['middleware' => ['auth', 'addmenuroles']], function () {
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::get('/dashboard', 'Dashboard\DashboardController@dataGet')->name('dashboard');

    // NEW INVOICE
    Route::get('/manage_invoice', 'Invoices\ManageInvoiceController@getView')->name('manage_invoice');
    Route::get('/manage_invoice/ajax', 'Invoices\ManageInvoiceController@getDataInvoices');
    Route::get('/manage_invoice/edit/{id}', 'Invoices\ManageInvoiceController@editinvoice')->name('edit_invoice');
    Route::get('/manage_invoice/update/{id}', 'Invoices\ManageInvoiceController@updateInvoiceView')->name('updateinvoice');
    Route::post('/manage_invoice/update/{id}', 'Invoices\ManageInvoiceController@updateInvoice')->name('updateinvoice');
    Route::get('/manage_invoice/delete/{id}', 'Invoices\ManageInvoiceController@delete_function')->name('deleteinvoices');
    Route::get('/manage_invoice/detail/{id}', 'Invoices\ManageInvoiceController@detail')->name('invoicedetail');
    Route::get('/manage_invoice/update-status', 'Invoices\ManageInvoiceController@updateStatus')->name('invoiceupdatestatus');
    Route::post('/manage_invoice/send-email', 'Invoices\ManageInvoiceController@sendEmailInvoice')->name('sendmailinvoice');
    Route::get('/create_invoice', 'Invoices\CreateInvoiceController@create')->name('create_invoice');
    Route::post('/create_invoice', 'Invoices\CreateInvoiceController@store')->name('postData');
    Route::resource('invoice', 'ManageInvoiceController');
    Route::post('/receive_payment', 'Invoices\ReceivePaymentController@ReceivePayment');
    Route::get('/manage_invoice/print/{id}', 'Invoices\ManageInvoiceController@print_invoice');
    Route::post('/manage_invoice/delete', 'Invoices\ManageInvoiceController@deleteInvoices');

    Route::get('/estimates', 'Estimates\EstimatesController@getView')->name('estimates');
    Route::get('/estimates/ajax', 'Estimates\EstimatesController@getDataEstimates');
    Route::get('/estimates/detail/{id}', 'Estimates\EstimatesController@detail')->name('estimatedetail');
    Route::get('/estimates/delete/{id}', 'Estimates\EstimatesController@delete_function')->name('deleteestimates');
    Route::get('/estimates/update/{id}', 'Estimates\EstimatesController@editEstimatesView')->name('editestimates');
    Route::post('/estimates/update/{id}', 'Estimates\EstimatesController@updateEstimates')->name('updateestimates');
    Route::post('/estimates/convert-to-invoices', 'Estimates\EstimatesController@convertInvoice')->name('convertoinvoice');
    Route::get('/estimates/print/{id}', 'Estimates\EstimatesController@printEstimates');
    Route::get('/create_estimates', 'Estimates\EstimatesController@getEstimates')->name('create_estimates');
    Route::post('/create_estimates/add', 'Estimates\EstimatesController@addData')->name('postEstimate');
    Route::get('/credit_notes', 'CreditNotesController@getView')->name('creditnotes');
    Route::post('/credit_notes/add', 'CreditNotesController@addData')->name('postCredit');
    Route::get('/create_credit_notes', 'CreditNotesController@createCredit')->name('createcreditnotes');
    Route::get('/credit_notes/ajax', 'CreditNotesController@getDataAjax')->name('creditnotesajax');
    Route::get('/refund_receipts', 'RefundReceiptsController@getView')->name('refundreceipts');
    Route::get('/refund_receipts/ajax', 'RefundReceiptsController@getDataAjax');
    Route::get('/recurring_invoices', 'RecurringInvoicesController@getView')->name('recurringinvoices');
    Route::get('/client_payment', 'ClientPaymentController@getView')->name('clientpayment');
    Route::get('/client_payment/ajax', 'ClientPaymentController@getDataPayment');
    Route::get('/add_client_payment', 'ClientPaymentController@getAddPayment');

    Route::get('/work_orders', 'WorkOrder\WorkOrderController@WorkOrderView')->name('work_orders');
    Route::get('/work_orders/ajax', 'WorkOrder\WorkOrderController@getDataWorkOrders');
    Route::get('/work_orders/edit_work_order/{id}', 'WorkOrder\WorkOrderController@edit_function');
    Route::post('/work_orders/edit_work_order/{id}', 'WorkOrder\WorkOrderController@update_function')->name('updateworkorder');
    Route::get('/add_work_order', 'WorkOrder\WorkOrderController@WorkOrderAddView')->name('add_work_order');
    Route::post('/add_work_order', 'WorkOrder\WorkOrderController@WorkOrderAdd')->name('postworkorder');
    Route::post('/work_orders/delete', 'WorkOrder\WorkOrderController@deleteWorkOrder');
    Route::get('/work_orders/delete/{id}', 'WorkOrder\WorkOrderController@delete_function')->name('deleteworkorder');
    Route::post('/work_orders/delete_multiple', 'WorkOrder\WorkOrderController@delete_multiple')->name('multiDelete');
    Route::get('/work_orders/detail/{id}', 'WorkOrder\WorkOrderController@detail')->name('detailworkorder');
    Route::post('/work_orders/detail/{id}', 'WorkOrder\WorkOrderController@sendEmail')->name('sendEmail');
    Route::get('/work_order_settings', 'WorkOrderSettingssController@getViewSetting')->name('workordersettings-1');
    Route::get('/work_orders/update-status', 'WorkOrder\WorkOrderController@updateStatus')->name('workupdatestatus');
    Route::get('/work_orders/status-pending', 'WorkOrder\WorkOrderController@StatusPending');
    Route::get('/work_orders/documents', 'WorkOrder\WorkOrderController@getProjectDocument');

    // log
    Route::get('/log/activity', 'Log\LogActivityController@getLogActivity');

    Route::get('/manage_client', 'ManageClientController@getView')->name('manageclient');
    Route::get('/manage_client/detail/{id}', 'ManageClientController@detail')->name('detailclient');
    Route::post('/manage_client/delete_multiple', 'ManageClientController@delete_multiple')->name('multi');
    Route::get('/add_new_client', 'AddNewClientController@getView')->name('addnewclient');
    Route::post('/manage_client', 'AddNewClientController@addClients')->name('postaddclients');
    Route::get('/manage_client/edit_clients/{id}', 'ManageClientController@edit_function')->name('editclients');
    Route::post('/manage_client/{id}', 'ManageClientController@editClients')->name('updateclient');
    Route::get('/manage_client/delete/{id}', 'ManageClientController@delete_function')->name('deleteclients');
    Route::get('/appointments', 'AppointmentsController@getView')->name('appointments');
    Route::get('/appointments/ajax', 'AppointmentsController@getDataApointments');
    Route::get('/appointments/ajax-today', 'AppointmentsController@getDataApointmentsToday');
    Route::get('/appointments/delete/{id}', 'AppointmentsController@delete_function')->name('deleteappointments');
    Route::get('/appointments/accept/{id}', 'AppointmentsController@AcceptData')->name('acceptappointments');
    Route::get('/appointments/detail/{id}', 'AppointmentsController@detail')->name('detailappointments');
    Route::get('/appointments/Edit/{id}', 'AppointmentsController@editPointments')->name('editappointments');
    Route::post('/appointments/Edit/{id}', 'AppointmentsController@update_function')->name('updateappointments');
    Route::post('/appointments', 'AppointmentsController@postPointments')->name('addappointments');
    Route::get('/create_appointments', 'AppointmentsController@addPointments')->name('createappointments');
    Route::get('/contact_list', 'AddContactListController@getView')->name('addcontactlist');
    Route::get('/contact_list/ajax', 'AddContactListController@getDataContactList');
    Route::get('/add_contact_list', 'AddContactListController@getAddContactList');
    Route::post('/contact_list', 'AddContactListController@addContactList')->name('postaddContactList');
    Route::get('/contact_list/update/{id}', 'AddContactListController@getContactList');
    Route::post('/contact_list/update/{id}', 'AddContactListController@editContactList')->name('postupdateContactList');
    Route::post('/contact_list/delete', 'AddContactListController@deleteDataContactList');

    Route::get('/products_&_services', 'ProductServicesController@getView')->name('productservices');
    Route::get('/products_&_services/ajax', 'ProductServicesController@getDataProductServices');
    Route::get('/products_&_services/detail/{id}', 'ProductServicesController@getdetail')->name('productservicesdetail');
    Route::get('/add_product_&_services', 'ProductServicesController@getViewAdd')->name('add_product_&_services');
    Route::post('/products_&_services', 'ProductServicesController@addProductService')->name('addproductservice');
    Route::get('/products_&_services/delete/{id}', 'ProductServicesController@delete_function')->name('deleteproduct');
    Route::get('/products_&_services/edit_product_services/{id}', 'ProductServicesController@edit_function')->name('editproductservices');
    Route::post('/products_&_services/{id}', 'ProductServicesController@update_function')->name('updateproductservices');
    Route::get('/manage_purchase_orders', 'ManagePurchaseOrdersController@getView')->name('managepurchaseorders');
    Route::get('/manage_purchase_orders/ajax', 'ManagePurchaseOrdersController@getDataManagePurchaseOrders');
    Route::get('/add_manage_purchase_orders', 'ManagePurchaseOrdersController@getAddManagePurchaseOrders');
    Route::post('/add_manage_purchase_orders/add', 'ManagePurchaseOrdersController@addDataManagePurchaseOrders')->name('addDataManagePurchaseOrders');
    Route::post('/manage_purchase_orders/delete', 'ManageSuppliersController@deleteManagePurchaseOrders');
    Route::get('/purchase_refunds', 'PurchaseRefundsController@getView')->name('purchaserefunds');
    Route::get('/manage_suppliers', 'ManageSuppliersController@getView')->name('managesuppliers');
    Route::get('/manage_suppliers/ajax', 'ManageSuppliersController@getDataManageSupliers');
    Route::get('/manage_suppliers/delete', 'ManageSuppliersController@deleteManageSupliers');
    Route::get('/manage_suppliers/detail/{id}', 'ManageSuppliersController@detail')->name('suppliersdetail');
    Route::get('/manage_suppliers/Edit/{id}', 'ManageSuppliersController@editSuppliers')->name('editsuppliers');
    Route::get('/manage_suppliers/delete/{id}', 'ManageSuppliersController@deleteData')->name('deletesupplier');
    Route::get('/add_suppliers', 'ManageSuppliersController@addSupplier')->name('addsuppliers');
    Route::post('/manage_suppliers', 'ManageSuppliersController@postSupplier')->name('postsupplier');
    Route::post('/manage_suppliers/{id}', 'ManageSuppliersController@updateSuppliers')->name('updatesuppliers');
    Route::get('/manage_suppliers/summary/{id}', 'ManageSuppliersController@viewManageSupplierSummary')->name('manage_suppliers_summary');
    Route::get('/client_price_group', 'ClientPriceGroupController@getView')->name('clientpricegroup');
    Route::get('/warehouses', 'WarehousesController@getView')->name('warehouses');

    //---- BUKA
    //---- PROSES 1
    Route::get('/project_asset_list', 'AssetListController@getView');
    Route::get('/project_asset_list/ajax', 'AssetListController@getDataProjectName');
    Route::get('/add_project_asset', 'AssetListController@getAddProject')->name('add_project_asset');
    Route::post('/project_asset_list', 'AssetListController@addProject')->name('postaddprojectname');
    Route::get('/project_asset_list/update/{id}', 'AssetListController@getProjectName');
    Route::post('/project_asset_list/update/{id}', 'AssetListController@editProjectName')->name('postupdateProjectName');
    Route::post('/project_asset_list/delete', 'AssetListController@deleteProjectName');
    //---- PROSES 2
    Route::get('/asset_name', 'AssetListController@getViewAssetName');
    Route::get('/asset_name/ajax/', 'AssetListController@getDataAssetName');
    Route::get('/asset_name/detail/{id}', 'AssetListController@getDetailAssetName');
    Route::get('/asset_name/detail-ajax/{id}', 'AssetListController@getDetailAssetNameAjax');
    Route::get('/add_asset_name/add/{id}', 'AssetListController@getAddAssetName');
    Route::post('/asset_name', 'AssetListController@addAssetName')->name('addAssetName');
    Route::get('/asset_name/update/{id}', 'AssetListController@getAssetName');
    Route::post('/asset_name/update/{id}', 'AssetListController@editAssetName')->name('postupdateAssetName');
    Route::post('/asset_name/delete', 'AssetListController@deleteAssetName');
    //---- PROSES 3
    Route::get('/asset_project_name_list', 'AssetListController@getViewProjectNameList');
    Route::get('/asset_project_name_list/ajax', 'AssetListController@getDataProjectNameList');
    Route::get('/asset_project_name_list/detail/{id}', 'AssetListController@getDetailProjectNameList');
    Route::get('/asset_project_name_list/detail-ajax/{id}', 'AssetListController@getDetailProjectNameListAjax');
    Route::get('/add_asset_project_name_list/add/{id}', 'AssetListController@getAddProjectNameList');
    Route::post('/asset_project_na/upload/documentsme_list', 'AssetListController@addProjectNameList')->name('postProjectNameList');
    Route::get('/asset_project_name_list/update/{id}', 'AssetListController@getProjectNameList');
    Route::post('/asset_project_name_list/update/{id}', 'AssetListController@editProjectNameList')->name('postupdateProjectNameList');
    Route::post('/asset_project_name_list/delete', 'AssetListController@deleteProjectNameList');
    Route::get('/asset_project_name_list/export_csv', 'AssetListController@ExportToCsv');
    //---- TUTUP    

    Route::get('/projects', 'JobManagement\ProjectController@ProjectView');
    Route::get('/projects/ajax', 'JobManagement\ProjectController@getDataProject');
    Route::get('/projects/detail/{id}', 'JobManagement\ProjectController@detailProject');
    Route::get('/projects/update/{id}', 'JobManagement\ProjectController@editProjectView');
    Route::post('/projects/update/{id}', 'JobManagement\ProjectController@editProject')->name('postupdateprojects');
    Route::get('/projects/update-status', 'JobManagement\ProjectController@updateStatusProject');
    Route::post('/projects/update-sitecontact', 'JobManagement\ProjectController@updateSiteContact');
    Route::post('/projects/delete', 'JobManagement\ProjectController@deleteProjects');
    Route::get('/add_new_projects', 'JobManagement\ProjectController@addProjectView');
    Route::post('/projects', 'JobManagement\ProjectController@addProject')->name('postaddprojects');
    Route::get('/time_tracking', 'JobManagement\TimeSheetController@timesheetView')->name('timetracking');
    Route::post('/time_tracking/search', 'JobManagement\TimeSheetController@timesheetSearch');
    Route::post('/time_tracking/check', 'JobManagement\TimeSheetController@timesheetCheck');
    Route::get('/staff_tracking', 'JobManagement\StaffTrackingController@staffTrackingView')->name('stafftracking');
    Route::post('/time_tracking', 'TimeTracking@addActivity')->name('addActivity');
    Route::get('/generate_invoice', 'GenerateInvoiceController@getView')->name('generateinvoice');
    Route::get('/time_tracking_settings', 'TimeTrackingSettingsController@getView')->name('timetrackingsettings');
    Route::get('/projects-document', 'JobManagement\ProjectDocumentController@ProjectDocumentView');
    Route::get('/time_sheet_settings', 'JobManagement\TimeSheetController@settingsView');
    Route::post('/time_sheet_settings', 'JobManagement\TimeSheetController@updateSetting');
    Route::get('/time_sheet_add', 'JobManagement\TimeSheetController@timesheetAddView');    
    Route::post('/time_sheet_add', 'JobManagement\TimeSheetController@timesheetAdd');
    Route::get('/time_sheet/update/{id}', 'JobManagement\TimeSheetController@getEditTimeSheet');
    Route::post('/time_sheet/update/{id}', 'JobManagement\TimeSheetController@editTimeSheet')->name('postupdatetimesheet');
    Route::post('/time_sheet/delete/{id}', 'JobManagement\TimeSheetController@deleteWorkTimeSheet');    
    Route::get('/time_sheet_detail_by_id', 'JobManagement\TimeSheetController@timesheetDetailById');
    Route::get('/projects/documents', 'JobManagement\ProjectDocumentController@getProjectDocument');
    Route::post('/projects/documents/delete', 'JobManagement\ProjectDocumentController@deleteProjectDocument');

    Route::post('/upload/documents', 'Upload\UploadController@upload_document');
    Route::post('/upload/documents-workorders', 'Upload\UploadController@upload_document_workOrders');

    Route::get('/expenses', 'Finance\ExpensesController@expensesView')->name('expenses');
    Route::get('/expenses/ajax', 'Finance\ExpensesController@getExpensesAjax')->name('expensesajax');
    Route::post('/expenses', 'Finance\ExpensesController@addExpenses')->name('add_expenses');
    Route::post('/expenses/delete', 'Finance\ExpensesController@deleteExpenses')->name('delete_expenses');
    Route::get('/expenses/category', 'Finance\ExpensesController@viewCategory')->name('expenses_category');
    Route::get('/expenses/category-group/{id}', 'Finance\ExpensesController@detailExpenses');
    Route::get('/expenses/category/ajax', 'Finance\ExpensesController@getExpensesCategoryAjax')->name('expenses_category_ajax');
    Route::post('/expenses/category', 'Finance\ExpensesController@addExpensesCategory')->name('add_expenses_category');
    Route::post('/expenses/category/delete', 'Finance\ExpensesController@deleteCategoryExpenses')->name('delete_category_expenses');
    Route::post('/add_expenses', 'ExpensesController@add')->name('add_expenses_old');
    Route::get('/incomes', 'IncomesController@getView')->name('incomes');
    Route::get('/treasuries_&_bank_account', 'TreasuriesBankAccountController@getView')->name('treasuriesbankaccount');
    Route::get('/journals', 'JournalsController@getView')->name('journals');
    Route::get('/chart_of_account', 'ChartOfAccountController@getView')->name('chartofaccount');
    Route::get('/assets', 'AssetsController@getView')->name('assets');
    Route::get('/cost_centers', 'CostCentersController@getView')->name('costcenters');

    Route::get('/manage_staff_members', 'ManageStaffMembersController@getView')->name('managestaffmembers');
    Route::get('/manage_staff_members/ajax', 'ManageStaffMembersController@getDataStaffMembers');
    Route::get('/manage_staff_members/no_active/ajax', 'ManageStaffMembersController@getDataStaffMembersNonActive');
    Route::post('/manage_staff_members/nonactive', 'ManageStaffMembersController@NonActiveStaffMembers');
    Route::post('/manage_staff_members/active', 'ManageStaffMembersController@ActiveStaffMembers');
    Route::get('/manage_staff_members/detail/{id}', 'ManageStaffMembersController@detail')->name('detailstaff');
    Route::post('/manage_staff_members/detail/{id}', 'ManageStaffMembersController@update_detaiilfunction')->name('updateDetailStaffMembers');
    Route::post('/manage_staff_members/detail-pass/{id}', 'ManageStaffMembersController@update_detaiilpass')->name('updatePassStaffMembers');
    Route::get('/manage_staff_members/edit_staff_members/{id}', 'ManageStaffMembersController@edit_function')->name('editstaffmembers');
    Route::get('/manage_staff_members/update-status', 'ManageStaffMembersController@updateStatus');
    Route::get('/manage_staff_members/search', 'ManageStaffMembersController@search')->name('searchstaffmembers');
    Route::post('/manage_staff_members/{id}', 'ManageStaffMembersController@update_function')->name('updatestaffmembers');
    Route::get('/manage_staff_members/delete/{id}', 'ManageStaffMembersController@delete_function')->name('deletestaffmembers');
    Route::get('/add_staff_member', 'Staff\AddStaffMemberController@getView')->name('addstaffmember');
    Route::post('/manage_staff_members', 'Staff\AddStaffMemberController@addStaff')->name('poststaffmembers');
    Route::get('/manage_staff_roles', 'ManageStaffRolesController@getView')->name('managestaffroles');
    Route::get('/manage_staff_roles/ajax', 'ManageStaffRolesController@getDataStaffRoles');
    Route::get('/manage_staff_roles/delete', 'ManageStaffRolesController@deleteDataStaffRoles');
    Route::get('/add_staff_roles', 'AddStaffRolesController@getView')->name('addstaffroles');
    Route::post('/manage_staff_roles', 'AddStaffRolesController@addRole')->name('poststaffroles');
    Route::get('/manage_staff_roles/edit_staff_roles/{id}', 'EditStaffRoleController@getView')->name('editstaffrole');
    Route::post('/manage_staff_roles/{id}', 'EditStaffRoleController@editRole')->name('updatestaffrole');
    Route::get('/manage_staff_roles/delete/{id}', 'ManageStaffRolesController@delete_function')->name('deletestaffrole');

    Route::get('/manage_staff_members/work_orders/ajax/{id}', 'ManageStaffMembersController@workOrdersAjax');
    Route::get('/manage_staff_members/appointments/ajax/{id}', 'ManageStaffMembersController@AppointmentsAjax');


    Route::get('/settings', 'Settings\IndexController@index');
    Route::get('/invoice_settings', 'Settings\InvoicesController@index')->name('invoicesettings');
    Route::post('/invoice_setting/general-update', 'Settings\InvoicesController@updateGeneralInvoiceSetting')->name('updategeneralinvoices');
    Route::post('/settings/tax', 'Settings\InvoicesController@addTax');
    Route::get('/settings/tax/delete', 'Settings\InvoicesController@deleteTax');

    Route::get('/account_information', 'AccountInformationController@getView')->name('accountinformation');
    Route::get('/account_settings', 'AccountSettingsController@getView')->name('accountsettings');
    Route::get('/client_settings', 'ClientSettingsController@getView')->name('clientsettings');
    Route::get('/work_order_settings-1', 'WorkOrderSettingssController@getViewSetting')->name('workordersettings-1');
    Route::get('/purchase_order_settings', 'PurchaseOrderSettingsController@getView')->name('purchaseordersettings');
    Route::get('/product_settings', 'ProductSettingsController@getView')->name('productsettings');
    Route::get('/smtp_settings', 'SMTPSettingsController@getView')->name('smtpsettings');
    Route::post('/smtp_settings/update', 'SMTPSettingsController@updateSmtpSetting')->name('smtpsettingsupdate');
    Route::get('/payment_options', 'PaymentOptionsController@getView')->name('paymentoptions');
    Route::get('/sms-settings', 'SMSSettingsController@getView')->name('sms-settings');
    Route::get('/auto_number_settings', 'AutoNumberSettingsController@getView')->name('autonumbersettings');
    Route::get('/tax_settings', 'TaxSettingsController@getView')->name('taxsettings');
    Route::get('/plug-in_manager', 'PluginManagerController@getView')->name('plugin_manager');
    Route::get('/currencies_settings', 'CurrenciesSettingsController@getView')->name('currenciessettings');

    Route::get('/profile', 'ProfileController@getView')->name('profile');
    Route::get('/message', 'Chat\ChatController@ChatView');
    Route::get('/add_message', 'Chat\ChatController@getMessageView');
    Route::post('/add_message/chat', 'Chat\ChatController@getMessageChat');
    Route::post('/add_message/replay', 'Chat\ChatController@getMessageReplay')->name('postMessage');
});


Route::get('/reg', 'DashboardController@reg');
