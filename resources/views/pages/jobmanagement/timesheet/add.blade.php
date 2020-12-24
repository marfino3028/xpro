@extends('layouts.index')

@section('title')
X Pro - Add New Client
@endsection


@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/time_tracking" class="breadcrumb-item">Timesheet</a>
                    <span class="breadcrumb-item active">add</span>
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
                <h5 class="card-title">Add Timesheet</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="" method="post"> 
                @csrf     
                <div id="individual" class="desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Description</label>
                                    <input type="text" class="form-control" placeholder="Description" name="description" id="description">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Work Order</label>
                                    <select class="js-example-basic-single form-control" name="workorder_id" id="workorder_id">
                                        <option selected value="">Choose WorkOrder</option>
                                        <option value="no_workorder">No WorkOrder</option>
                                        @foreach($data as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="datetime-local" class="font-weight-semibold form-control @error('startDate') is-invalid @enderror" id="start_date" name="start_date" id="picker">
                                    @error('startDate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p style="font-weight: bold">End Date</p>
                                    <input type="datetime-local" class="font-weight-semibold form-control @error('endDate') is-invalid @enderror" id="end_date" name="end_date">
                                    @error('endDate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
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