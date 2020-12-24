@extends('layouts.index')

@section('title')
X Pro - Incomes
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 7 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 100.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 30 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 480.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 365 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 7.150.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>

        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Incomes</h6>
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between">
                            <div>
                                <form>
                                    <div class="form-row align-items-center">
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
                                            <select class="custom-select">
                                                <option selected>Category</option>
                                                <option value="1">Any Category</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto justify-content-end">
                                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-cog"></i></button>
                                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-file-import"></i> Import</button>
                                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-chart-pie"></i></button>
                                <button type="submit" class="btn btn-outline-success mb-2"><i class="fas fa-plus"></i> New Income</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-sm btn-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-envelope"> </i> Change Category </button>
                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-check"> </i> Change Vendor</button>
                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-file-pdf"> </i> Print PDF</button>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table" id="dataTableMultii" width="100%" cellspacing="0">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th style="width:2%;">#</th>
                                        <th>Title Project</th>
                                        <th>Time</th>
                                        <th>Country</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                          <!--<td>
                                               Dropdown Card Example -
                                            <div class="card border-left-success">
                                        <!-- Card Header - Dropdown --
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                          <h6 class="m-0 font-weight-bold text-info">#1 Test Project - 2020-02-27</h6>
                                          <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-caret-down fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                              <div class="dropdown-header">Action:</div>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="#"> <i class="fas fa-edit"> </i>  Edit</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="#"> <i class="fas fa-trash"> </i>  Delete</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="#"> <i class="fas fa"> </i>  Voucher</a>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Card Body --
                                        <div class="card-body">
                                          <div class="d-flex justify-content-between">
                                            <div>
                                            <ul style="list-style-type:none">
                                              <li><i class="fas fa-user"></i> Title Project</li>
                                              <li><i class="fas fa-clock"></i> 2020-03-05</li>
                                              <li><i class="fas fa-globe-asia"></i> Indonesia</li>
                                              <li><i class="fas fa-info"></i> this for description</li>
                                            </ul>
                                          </div>
                                          <div>
                                            <ul style="list-style-type:none">
                                            <li><h2>Rp 200.000</h2><li>
                                            </ul>
                                          </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>-->
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection