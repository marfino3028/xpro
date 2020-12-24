@extends('layouts.index')

@section('title')
X Pro - Journals
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Journals</h6>
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between">
                            <div>
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <select class="custom-select">
                                                <option selected>Account</option>
                                                <option value="1">Any Account</option>
                                                <option value="2">Other Expense</option>
                                                <option value="3">Sales</option>
                                                <option value="4">Sales Shipping</option>
                                                <option value="5">Sales Return</option>
                                                <option value="6">Cost of Sales</option>
                                                <option value="7">Purchases</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" placeholder="Description">
                                        </div>
                                        <div class="col-auto">
                                            <select class="custom-select">
                                                <option selected>Date</option>
                                                <option value="1">Custom</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="inlineFormInputGroup">
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="inlineFormInputGroup">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-primary">Filter</button>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="col-auto justify-content-end">
                                        <button type="submit" class="btn btn-outline-info mb-2"><i class="fas fa-book"></i> Journal Logs</button>
                                        <button type="submit" class="btn btn-outline-success mb-2"><i class="fas fa-plus"></i> Add Journal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <!-- <form action=""></form> -->
                        <div class="card-body">
                            <div class="row justify-content-start">
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="dataTableMulti" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width:2%;">#</th>
                                                <th>Customer Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <!-- Dropdown Card Example -->
                                                    <div class="card border-left-success">
                                                        <!-- Card Header - Dropdown -->
                                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-info">#1 - 2020-02-27</h6>
                                                            <div class="dropdown no-arrow">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-caret-down fa-sm fa-fw text-gray-400"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                                    <div class="dropdown-header">Action:</div>
                                                                    <a class="dropdown-item" href="#"> <i class="fas fa-search"> </i>  View</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"> </i>  Edit</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#"> <i class="fas fa-link"> </i>  View Source</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <ul style="list-style-type:none">
                                                                        <li><i class="fas fa-user"></i> Income Project</li>
                                                                        <li><i class="fas fa-clock"></i> 2020-03-05</li>
                                                                    </ul>                    
                                                                    <span class="badge badge-secondary">Main</span>
                                                                    <i class="fas fa-arrow-right"></i>
                                                                    <span class="badge badge-secondary">Sugar</span>
                                                                </div>
                                                                <div>
                                                                    <ul style="list-style-type:none">
                                                                        <li><h2>Rp 100.000</h2><li> 
                                                                        <li><h5>$12.50</h5><li> 
                                                                        <li class="badge badge-secondary">Auto</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>          
                                        </tbody>
                                    </table>
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
