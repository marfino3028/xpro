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
          <div class="content-header d-flex justify-content-between">
            <div>
            </div>
            <div class="col-auto justify-content-end" style="margin-right: -15px;">
                <a href="/add_asset_project_name_list/add/{{ $project_name_list_id }}" class="btn btn-sm btn-outline-success mb-2">
                    <i class="fa fa-plus"></i> <b>Add New</b>
                </a>&nbsp;
                <div style="display: none; float:right;" id="filter">
                  <button type="button" onclick="deleteProjectNameList()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                </div>
            </div>
          </div>
          <div class="table-responsive">
            <table id="Example1" class="table table-hover">
              <thead class="bg-primary text-white">
                  <tr>
                      <th class="align-middle" width="5%">#</th>
                      <th class="align-middle">Data 1</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
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
  $('.select-dropdown').select2();

  var table = $('#Example1').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      paging: true,
      select: true,
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/asset_project_name_list/detail-ajax/{{ $project_name_list_id }}',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
                console.log(res);
              callback(res);
              }
          })
      },
      columns: [
        { data: null, bSortable: false, bSortable: false, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'data_array', name: 'Type Template' },
      ],
      language: {
          loadingRecords: "&nbsp;",
          processing: 'Loading...'},
  }) 

  function deleteProjectNameList(id) {
    var projects_assetname_id = []
    if (id != null) {
      projects_assetname_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        projects_assetname_id.push($(this).val());
      });
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url('/')}}/asset_project_name_list/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: projects_assetname_id
              },
              dataType: 'json',
              success: function(res){
                if (res.success) {
                  Swal.fire('Deleted!', '', 'success');
                  $('#Example1').DataTable().ajax.reload();
                }
              }
          })
        }
    })
  }

  $("#Example1").on('change',"input[type='checkbox']",function(e){
      var x = [];
      var filter = document.getElementById("filter");
      if (this.checked) {
          x.push(this.value);
      } else {
          var index = x.indexOf(this.value);
          x.splice(index, 1);
      }
      filter.style.display = "block";
      if (x < 1) {
          filter.style.display = "none";
      }
  });           
</script>
@endsection