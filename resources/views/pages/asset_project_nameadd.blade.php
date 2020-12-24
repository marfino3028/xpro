@extends('masters/index_1')

@section('title')
    X Pro - Project Name Asset List Add
@endsection

@section('css')
  <!-- perbaikan layout -->
  <link rel="stylesheet" href="{{ asset('custom/css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('custom/admin-lte/plugin/iCheck/square/blue.css') }}">
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h2 class="d-inline-flex mb-0 long-texts" style="font-family: 'Open Sans', sans-serif">Project Name Asset List Add</h2>
          <div class="table-responsive">
            <form action="{{ route('postProjectNameList') }}" method="post" enctype="multipart/form-data"> 
              @csrf   
              <input data-name="project_name_list_id" hidden name="project_name_list_id" value="{{ $project_asset_name_id }}" class="form-control">
              <div id="individual" class="desc">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="Example1" class="table">
                      <thead class="bg-primary text-white h6">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Record</th>
                        </tr>
                      </thead>
                      <tbody id="element_table">
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 required">
                      <input type="button" class="btn btn-sm btn-primary float-left text-white" id="add_row" value="Add New Row" />
                    </div> 
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
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('js')
  <!-- Page level plugins -->
  <script src="{{ asset('js/dropdown-search.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
  $(document).ready(function() {
      let i = 1;
      var select_item = function() {
        var sudah = $('#combination').val(
            $("#element_table .js-example-basic-single").map(function(index, element) {
                return $(element).val();
            }).get().join("+")
        );
      };
      var add_row = function(index) {
          var new_row = $(`<tr class="tr_input">
                              <td data-name="del" class="text-center">
                                  <button name="del0" class='btn btn-sm btn-danger fa fa-trash' id="delete_row" style="margin-top: 5px;"></button>
                              </td>
                              <td data-name="title">
                                  <input type="text" name='title' placeholder='Title' class="title form-control" id="title_${index}" />
                              </td>
                              <td data-name="data">
                                  <input type="text" name='data' placeholder='Record' class="data form-control" id="data_${index}" />
                              </td>
                          </tr>`).appendTo("#element_table");

          select_item();
          new_row.find('.js-example-basic-single').select2({
              theme: "bootstrap",
              tags: true
          });
          new_row.find('.js-example-basic-single').on('change', select_item);
          new_row.find("#delete_row").click(function() {
              i--
              $(this).parents("tr").remove();
              select_item();
          });
      };
    
      add_row(i);    

      $("#add_row").click(function() {
          i++
          add_row(i)
      });   
    });
  </script>
@endsection