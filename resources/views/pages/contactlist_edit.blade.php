@extends('layouts.index')

@section('title')
X Pro - Contact List Add
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
                    <a href="/contact_list" class="breadcrumb-item">Contact List</a>
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
                <h5 class="card-title">Contact List Edit</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>

            <form action="{{ route('postupdateContactList', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 required">
                            <label for="name" class="form-control-label">Customer Name</label> 
                            <div class="input-group input-group-merge ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-"></i>
                                    </span>
                                </div> 
                                <input data-name="name" placeholder="Customer Name" required="required" name="name" type="text" value="{{ $data->name }}" required class="form-control">
                            </div> 
                        </div> 

                        <div class="form-group col-md-6 required">
                            <label for="phone_number" class="form-control-label">Phone Number</label> 
                            <div class="input-group input-group-merge ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-"></i>
                                    </span>
                                </div> 
                                <input data-name="phone_number" placeholder="Phone Number" required="required" name="phone_number" type="text" value="{{ $data->phone_number }}" required class="form-control">
                            </div> 
                        </div> 

                        <div class="form-group col-md-6 required">
                            <label for="email" class="form-control-label">Email</label> 
                            <div class="input-group input-group-merge ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-"></i>
                                    </span>
                                </div> 
                                <input data-name="email" placeholder="Email" required="required" name="email" type="email" value="{{ $data->email }}" required class="form-control">
                            </div> 
                        </div>

                        <div class="form-group col-md-3 required">
                            <label for="status" class="form-control-label">Status</label> 
                            <div class="input-group input-group-merge ">
                                <select class="js-example-basic-single form-control"name="status" id="status">
                                    <option value="1" @if($data->status == "1") selected @endif>Active</option>
                                    <option value="0" @if($data->status == "0") selected @endif>Not Active</option>
                                </select>
                            </div> 
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="/contact_list" class="btn btn-sm btn-outline-danger">
                            <b>Cancel</b>
                        </a>
                        <button type="submit" class="btn btn-sm btn-outline-success ml-3">
                            <b>Save</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
        theme: "bootstrap"
    });
    $("input[name$='status']").click(function() {
      var test = $(this).val();
      $("div.desc").hide();
      $("#" + test).show();
    });

    $('#project_name').on('change', function() {
        let company = $(this).find(':selected').data("company");
        $('#company').val(company);
    });
  });
</script>
@endpush