@extends('layouts.index')

@section('title')
X Pro - Appointments Detail
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/appointments" class="breadcrumb-item">Appointments</a>
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

    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Detail Appointments</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>
            <div class="main-body">    
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('uploads/'.$showClient[0]-> logo_clients)}}" alt="Logo" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$showClient[0]->full_name}}</h4><br>
                                    <p class="text-secondary mb-1">client</p>
                                    <br>
                                    <button class="btn btn-outline-primary">Message</button>
                                    <a href="/appointments/Edit/{{$showData[0]->id}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Assign To</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$showData[0]->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Staff
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Purpose</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$showData[0]->purpose}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$showData[0]->status}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$showData[0]->getDate}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Time</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$showData[0]->getTime}}
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