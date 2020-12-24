@extends('layouts.index')

@section('title')
X Pro - Manage Staff Role
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
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Staff Profile</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/manage_staff_roles" class="breadcrumb-item">Manage Staff Roles</a>
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
    
    <!-- Circle Buttons -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Invoice archive -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Manage Staff Roles</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a href="" class="btn btn-outline-primary">
                                <i class="icon-cog3"></i>
                            </a>
                            <a href="{{ route('addstaffroles') }}" class="btn btn-sm btn-outline-success">
                                <b>Add New</b>
                            </a>
                            <div style="display: none; float:right;" id="filter">
                                &nbsp;<button type="button" onclick="deleteStaffRoles()" class="btn btn-sm btn-outline-danger deleteButton"> <b>Delete</b></button>                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="Example1" class="table table-lg" style="width:100%">
                        <thead>
                            <tr>
                                <td style="width: 5%">#</th>
                                <td>Role Name</td>
                                <td>Actions</td>
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
@endsection

@push('js')
<script>
  $('.select-dropdown').select2();

  var table = $('#Example1').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/manage_staff_roles/ajax',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="3" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
        { data: 'name_role', name: 'Name Role'},
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/manage_staff_roles/edit_staff_roles/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="/manage_staff_roles/delete/${data.id}" class="dropdown-item"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
                     </div>
                  </form>`;
        }} 
      ],
      language: {
          loadingRecords: "&nbsp;",
          processing: 'Loading...'},
  }) 

  function deleteStaffRoles(id) {
    var roles_id = []
    if (id != null) {
      roles_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        roles_id.push($(this).val());
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
            url: '{{ url('/')}}/manage_staff_roles/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: roles_id
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