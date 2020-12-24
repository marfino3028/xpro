@extends('layouts.index')

@section('title')
    X Pro - Add Assets Name
@endsection

@section('content')
<br>
<!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h5 class="m-0 font-weight-bold text-primary">Asset Name Add</h5>
          <div class="table-responsive">
            <form action="{{ route('addAssetName') }}" method="POST">
              @csrf
              <input data-name="project_name_id" hidden name="project_name_id" value="{{ $project_name_id }}" class="form-control">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 required">
                    <label for="asset_name" class="form-control-label">Asset Name</label> 
                      <input data-name="asset_name" placeholder="Asset Name" required="required" name="asset_name" type="text" value="" id="asset_name" class="form-control">
                  </div> 
                  
                  <div class="form-group col-md-6 required">
                    <label for="exampleFormControlInput1">Type Template</label>
                      <select class="js-example-basic-single form-control"name="type_template" id="type_template">
                        <option selected>Choose Type Template</option>
                        <option value="Network">Network</option>
                        <option value="CCTV">CCTV</option>
                        <option value="Alarm">Alarm</option>
                        <option value="Intedure">Intedure</option>
                        <option value="Recording">Recording</option>
                        <option value="Server">Server</option>
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