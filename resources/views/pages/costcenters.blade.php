@extends('layouts.index')

@section('title')
X Pro - Cost Centers
@endsection


@section('content')
<br/>
<div class="content-wrapper">    
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Cost center</span></h4>
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
                        <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item active">Cost center</span>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="breadcrumb justify-content-center">                        
                        <a href="/create_cost_center" class="breadcrumb-elements-item">
                            <i class="icon-add mr-2"></i>
                            Create Cost Centers
                        </a>

                        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear mr-2"></i>
                            Choose Cost Center
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Cost Center Report</a>
                            <a class="dropdown-item" href="#">Accounts without Cost Center</a>
                            <a class="dropdown-item" href="#">Account with Cost Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
        <br>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table" id="dataTableMultii" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>1</td>
                                <td>Sahtia Murti</td>
                                <td>123</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary mb-2">Transaction</button>
                                    <button type="submit" class="btn btn-outline-info mb-2">Actions</button>
                                    <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>2</td>
                                <td>Saht</td>
                                <td>3</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary mb-2">Transaction</button>
                                    <button type="submit" class="btn btn-outline-info mb-2">Actions</button>
                                    <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
