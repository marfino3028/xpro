@extends('layouts.index')

@section('title')
    X Pro - Add Project Assets
@endsection

@section('content')
<br/>
<!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
        <h5 class="m-0 font-weight-bold text-primary">Project Asset Add</h5>
          <div class="table-responsive">
            <form action="{{ route('postaddprojectname') }}" method="post" enctype="multipart/form-data"> 
              @csrf   
              <div id="individual" class="desc">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 required">
                      <label for="exampleFormControlInput1">Project Name</label>
                        <select class="js-example-basic-single form-control" name="project_name" id="project_name">
                            <option selected value="">Choose Project Name</option>
                            @foreach($showProject as $value)
                            <option value="{{ $value->project_name }}" data-company="{{ $value->company_name }}">{{ $value->project_name }}</option>
                            @endforeach
                        </select>
                    </div> 
                    
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Company Name</label>
                          <input type="text" readonly class="form-control" placeholder="Company Name" name="company" id="company">
                    </div>  
                  </div>
                  <div class="modal-footer">
                    <a href="/project_asset_list" class="btn btn-icon btn-outline-danger header-button-top">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text"><b>Cancel</b></span>
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                        <i class="fas fa-save"></i>
                        <span class="text"><b>Save</b></span>
                    </button>
                  </div>
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

    $('#project_name').on('change', function() {
        let company = $(this).find(':selected').data("company");
        $('#company').val(company);
    });
  });
</script>
@endpush