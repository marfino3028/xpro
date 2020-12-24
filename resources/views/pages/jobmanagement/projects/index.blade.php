@extends('layouts.index')
@section('title')
X Pro - Project Management
@endsection

@section('content')
@if (session('add'))
<div class="alert alert-success">
  {{ session('add') }}
</div>
@endif
@if (session('update'))
<div class="alert alert-success">
  {{ session('update') }}
</div>
@endif 
@if (session('delete'))
<div class="alert alert-danger">
  {{ session('delete') }}
</div>
@endif
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/projects" class="breadcrumb-item">Project</a>
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
                <h6 class="card-title">Project</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="/add_new_projects" class="btn btn-sm btn-outline-success">
                            Add New
                        </a>
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteProjects()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="Example1" class="table table-lg invoice-archive">
                    <thead>
                      <tr>
                        <td style="width:2%;">#</th>
                        <td>Project&nbsp;Name</td>
                        <td>Client&nbsp;Name</td>
                        <td>Company</td>
                        <td>Status&nbsp;Information</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                  </table>
                  @csrf
                </form>
            </div>
          </div>
      </div>
</div>
@endsection

@push('js')
<script>

  $('.select-dropdown').select2();

  $(function() {
  let params = (new URL(document.location)).searchParams;
  let filter = params.get("filter");
  var table = $('#Example1').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      language: {
          search: '<span>Filter : </span> _INPUT_',
          searchPlaceholder: 'Type to filter...',
          lengthMenu: '<span>Show : </span> _MENU_',
          paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
      },
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/projects/ajax',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="9" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
                callback(res);
              }
          })
      },
      columns: [
        { data: null, bSortable: false, mRender: function(data, type, full) {
              return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
          }},
          { name: 'project_name', render:function(data, type, row){
              return `<a id="btn_edit" href="/projects/detail/${row.id}">${row.project_name}</a>`
          }},
          { data: 'client.full_name', name: 'client'},
          { data: 'client.business_name', name: 'company'},
          { data: null, mRender: function(data, type, full) {
              if(data.status_information == 1) {
                  return '<span class="badge badge-warning">Pending</span>';
              }
              if(data.status_information == 4) {
                  return '<span class="badge badge-danger">Cancel</span>';
              }
              if(data.status_information == 2) {
                  return '<span class="badge badge-success">Ongoing</span>';
              }
              if(data.status_information == 3) {
                  return '<span class="badge badge-success">Finished</span>';
              }
          }},                 
          { data: null, bSortable: false, mRender: function(data, type, full) {
              return `<form class="d-inline" id="delete"
                          action="/estimates/detail/${data.id}" method="POST">
                          @csrf
                          <a href="/projects/update/${data.id}" class="btn btn-outline-primary" id="btn_new_operator" title="Edit">
                              <i class="icon-pencil3" aria-hidden="true"></i>
                          </a>
                          <a href="/projects/detail/${data.id}" class="btn btn-outline-primary" title="View">
                              <i class="icon-eye" aria-hidden="true"></i>
                          </a>
                          <button type="button" class="btn btn-outline-danger font-weight-bold" onclick="deleteProjects(${data.id})" title="Delete" >
                            <i class="icon-trash" aria-hidden="true"></i>
                          </button>
                          <button class="btn btn-outline-primary icon-menu9" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Status">
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="/projects/update-status?id=${data.id}&status=3">Finished</a>
                              <a class="dropdown-item" href="/projects/update-status?id=${data.id}&status=2">Ongoing</a>
                              <a class="dropdown-item" href="/projects/update-status?id=${data.id}&status=1">Pending</a>
                              <a class="dropdown-item" href="/projects/update-status?id=${data.id}&status=4">Cancel</a>
                          </div>
                      </form>`;
          }}
      ],
      language: {
              loadingRecords: "&nbsp;",
              processing: 'Loading...'},
      })
      setFilter = function (filter) {
          $('#filter').val(filter);
          table.draw()
      }
      
  });
  function deleteProjects(id) {
    var projects_id = []
    if (id != null) {
      projects_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        projects_id.push($(this).val());
      });
    }
    swalInit.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.dismiss == "cancel") {
                return false 
            }
        if (result) {
          $.ajax({
            url: '{{ url('/')}}/projects/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: projects_id
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
@endpush