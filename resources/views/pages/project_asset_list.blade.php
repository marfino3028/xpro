@extends('layouts.index')

@section('content')
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
                    <a href="/project_asset_list" class="breadcrumb-item">Project Asset List</a>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <div id="filter" style="display: none;">
                        <button type="button" class="dropdown-item" onclick="deleteProjectName()"><i class="icon-trash red-text"></i> Delete</button>
                    </div>
                    <a href="/add_project_asset" class="breadcrumb-elements-item">
                        <i class="icon-add mr-2"></i>
                        Create Project Assets
                    </a>

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
                <h6 class="card-title">Project Asset List</h6>                
            </div>  
            <table id="Example1" class="table table-lg invoice-archive">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Project&nbsp;Name</td>
                        <td>Company</td>
                        <td>Creat&nbsp;Date</td>
                        <td>Update&nbsp;Date</td>
                        <td>Last&nbsp;User&nbsp;Update</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(3, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="table-active table-border"><td colspan="7" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
                    );

                    last = group;
                }
            });

            // Initializw Select2
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }
            $('.form-control-select2').select2({
                width: 150,
                minimumResultsForSearch: Infinity
            });
        },
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/project_asset_list/ajax',
              'data': {
                  ...data,
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="7" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
              callback(res);
              }
          })
      },
      columns: [
        { data: null,  mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'project_name', name: 'Project Name', render:function(data, type, row){
            return '<a href="/asset_name/detail/'+ row.id +'"><b>'+ row.project_name +'</b></a>'
        }},
        { data: 'company', name: 'Company'},
        {data: 'created_at', name: 'End Date', render: function (data, type, row) {
            return moment(row.created_at).format('D MMM Y hh:mm A');
        }},
        {data: 'updated_at', name: 'End Date', render: function (data, type, row) {
            return moment(row.updated_at).format('D MMM Y');
        }},
        { data: 'last_update_user', name: 'Last User Update'},
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_name/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/project_asset_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-info22" aria-hidden="true"></i> Information</a>
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
  function deleteProjectName(id) {
    var projects_name_id = []
    if (id != null) {
      projects_name_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        projects_name_id.push($(this).val());
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
            url: '{{ url('/')}}/project_asset_list/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: projects_name_id
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