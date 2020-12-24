@extends('layouts.index')

@section('title')
X Pro - Clients Detail
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Details Client</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="" class="breadcrumb-item">Details Client</a>
                    <span class="breadcrumb-item active">Archive</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Circle Buttons -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Invoice archive -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Detail Projects</h5>
                    <div class="header-elements">
                        <div class="list-icons">

                        </div>
                    </div>
                </div>
                <div class="main-body"> 
                    <div class="col-xs-12 col-sm-4 col-md-5 align-items-center">
                        <h2 class="d-inline-flex mb-0 long-texts"></h2>
                    </div>
                    <br/>
                    <div class="row ml-1 mr-1">
                        <div class="col-xl-3">
                            <ul class="list-group mb-4">
                                <li class="list-group-item d-flex justify-content-between align-items-center ">
                                    Invoices <span class="badge badge-primary badge-pill"></span>
                                </li> 
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Work Order <span class="badge badge-primary badge-pill"></span>
                                </li>
                            </ul>

                            <ul class="list-group mb-4">
                                <li class="list-group-item">
                                    <div>
                                        <table>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td>:</td>
                                                <td>{{ $show[0]->full_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td>:</td>
                                                <td>{{ $show[0]->email }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Phone</b></td>
                                                <td>:</td>
                                                <td>{{ $show[0]->telephone }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </li> 
                            </ul> 

                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_document">
                                <i class="fa fa-file"></i> <b>Document</b>
                            </a>
                            <a href="/projects/update/" class="btn btn-primary btn-block">
                                <i class="fa fa-edit"></i><b>Edit</b>
                            </a><br/><br/>
                        </div>

                        <div class="col-xl-9">
                            <div class="row mb-3">
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-success shadow">
                                        <div class="card-body" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase" style="font-size: 14pt">PAID</div>
                                                    <div class="dropdown-divider"></div>
                                                    <div class="mb-0 font-weight-bold" style="font-size: 14pt">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow">
                                        <div class="card-body" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase" style="font-size: 14pt; color:#FFC300">OPEN INVOICES</div>
                                                    <div class="dropdown-divider"></div>
                                                    <div class="mb-0 font-weight-bold" style="font-size: 14pt">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow">
                                        <div class="card-body" style="cursor: pointer">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase" style="font-size: 14pt">OVERDUE INVOICES</div>
                                                    <div class="dropdown-divider"></div>
                                                    <div class="mb-0 font-weight-bold" style="font-size: 14pt">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="nav-wrapper">
                                        <ul id="tabs-icons-text" role="tablist" class="nav nav-pills nav-fill flex-column flex-md-row">
                                            <li class="nav-item">
                                                <a id="invoices-tab" data-toggle="tab" href="#invoices-content" 
                                                  role="tab" aria-controls="invoices-content" aria-selected="false" 
                                                  class="nav-link mb-sm-3 mb-md-0 active">
                                                    <i class="fa fa-money-bill mr-2"></i>Invoices
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="transactions-tab" data-toggle="tab" href="#transactions-content" 
                                                  role="tab" aria-controls="transactions-content" aria-selected="true" 
                                                  class="nav-link mb-sm-3 mb-md-0">
                                                    <i class="fas fa-hand-holding-usd mr-2"></i>Workorders
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br/> 

                                    <div class="card">
                                        <div id="myTabContent" class="tab-content">
                                            <div id="invoices-content" role="tabpanel" aria-labelledby="invoices-tab" class="tab-pane fade show active">
                                                <div class="table-responsive">
                                                    <table id="tbl-invoices" class="table table-flush table-hover">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
                                                                <th>Number</th> 
                                                                <th class="text-center">Amount</th> 
                                                                <th class="text-left">Invoice Date</th> 
                                                                <th class="text-left">Due Date</th> 
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead> 
                                                    {{--<tbody>
                                                            @foreach($invoices as $value)
                                                            <tr>
                                                                <td>
                                                                    <a href="/manage_invoice/detail/{{ $value->id }}">{{ $value->inv_number }}</a>
                                                                </td> 
                                                                <td class="text-center">${{ $value->total }}</td> 
                                                                <td class="text-left">{{ $value->invoice_date }}</td> 
                                                                <td class="text-left">{{ $value->issue_data }}</td> 
                                                                <td>

                                                                    <span class="badge badge-pill badge-primary my--2">Draft</span>
                                                                </td>
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>--}}
                                                    </table>
                                                </div> 
                                            </div>
                                            <div id="transactions-content" role="tabpanel" aria-labelledby="transactions-tab" class="tab-pane fade show">
                                                <div class="table-responsive">
                                                    <table id="tbl-transactions" class="table table-hover">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
                                                                <td>No</td>
                                                                <td>Date</td> 
                                                                <td>Amount</td> 
                                                                <td>Status</td> 
                                                            </tr>
                                                        </thead> 
                                                    {{--<tbody>
                                                            @foreach($workorders as $value)
                                                            <tr>
                                                                <td>{{ $value->order_number }}</td> 
                                                                <td>{{ $value->start_date }}</td> 
                                                                <td>${{ $value->budget }}</td> 
                                                                <td>{{ $value->status_wo }}</td> 
                                                            </tr>
                                                            @endforeach
                                                        </tbody>--}}
                                                    </table>
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
    </div>
</div>
@endsection
