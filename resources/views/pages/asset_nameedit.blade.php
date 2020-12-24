@extends('layouts.index')

@section('title')
    X Pro - Edit Assets Name
@endsection


@section('content')
<br/>
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
          <h5 class="m-0 font-weight-bold text-primary">Asset Name Edit</h5>
          <div class="table-responsive">
            <form action="{{ route('postupdateAssetName', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <input data-name="project_name_id" hidden name="project_name_id" value="{{ $project_name_id }}" class="form-control">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 required">
                    <label for="asset_name" class="form-control-label">Asset Name</label> 
                      <input data-name="asset_name" placeholder="Asset Name" value="{{ $data->asset_name }}" required="required" name="asset_name" type="text" value="" id="asset_name" class="form-control">
                  </div> 
                  
                  <div class="form-group col-md-6">
                    <label for="type_template" class="form-control-label">Type Template</label> 
                      <select class="js-example-basic-single form-control"name="type_template" id="type_template">
                        <option value="Network" @if($data->type_template == "Network") selected @endif>Network</option>
                        <option value="CCTV" @if($data->type_template == "CCTV") selected @endif>CCTV</option>
                        <option value="Alarm" @if($data->type_template == "Alarm") selected @endif>Alarm</option>
                        <option value="Intedure" @if($data->type_template == "Intedure") selected @endif>Intedure</option>
                        <option value="Recording" @if($data->type_template == "Recording") selected @endif>Recording</option>
                        <option value="Server" @if($data->type_template == "Server") selected @endif>Server</option>
                      </select>
                  </div>  
                </div>
                <div class="modal-footer">
                  <a href="/asset_name/detail/{{ $project_name_id }}" class="btn btn-icon btn-outline-danger header-button-top">
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
        </div>
      </div>
    </div>
  </section>
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
  });
</script>
@endpush