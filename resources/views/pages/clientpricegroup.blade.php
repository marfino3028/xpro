@extends('layouts.index')

@section('title')
X Pro - Price Group
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Price Group</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-success mb-2"><i class="fas fa-plus"></i> Add Price Group</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow mb-4">
            <table class="table">
                <tbody>
                    <tr>
                        <td align="left" valign="middle"><h6 class="ml-2 mt-3">Coming</h6></td>
                        <td align="right" valign="middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle mt-2 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><hr>
                                <div class="dropdown-menu">
                                    <a class=" fas fa-pencil-alt" href="#"> Edit</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle"><h6 class="ml-2 mt-3">Test Group Price</h6></td>
                        <td align="right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle mt-2 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><hr>
                                <div class="dropdown-menu">
                                    <a class=" fas fa-pencil-alt" href="#"> Edit</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card shadow mb-4" style="display: none;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Price Group</h6>
            </div>

            <div class="card-body">
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
                                            <h6 class="m-0 font-weight-bold text-info">#1 Project - 2020-02-27</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-caret-down fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"> </i>  Edit</a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"> <i class="fas fa-trash"> </i>  Delete</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <ul style="list-style-type:none">
                                                        <li><i class="fas "></i>This is Title</li>

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
    </section>
</div>
@endsection