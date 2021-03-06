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
                    <a href="" class="breadcrumb-item">Asset Name</a>
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
                <h6 class="card-title">Project Asset List</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="/add_asset_name/add/{{ $project_name_id }}" class="btn btn-sm btn-outline-success">
                            <i class="fa fa-plus"></i> <b>Add New</b>
                        </a>&nbsp;
                        <div style="display: none; float:right;" id="filter">
                            <button type="button" onclick="deleteProjectName()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> <b>Delete</b></button>                
                        </div>
                    </div>
                </div>
            </div>  
            <div class="table-responsive">      
                <table id="Example1" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;#</th>
                            <td>Asset&nbsp;Name</td>
                            <td>Type&nbsp;Template</td>
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
            @csrf
            </form>
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
                        '<tr class="table-active table-border-double"><td colspan="7" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
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
              url: '{{ url('/')}}/asset_name/detail-ajax/{{ $project_name_id }}',
              'data': {
                  ...data
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
                console.log(res);
              callback(res);
              }
          })
      },
      columns: [
        { data: null, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'asset_name', name: 'Asset Name', render:function(data, type, row){
            return '<a href="/asset_project_name_list/detail/'+ row.id +'"><b>'+ row.asset_name +'</b></a>'
        }},
        { data: 'type_template', name: 'Type Template'},
        {data: 'created_date', name: 'Creat Date', render: function (data, type, row) {
            return moment(row.created_at).format('D MMM Y hh:mm A');
        }},
        {data: 'updated_at', name: 'Update Date', render: function (data, type, row) {
            return moment(row.created_at).format('D MMM Y hh:mm A');
        }},
        { data: 'last_update_user', name: 'last Update User' },
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_project_name_list/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/asset_name/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
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
            url: '{{ url('/')}}/asset_name/delete',
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
@endpush