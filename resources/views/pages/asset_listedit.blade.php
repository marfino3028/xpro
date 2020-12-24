@extends('layouts.index')

@section('title')
    X Pro - Assets List Edit
@endsection

@push('js')
    <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
@endpush

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
      @if (session('failed'))
          <div class="alert alert-danger">
              {{ session('failed') }}
          </div>
      @endif
      <div class="card">
        <div class="card-body">
          <h5 class="m-0 font-weight-bold text-primary">Assets Edit</h5>
          <div class="table-responsive">
            <form action="{{ route('postupdateProjectNameList', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input data-name="project_asset_name_id" hidden name="project_asset_name_id" value="{{ $project_asset_name_id }}" class="form-control">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 required">
                    <label for="asset_id" class="form-control-label">Asset ID</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="asset_id" placeholder="Enter Asset ID" value="{{ $data->asset_id }}" required="required" name="asset_id" type="text" value="" id="asset_id" class="form-control">
                    </div> 
                  </div> 
                  <div class="form-group col-md-6 disabled">
                    <label for="name" class="form-control-label">Name</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="name" placeholder="Enter Name" value="{{ $data->name }}" required="required" name="name" type="text" value="" id="name" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="source" class="form-control-label">Source</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="source" placeholder="Enter Source" value="{{ $data->source }}" required="required" name="source" type="text" value="" id="source" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="ip_address" class="form-control-label">IP Address</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-"></i>
                      </span>
                    </div> 
                    <input data-name="ip_address" placeholder="Enter IP Address" value="{{ $data->ip_address }}" required="required" name="ip_address" type="text" value="" id="ip_address" class="form-control">
                    </div> 
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="serial" class="form-control-label">Serial</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="serial" placeholder="Enter Serial" value="{{ $data->serial }}" required="required" name="serial" type="text" value="" id="serial" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="manufacture" class="form-control-label">Manufacture</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="manufacture" placeholder="Enter Manufacture" value="{{ $data->manufacture }}" required="required" name="manufacture" type="text" value="" id="password" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="storage_capacity" class="form-control-label">Storage Capacity</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="storage_capacity" placeholder="Enter Storage Capacity" value="{{ $data->storage_capacity }}" required="required" name="storage_capacity" type="text" value="" id="storage_capacity" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="type" class="form-control-label">Type</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="type" placeholder="Enter Type" value="{{ $data->type }}" name="type" type="text" value="" id="type" class="form-control">
                    </div> 
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="os_name" class="form-control-label">OS Name</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="os_name" placeholder="Enter OS Name" value="{{ $data->os_name }}" name="os_name" type="text" value="" id="os_name" class="form-control">
                    </div> 
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="os_type" class="form-control-label">OS Type</label> 
                    <div class="input-group input-group-merge ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="os_type" placeholder="Enter OS Type" value="{{ $data->os_type }}" name="os_type" type="text" value="" id="os_type" class="form-control">
                    </div> 
                  </div> 
                  {{--<div class="form-group col-md-6">
                    <label for="status" class="form-control-label">Status</label> 
                    <div class="input-group input-group-merge ">
                      <input type="checkbox" name="disabled" data-size="small" checked data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div> 
                  </div> --}}
                </div>
                <div class="modal-footer">
                  <a href="/asset_project_name_list/detail/{{ $project_asset_name_id }}" class="btn btn-icon btn-outline-danger header-button-top">
                      <span class="btn-inner-icon"><i class="fas fa-times"></i></span>
                      <span class="btn-inner-text"><b>Cancel</b></span>
                  </a>

                  <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                      <i class="fas fa-save"></i>
                      <span class="text"><b>Save</b></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection
