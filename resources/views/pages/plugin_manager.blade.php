@extends('layouts.index')

@section('title')
X Pro - Plug-in Manager
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Plug In Manager</h6>
                </div>
                <div class="card-body">

                </div>

                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-question-circle"></i>
                    <strong>Empower and Streamline your ‘Online Invoices!</strong>
                    <br>
                    <p>OnlineInvoices comes with extra plug-ins to help you manage your business better. You can easily enable or disable system modules as required from your account settings menu. Simply tick the modules you want to include with your day-to-day account:</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Client Follow-Up</h6>
                    </div>
                    <div class="card-body">
                        <h6>Provides your business with the optimal method of managing your clients, and viewing the history of your transactions. Create a profile for each client and add related notes or attach files to it (internally or share with client), Categorize your clients into preset categories / statuses and organize the dates of appointments, reservations, follow up calls/emails or delivery with your clients easily. Send quick email to your client using a per-defined template.</h6>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
                    </div>
                    <div class="card-body">
                        <h6>Add and ‘activate ‘extra staff members to login and help you manage invoices, enter data, create staff roles and permissions easily, assign the roles for each staff member along with functions to generate reports for each staff member</h6>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Time Tracking</h6>
                    </div>
                    <div class="card-body">
                        <h6>Enter your daily timesheet, track all staff time by project, log activity, and generate invoices from your timesheets quickly and easily</h6>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Finance</h6>
                    </div>
                    <div class="card-body">
                        <h6>Add expenses anywhere from any device. You will be able add your expenses from your PC or mobile and even attach a picture of your receipt. Assign the expenses to your client and invoice him for it easily and quickly. Track what you spend with a powerful expense report. Finance, Profit & Loss Reports can now be filtered by Client, Category, Vendor or Staff for any date range.</h6>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Client Follow-Up</h6>
                    </div>
                    <div class="card-body">
                        <h6>Provides your business with the optimal method of managing your clients, and viewing the history of your transactions. Create a profile for each client and add related notes or attach files to it (internally or share with client), Categorize your clients into preset categories / statuses and organize the dates of appointments, reservations, follow up calls/emails or delivery with your clients easily. Send quick email to your client using a per-defined template.</h6>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">SMS</h6>
                    </div>
                    <div class="card-body">
                        <h6>Automatically or manually send mobile text messages to your customers on appointments and invoices through the most popular global and local text messaging providers.</h6>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Inventory Management</h6>
                    </div>
                    <div class="card-body">
                        <h6>Work Orders Create and follow up work orders, maintenance orders, or other jobs, assign them to your staff members, specify the job delivery date and budget, group invoices, expenses and appointments for each job under work orders, create statements and reports per work order</h6>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <h6 class="m-0 font-weight-bold text-primary">Chart of Accounts & Journals Accounting</h6>
                    </div>
                    <div class="card-body">
                        <h6>Chart of Accounts & Journals Accounting Manage and arrange your chart of accounts, create and manage manual and automatic journals, generate general ledger report, and the other related accounting reports this is the final</h6>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mb-2 ">Save</button>
            </div>
        </div>
    </section>
</div>
@endsection
