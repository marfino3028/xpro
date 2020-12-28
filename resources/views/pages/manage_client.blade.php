@extends('layouts.index')


@section('content')
@if (session('add'))
<div class="alert alert-success">
    {{ session('add') }}
</div>
@endif
@if (session('update'))
<div class="alert alert-success">
    {{ session('update') }}
</div>
@endif 
@if (session('delete'))
<div class="alert alert-danger">
    {{ session('delete') }}
</div>
@endif 
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Manage Clients</span></h4>
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
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/project_asset_list" class="breadcrumb-item">Manage Clients</a>
                    <span class="breadcrumb-item active">Archive</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                    <a href="/add_new_client" class="breadcrumb-elements-item">
                        <i class="icon-add mr-2"></i>
                        Create Clients
                    </a>
                    <a type="submit" class="breadcrumb-elements-item deleteButton">
                        <i class="icon-trash mr-2"></i>
                        Delete Clients
                    </a>
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
                <h6 class="card-title">Manage Clients</h6>
            <form action="/manage_client/delete_multiple" method="post" class="formDelete">
            </div>  

            <div class="table-responsive">
                <table id="Example1" class="table table-lg">
                    <thead>
                        <tr>
                            <th style="width:2%;">#</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Mobile Number</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Unpaid</th>
                            <th class="text-center">Status</th>
                        {{--<th class="text-center">Enabled</th>--}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($showData as $field)
                        <tr>
                            <td><input type="checkbox" name="id_client[]" value="{{ $field->id }}"></td>
                            <td class="text-center"><a id="btn_edit" href="{{ route('detailclient', ['id' => $field->id ]) }}">{{ $field->full_name }}</a></td>
                            <td class="text-center">{{ $field->mobile }}</td>
                            <td class="text-center">{{ $field->email }}</td>
                            <td class="text-center"> {{ $field->street}}, {{ $field->city}}, {{ $field->province}}</td>
                            <td class="text-center font-weight-bold"><span class="badge badge-flat border-danger text-danger-600">$ {{ number_format($field->total, 0, '.', ',') }}</span></td>
                            <td class="text-center"> @if ($field->status_client == '1') <span class="badge badge-light badge-striped badge-striped-left border-left-success"> Active </span> @else <span class="badge badge-light badge-striped badge-striped-left border-left-danger"> Suspend </span> @endif </td>
                        {{--<td class="text-center">
                                <input type="checkbox" data-size="small" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger">
                            </td>--}}
                            <td class="text-center">
                                <form class="d-inline" id="delete"
                                      action="{{ route('invoice.destroy', [$field->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('detailclient', ['id' => $field->id ]) }}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Detail</a>
                                        <a href="/manage_client/edit_clients/{{ $field->id }}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                                        <a href="{{ route('deleteclients', ['id' => $field->id ]) }}" class="dropdown-item" id="btn_new_operator"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
                                        <a href="" class="dropdown-item"><i class="icon-shield-check"></i> Suspend</a>
                                        <a href="" class="dropdown-item"><i class="icon-shield-notice" aria-hidden="true"></i> Active</a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection