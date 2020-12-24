@extends('layouts.index')

@section('title')
    X Pro - Assets
@endsection

@push('js')
    <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
@endpush

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h5 class="m-0 font-weight-bold text-primary">Assets List Add - {{ $dataAssetName->type_template }}</h5>
          
          @if ($dataAssetName->type_template == "Network")
          <div class="table-responsive">
            <form action="{{ route('postProjectNameList') }}" method="POST">
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
                      <input data-name="asset_id" placeholder="Enter Asset ID" required="required" name="asset_id" type="text" value="" id="asset_id" class="form-control">
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
                      <input data-name="name" placeholder="Enter Name" required="required" name="name" type="text" value="" id="name" class="form-control">
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
                      <input data-name="source" placeholder="Enter Source" required="required" name="source" type="text" value="" id="source" class="form-control">
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
                    <input data-name="ip_address" placeholder="Enter IP Address" required="required" name="ip_address" type="text" value="" id="ip_address" class="form-control">
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
                      <input data-name="serial" placeholder="Enter Serial" required="required" name="serial" type="text" value="" id="serial" class="form-control">
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
                      <input data-name="manufacture" placeholder="Enter Manufacture" required="required" name="manufacture" type="text" value="" id="password" class="form-control">
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
                      <input data-name="storage_capacity" placeholder="Enter Storage Capacity" required="required" name="storage_capacity" type="text" value="" id="storage_capacity" class="form-control">
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
                      <input data-name="type" placeholder="Enter Type" name="type" type="text" value="" id="type" class="form-control">
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
                      <input data-name="os_name" placeholder="Enter OS Name" name="os_name" type="text" value="" id="os_name" class="form-control">
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
                      <input data-name="os_type" placeholder="Enter OS Type" name="os_type" type="text" value="" id="os_type" class="form-control">
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
                      <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                      <span class="btn-inner--text"><b>Cancel</b></span>
                  </a>

                  <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                      <i class="fas fa-save"></i>
                      <span class="text"><b>Save</b></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
          @elseif ($dataAssetName->type_template == "Recording")
          <div class="table-responsive">
              <form action="{{ route('postProjectNameList') }}" method="POST">
              @csrf
              <input data-name="project_asset_name_id" hidden name="project_asset_name_id" value="{{ $project_asset_name_id }}" class="form-control">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 required">
                      <label for="description" class="form-control-label">Description</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="description" placeholder="Description" required="required" name="description" type="text" value="" id="description" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6 disabled">
                      <label for="serverr" class="form-control-label">Server</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="serverr" placeholder="Server" required="required" name="serverr" type="text" value="" id="serverr" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="days_recording" class="form-control-label">Days Recording</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="days_recording" placeholder="Days Recording" required="required" name="days_recording" type="text" value="" id="days_recording" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="recording" class="form-control-label">Recording</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="recording" placeholder="Recording" required="required" name="recording" type="text" value="" id="recording" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="motion_recording" class="form-control-label">Motion Recording</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="motion_recording" placeholder="Motion Recording" required="required" name="motion_recording" type="text" value="" id="motion_recording" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="codec" class="form-control-label">Codec</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="codec" placeholder="Codec" required="required" name="codec" type="text" value="" id="codec" class="form-control">
                      </div>
                    </div> 
                  </div>
                  <div class="modal-footer">
                    <a href="/asset_project_name_list/detail/{{ $project_asset_name_id }}" class="btn btn-icon btn-outline-danger header-button-top">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text"><b>Cancel</b></span>
                    </a>

                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                        <i class="fas fa-save"></i>
                        <span class="text"><b>Save</b></span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            @elseif ($dataAssetName->type_template == "Camera")
            <div class="table-responsive">
              <form action="{{ route('postProjectNameList') }}" method="POST">
              @csrf
              <input data-name="project_asset_name_id" hidden name="project_asset_name_id" value="{{ $project_asset_name_id }}" class="form-control">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 required">
                      <label for="type" class="form-control-label">Type</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="type" placeholder="Type" required="required" name="type" type="text" value="" id="type" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6 disabled">
                      <label for="description" class="form-control-label">Description</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="description" placeholder="Description" required="required" name="description" type="text" value="" id="description" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="serverr" class="form-control-label">Server</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="serverr" placeholder="Server" required="required" name="serverr" type="text" value="" id="serverr" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="camera" class="form-control-label">Camera</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="camera" placeholder="Camera" required="required" name="camera" type="text" value="" id="camera" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="model" class="form-control-label">Model</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="model" placeholder="Model" required="required" name="model" type="text" value="" id="model" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="camera_serial_number" class="form-control-label">Camera Serial number</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="camera_serial_number" placeholder="Camera Serial number" required="required" name="camera_serial_number" type="text" value="" id="camera_serial_number" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mac_address" class="form-control-label">MAC Address</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="mac_address" placeholder="MAC Address" required="required" name="mac_address" type="text" value="" id="mac_address" class="form-control">
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
                        <input data-name="ip_address" placeholder="IP Address" required="required" name="ip_address" type="text" value="" id="ip_address" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="netmask" class="form-control-label">Netmask</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="netmask" placeholder="Netmask" required="required" name="netmask" type="text" value="" id="netmask" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="user" class="form-control-label">Username</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="netmuserask" placeholder="Username" required="required" name="user" type="text" value="" id="user" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="password" class="form-control-label">Password</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="password" placeholder="Password" required="required" name="password" type="text" value="" id="password" class="form-control">
                      </div>
                    </div> 
                  </div>
                  <div class="modal-footer">
                    <a href="/asset_project_name_list/detail/{{ $project_asset_name_id }}" class="btn btn-icon btn-outline-danger header-button-top">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text"><b>Cancel</b></span>
                    </a>

                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                        <i class="fas fa-save"></i>
                        <span class="text"><b>Save</b></span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            @elseif ($dataAssetName->type_template == "Server")
            <div class="table-responsive">
              <form action="{{ route('postProjectNameList') }}" method="POST">
              @csrf
              <input data-name="project_asset_name_id" hidden name="project_asset_name_id" value="{{ $project_asset_name_id }}" class="form-control">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 required">
                      <label for="device" class="form-control-label">Device</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="device" placeholder="Device" required="required" name="device" type="text" value="" id="device" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6 disabled">
                      <label for="location" class="form-control-label">Location</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="location" placeholder="Location" required="required" name="location" type="text" value="" id="location" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="brand" class="form-control-label">Brand</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="brand" placeholder="Brand" required="required" name="brand" type="text" value="" id="brand" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="model" class="form-control-label">Model</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-"></i>
                        </span>
                      </div> 
                      <input data-name="model" placeholder="Model" required="required" name="model" type="text" value="" id="model" class="form-control">
                      </div> 
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="serial_number" class="form-control-label">Serial Number</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="serial_number" placeholder="Serial Number" required="required" name="serial_number" type="text" value="" id="serial_number" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group col-md-3">
                      <label for="hostname" class="form-control-label">Hostname</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="hostname" placeholder="Hostname" required="required" name="hostname" type="text" value="" id="hostname" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="service_tag" class="form-control-label">Service Tag</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="service_tag" placeholder="Service Tag" required="required" name="service_tag" type="text" value="" id="service_tag" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ip_address" class="form-control-label">IP Address</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="ip_address" placeholder="IP Address" required="required" name="ip_address" type="text" value="" id="ip_address" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="subnet_mask" class="form-control-label">Subnet Mask</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="subnet_mask" placeholder="Subnet Mask" required="required" name="subnet_mask" type="text" value="" id="subnet_mask" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="default_gateway" class="form-control-label">Default Gateway</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="default_gateway" placeholder="Default Gateway" required="required" name="default_gateway" type="text" value="" id="default_gateway" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="pref_ip_dns" class="form-control-label">Pref IP DNS</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="pref_ip_dns" placeholder="Pref IP DNS" required="required" name="pref_ip_dns" type="text" value="" id="pref_ip_dns" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="default_gateway" class="form-control-label">Default Gateway</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="default_gateway" placeholder="Default Gateway" required="required" name="default_gateway" type="text" value="" id="default_gateway" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="alter_ip_dns" class="form-control-label">Alter IP DNS</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="alter_ip_dns" placeholder="Alter IP DNS" required="required" name="alter_ip_dns" type="text" value="" id="alter_ip_dns" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="username" class="form-control-label">Username</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="username" placeholder="Username" required="required" name="username" type="text" value="" id="username" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="password" class="form-control-label">Password</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="password" placeholder="Password" required="required" name="password" type="text" value="" id="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="storage_live_db_total" class="form-control-label">Storage Live DB total</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="storage_live_db_total" placeholder="Storage Live DB total" required="required" name="storage_live_db_total" type="text" value="" id="storage_live_db_total" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="storage_archive" class="form-control-label">Storage Archive</label> 
                      <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-"></i>
                          </span>
                        </div> 
                        <input data-name="storage_archive" placeholder="Storage Archive" required="required" name="storage_archive" type="text" value="" id="storage_archive" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="/asset_project_name_list/detail/{{ $project_asset_name_id }}" class="btn btn-icon btn-outline-danger header-button-top">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text"><b>Cancel</b></span>
                    </a>

                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                        <i class="fas fa-save"></i>
                        <span class="text"><b>Save</b></span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection