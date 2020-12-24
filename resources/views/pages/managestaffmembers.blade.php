@extends('layouts.index')

@section('title')
X Pro - Staff Members
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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Manage Staff</span></h4>
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
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="#" class="breadcrumb-item">Manage Staff</a>
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
                <h6 class="card-title">Manage Staff</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="/add_staff_member" class="btn btn-sm btn-outline-success">
                            <i class="fa fa-plus"></i> <b>Add New</b>
                        </a> &nbsp;

                        <div style="display: none; float:right;" id="filter">
                            <button type="button" onclick="NonActiveStaffMembers()" class="btn btn-sm btn-outline-danger deleteButton"><i class="icon-cross2"> </i><b> Non Active </b></button>                
                        </div>

                        <div style="display: none; float:right;" id="filter2">
                            <button type="button" onclick="ActiveStaffMembers()" class="btn btn-sm btn-outline-success deleteButton"><i class="icon-checkmark3"> </i><b> Active </b></button>                
                        </div>
                    </div>
                </div>
            </div> 

            <div style="margin-left: 20px;">
                <button type="submit" id="aktif" class="btn btn-sm btn-outline-success active btn-filter"><b>Active</b></button>
                <button type="submit" id="tidakaktif" class="btn btn-sm btn-outline-danger btn-filter"><b>Non Active</b></button>
            </div>

            <div class="table-responsive table-aktif">
                <table id="Example1" class="table table-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last&nbsp;Login</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive table-tidakaktif" style="display: none;">
                <table id="Example2" class="table table-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last&nbsp;Login</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('js')
  <script>

    $(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");
    var table = $('#Example1').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/manage_staff_members/ajax',
              'data': {
                  ...data,
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="8" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
              callback(res);
              }
          })
      },
      columns: [
        { data: null, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: null, name: 'Name', className: "text-capitalize", render:function(data, type, row){
            return '<a href="/manage_staff_members/detail/'+ row.id +'"><b>'+ row.name +'</b></a>'
        }},
        { data: 'email', name: 'Email'},
        { data: 'last_login', name: 'Last Login', render: function (data, type, row) {
            return moment(row.last_login).format('D MMM Y hh:mm A');
        }},
        { data: 'name_role', name: 'Name Role', className: "text-capitalize" },
        { data: null, name: 'Status', mRender: function(data, type, full) {
            return `<ul class="list list-unstyled mb-0">
                        <li class="dropdown">
                            <a href="#" class="badge bg-${data.status == 1 ? 'success': 'danger'}-400 align-top dropdown-toggle" data-toggle="dropdown">${data.status == 1 ? 'Active': 'No Active'}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/manage_staff_members/update-status?id_staff=${data.id}&status=1" class="dropdown-item ${data.status == 1 ? 'active': ''}"><i class="icon-checkmark3"></i> Active</a>
                                <a href="/manage_staff_members/update-status?id_staff=${data.id}&status=0" class="dropdown-item ${data.status == 0 ? 'active': ''}"><i class="icon-cross2"></i> Non Active</a>
                            </div>
                        </li>
                    </ul>`;
        }},
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                        @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/manage_staff_members/edit_staff_members/${data.id}" class="dropdown-item"><i class="icon-pencil4" aria-hidden="true"></i> View Data</a>
                        {{--<a href="/project_asset_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-info22" aria-hidden="true"></i> Information</a>--}}
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Send login details</a>
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Login as Staff Member</a>
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Change Staff Member Password</a>
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

    $(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");
    var table = $('#Example2').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/manage_staff_members/no_active/ajax',
              'data': {
                  ...data,
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example2 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="8" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
              callback(res);
              }
          })
      },
      columns: [
        { data: null, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: null, name: 'Name', render:function(data, type, row){
            return '<a href="/manage_staff_members/detail/'+ row.id +'"><b>'+ row.name +'</b></a>'
        }},
        { data: 'email', name: 'Email'},
        { data: 'last_login', name: 'Last Login', render: function (data, type, row) {
            return moment(row.last_login).format('D MMM Y hh:mm A');
        }},
        { data: 'role_user.name_role', name: 'Name Role' },
        { data: null, name: 'Status', mRender: function(data, type, full) {
            return `<ul class="list list-unstyled mb-0">
                        <li class="dropdown">
                            <a href="#" class="badge bg-${data.status == 1 ? 'success': 'danger'}-400 align-top dropdown-toggle" data-toggle="dropdown">${data.status == 1 ? 'Active': 'No Active'}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/manage_staff_members/update-status?id_staff=${data.id}&status=1" class="dropdown-item ${data.status == 1 ? 'active': ''}"><i class="icon-checkmark3"></i> Active</a>
                                <a href="/manage_staff_members/update-status?id_staff=${data.id}&status=0" class="dropdown-item ${data.status == 0 ? 'active': ''}"><i class="icon-cross2"></i> Not Active</a>
                            </div>
                        </li>
                    </ul>`;
        }},
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                        @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/manage_staff_members/edit_staff_members/${data.id}" class="dropdown-item"><i class="icon-pencil4" aria-hidden="true"></i> View Data</a>
                        {{--<a href="/project_asset_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-info22" aria-hidden="true"></i> Information</a>--}}
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Send login details</a>
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Login as Staff Member</a>
                        <a class="dropdown-item" href="#"><i class="" aria-hidden="true"></i> Change Staff Member Password</a>
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

    function NonActiveStaffMembers(id) {
        var staff_id = [];
        if (id != null) {
            staff_id.push(id)
        } else {
            $("input:checkbox[class=checkbox]:checked").each(function () {
                staff_id.push($(this).val());
            });
        }
        swalInit.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Non Active it!'
        }).then((result) => {
            if (result.dismiss == "cancel") {
                    return false 
                }
            if (result) {
                $.ajax({
                    url: '{{ url('/')}}/manage_staff_members/nonactive',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: staff_id
                    },
                    dataType: 'json',
                    success: function(res){
                        if (res.success) {
                        swalInit.fire('Non Active!', '', 'success');
                        $('#Example1').DataTable().ajax.reload();
                        }
                    }
                })
            }
        })
    }

    function ActiveStaffMembers(id) {
        var staff_id = [];
        if (id != null) {
            staff_id.push(id)
        } else {
            $("input:checkbox[class=checkbox]:checked").each(function () {
                staff_id.push($(this).val());
            });
        }
        swalInit.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Active it!'
        }).then((result) => {
            if (result.dismiss == "cancel") {
                    return false 
                }
            if (result) {
                $.ajax({
                    url: '{{ url('/')}}/manage_staff_members/active',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: staff_id
                    },
                    dataType: 'json',
                    success: function(res){
                        if (res.success) {
                        swalInit.fire('Active!', '', 'success');
                        $('#Example2').DataTable().ajax.reload();
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

    $("#Example2").on('change',"input[type='checkbox']",function(e){
        var x = [];
        var filter2 = document.getElementById("filter2");
        if (this.checked) {
            x.push(this.value);
        } else {
            var index = x.indexOf(this.value);
            x.splice(index, 1);
        }
        filter2.style.display = "block";
        if (x < 1) {
            filter2.style.display = "none";
        }
    }); 

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

    $(document).ready(function(){
        $(".btn-filter").click(function(){
            $(".btn-filter").removeClass("active");
            $(this).addClass("active");
        })
    })
    $(document).ready(function(){
            $("#aktif").click(function(){
            $(".table-tidakaktif").hide();
            $(".table-aktif").show();
        });
            $("#tidakaktif").click(function(){
            $(".table-aktif").hide();
            $(".table-tidakaktif").show();
        });
    })
</script>
@endpush