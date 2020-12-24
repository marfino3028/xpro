@extends('layouts.index')

@push('css')
<style>
  .button-table {
    border-radius: 12px;
    background-color: white;
    color: black;
  }
  .active, .button-table:hover{
   background-color: #2950C3;
   color: white;
 }
 .dataTable > thead > tr > th[class*="sort"]:before,
  .dataTable > thead > tr > th[class*="sort"]:after {
      content: "" !important;
  }
</style>
@endpush

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
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/appointments" class="breadcrumb-item">Appointments</a>
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
                <h5 class="card-title">Appointments</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="" class="btn btn-sm btn-outline-primary">
                            <i class="icon-cog3"></i>
                        </a>
                        <a href="{{ route('createappointments') }}" class="btn btn-sm btn-outline-success">
                            <i class="icon-plus"></i> Add New
                        </a>
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteManagePurchaseOrders()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-left: 20px;">
                <button type="submit" id="upcoming" class="btn btn-sm btn-outline-primary active btn-filter"><b>Upcoming</b></button>
                <button type="submit" id="today" class="btn btn-sm btn-outline-primary btn-filter"><b>Today</b></button>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="table-responsive table-upcoming">                                          
                          <table id="Example1" class="table table-lg" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>Name</th>
                                    <td>App&nbsp;Date</td>
                                    <td>Purpose</td>
                                    <td>Type</td>
                                    <td>Assign&nbsp;To</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- today table -->
                    <div class="table-responsive table-today" style="display: none;">
                        <div class="table-responsive">                                          
                            <table id="Example2" class="table table-lg" style="width: 100%;">
                                <thead>
                                    <tr>
                                      <td>Name</th>
                                      <td>App&nbsp;Date</td>
                                      <td>Purpose</td>
                                      <td>Type</td>
                                      <td>Assign&nbsp;To</td>
                                      <td>Status</td>
                                      <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <!-- Page level plugins -->

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
      autowidth: false,
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/appointments/ajax',
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
          return '<div class="font-weight-light" style="color: black;"><!--img src="{{asset("uploads/")}}" alt="Logo" class="rounded-circle mr-3" width="30"-->'+data.full_name+'</div><div style="font-size: 14px;"> #'+data.id+'</div>';
        }},
        { data: null, mRender: function(data, type, full) {
          return '<div class="font-weight-light" style="color: black;">'+data.getDate+'</div> <div class="font-weight-light" style="font-size: 14px; color: #2950C3;">'+data.getTime+'</div>';
        }},
        { data: 'purpose'},
        { data: null, mRender: function(data, type, full) {
          return 'Staff';
        }},
        { data: 'name'},
        { data: null, mRender: function(data, type, full) {
            if(data.status == 'Pending' ) {
              return `<a href="" class="badge badge-danger align-top" style="font-size: 9pt;">Pending</a>`;
            }else{
              return `<a href="" class="badge badge-success align-top" style="font-size: 9pt;">Accept</a>`;
            }
        }},        
        { data: null, mRender: function(data, type, full) {
          if(data.status == 'Accept') {
            return `<a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/appointments/detail/${data.id}" class="dropdown-item" title="View"><i class="icon-eye"></i> View Data</a>
                        <a href="/appointments/Edit/${data.id}" class="dropdown-item" title="Edit"><i class="icon-pencil3"></i> Update Data</a>
                        <a href="/appointments/delete/${data.id}" class="dropdown-item" title="Delete"><i class="icon-trash"></i> Delete Data</a>
                      </div>`;
          }else{
            return `<a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/appointments/detail/${data.id}" class="dropdown-item" target="_blank" title="View"><i class="icon-eye"></i> View Data</a>
                        <a href="/appointments/Edit/${data.id}" class="dropdown-item" target="_blank" title="Edit"><i class="icon-pencil3"></i> Update Data</a>
                        <a href="/appointments/accept/${data.id}" class="dropdown-item" target="_blank" title="Accept"><i class="icon-check"></i> Accept Data</a>
                        <a href="/appointments/delete/${data.id}" class="dropdown-item" target="_blank" title="Decline"><i class="icon-cancel-circle2"></i> Decline Data</a>
                      </div>`;
          }
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

  $(function() {
  let params = (new URL(document.location)).searchParams;
  let filter = params.get("filter");
  var table = $('#Example2').DataTable({
    paging: true,
      processing: false,
      serverSide: false,
      select: true,
      autowidth: false,
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/appointments/ajax-today',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example2 > tbody').html(
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
        { data: 'full_name'},
        { data: null, mRender: function(data, type, full) {
          return '<div class="font-weight-light" style="font-size: 14px; color: black;">'+data.getDate+'</div> <div class="font-weight-light" style="font-size: 14px; color: #2950C3;">'+data.getTime+'</div>';
        }},
        { data: 'purpose'},
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return 'Staff';
        }},
        { data: 'name'},
        { data: null, mRender: function(data, type, full) {
            if(data.status == 'Pending' ) {
              return `<a href="" class="badge badge-danger align-top" style="font-size: 9pt;">Pending</a>`;
            }else{
              return `<a href="" class="badge badge-success align-top" style="font-size: 9pt;">Accept</a>`;
            }
        }},        
        { data: null, mRender: function(data, type, full) {
          return `<a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="/appointments/detail/${data.id}" class="dropdown-item" target="_blank" title="View"><i class="icon-eye"></i> View Data</a>
                    <a href="/appointments/Edit/${data.id}" class="dropdown-item" target="_blank"><i class="icon-pencil3" title="Edit"></i> Update Data</a>
                    <!--a href="" class="dropdown-item" target="_blank"><i class="fas fa-check" title="Accept"></i></a>
                    <a href="" class="dropdown-item" target="_blank"><i class="fas fa-times" title="Cancel"></i></a-->
                  </div>`;
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


  $('.select-dropdown').select2();

  $(document).ready(function(){
    $(".btn-filter").click(function(){
      $(".btn-filter").removeClass("active");
      $(this).addClass("active");
    })
  })

  $(document).ready(function(){
    $("#upcoming").click(function(){
      $(".table-today").hide();
      $(".table-upcoming").show();
    });
    $("#today").click(function(){
      $(".table-upcoming").hide();
      $(".table-today").show();
    });
  })
</script>
@endpush