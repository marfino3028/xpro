@extends('layouts.index')

@section('title')
X Pro - Product Settings
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Settings</h6>
                    <div class="card-body">
                        <form>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i>  New Categories</button>
                            </div>
                        </form>
                    </div>


                    <div class="card-body" id="cardMoreOptions">
                        <!-- Nav tabs -->
                        <div class="card-header py">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#menu1">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#menu3">Warehouses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#menu4">Custom Fields</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#menu5">Product Settings</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Content Categories -->
                            <div id="menu1" class=" tab-pane active"><br>
                                <div class="ml-3">
                                    Empty Field
                                </div>
                            </div>
                            <!-- Akhir Content Categories -->
                            <!-- Content Inventory -->
                            <div id="menu2" class=" tab-pane fade"><br>
                                <div class="ml-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" checked />
                                        <label class="form-check-label" for="exampleCheck1">Allow Negative Inventory</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Enable Multiple Units System</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                        <label class="form-check-label" for="exampleCheck3">Enable Bundles And Composite Items System</label>
                                    </div><br>
                                    <span></span>
                                    <div class="col-auto">  
                                        <button type="Submit" class="btn btn-success"><i class="fas fa"></i>Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir content Inventory -->
                            <!-- Content Warehouse -->
                            <div id="menu3" class=" tab-pane fade"><br>
                                <div class="ml-3">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <font class="font-weight-bold ml-3" size="3">Primary</font>
                                                </td>
                                                <td width="320px"></td>
                                                <td width="120px" valign="middle">
                                                    <font class="font-weight-bold" size="1">
                                                    <mark style="background: green; color: white;">ACTIVE</mark>
                                                    </font>
                                                </td>
                                                <td width="80px">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><hr>
                                                        <div class="dropdown-menu">
                                                            <a class=" fas fa-search" href="#"> View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">
                                                    <font class="font-weight-bold" size="2">1-1</font>
                                                    <font class="font-weight-lighter mr-3" size="2"> of 1 result shown</font>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Custom Fields -->
                            <div id="menu4" class=" tab-pane fade"><br>
                                <h3>-</h3>
                            </div>
                            <!-- Akhir Content Fields-->
                            <div id="menu5" class=" tab-pane fade"><br>
                                <div class="">
                                    <select class="form-control" style="width: 300px;">
                                        <option selected>Barcode Type</option>
                                        <option value="1">Code 128</option>
                                        <option value="2">EAN 13</option>
                                    </select>
                                </div>
                                <br>
                                <button class="btn btn-success" type="submit">Save Settings</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection