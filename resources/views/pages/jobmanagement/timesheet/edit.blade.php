@extends('layouts.index')

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit Timesheet Work Orders</span></h4>
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
                    <a href="" class="breadcrumb-item">Timesheet</a>
                    <span class="breadcrumb-item active">Edit Work Orders</span>
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
                <h5 class="card-title">Edit Timesheet Work Order</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>
            @if (session('successUpdateTime'))
            <div class="card-body">
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">{{ session('successUpdateTime') }}</span>
                </div>
            </div>
            @endif
            <form action="{{ route('postupdatetimesheet', ['id' => $data->id ]) }}" method="POST">
                @csrf     
                <div id="individual" class="desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Work Order</label>
                                    <input type="text" class="form-control font-weight-semibold" id="exampleFormControlInput1" value="{{ $workorder->order_number }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="text" class="form-control font-weight-semibold" id="exampleFormControlInput1"value="{{ $data->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Description</label>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Description" name="description" value="{{ $data->description }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div style="display: none" id="show_workoffice">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Work Office</label>
                                        <input type="text" class="form-control" placeholder="Work Office" name="work_office" id="work_office">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p style="font-weight: bold">Start Date</p>
                                    <input @if($data->time_start != null) value="{{ date('Y-m-d\TH:i', strtotime($data->time_start)) }}" @endif type="datetime-local" class="font-weight-semibold form-control @error('startDate') is-invalid @enderror" id="start_date" name="time_start" id="picker">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p style="font-weight: bold">End Date</p>
                                    <input @if($data->time_end != null) value="{{ date('Y-m-d\TH:i', strtotime($data->time_end)) }}" @endif type="datetime-local" class="font-weight-semibold form-control @error('endDate') is-invalid @enderror" id="end_date" name="time_end">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                            <div class="btn-group">
                            
                            </div>

                            <div class="mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-success" >Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
<script>
    $('#workorder_id').on('change', function () {
        let value = this.value;
        var filter = document.getElementById("show_workoffice");
        if (value == "no_workorder") {
            filter.style.display = "block";
        } else {
            filter.style.display = "none";
        }
    });
</script>
@endpush