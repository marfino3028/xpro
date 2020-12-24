@extends('layouts.index')

@section('title')
    X Pro - SMTP Settings
@endsection

@section('content')
<br/>
<!-- Circle Buttons -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif
                        <div id="show-me">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/account_information'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Account Information </div> 
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">
                                                        Change company name, email, address, tax number etc
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/auto_number_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Auto Number</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change
                                                        company name, email, address, tax number etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/client_settings'"
                                            style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Client</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Customize
                                                        invoice prefix, number, terms, footer etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/account_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Company</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change
                                                        company name, email, address, tax number etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/currencies_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Currencies</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change
                                                        Create and manage currencies and set their rates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/smtp_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Email</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change the
                                                        sending protocol and email templates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/invoice_settings'"
                                            style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Invoice</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Customize
                                                        invoice prefix, number, terms, footer etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/payment_options'"
                                            style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Payment</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Customize
                                                        invoice prefix, number, terms, footer etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/plug-in_manager'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Plug-in Manager</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Fixed,
                                                        normal, inclusive, and compound tax rates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/product_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Fixed,
                                                        normal, inclusive, and compound tax rates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/purchase_order_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Purchase Order</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change
                                                        company name, email, address, tax number etc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/sms-settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SMS</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change the
                                                        sending protocol and email templates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/tax_settings'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Taxes</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Fixed,
                                                        normal, inclusive, and compound tax rates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body" onclick="window.location.href='/work_order_settings-1'" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Work Order</div>
                                                    <div class="mb-0 font-weight-bold text-gray-800" style="font-size: 12px">Change the
                                                        sending protocol and email templates</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection