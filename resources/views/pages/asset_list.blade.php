@extends('layouts.index')

@section('title')
X Pro - Assets
@endsection

@section('content')
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
                    <a href="" class="breadcrumb-item">Assets List - {{ $dataAssetName->type_template }}</a>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <a href="#" class="breadcrumb-elements-item">
                        <i class="icon-comment-discussion mr-2"></i>
                        Support
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
                <h6 class="card-title">Assets List - {{ $dataAssetName->type_template }}</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <div style="display: none;" id="filter">
                            <button type="button" onclick="deleteAssetNameList()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                    <div class="col-auto justify-content-end">
                        <a href="/add_asset_project_name_list/add/{{ $project_asset_name_id }}" class="btn btn-sm btn-outline-success mb-2">
                            <i class="fa fa-plus"></i> <b>Add New</b>
                        </a>
                        <a href="/asset_project_name_list/export_csv" class="btn btn-sm btn-outline-primarry mb-2">
                            <i class="fa fa-plus"></i> <b>Export CSV</b>
                        </a>
                        {{--<a href="" class="btn btn-sm btn-outline-primary mb-2">
                            <i class="fa fa-flash"></i> <b>Deploy Agent</b>
                        </a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-2">
                            <i class="fa fa-barcode"></i> <b>Inc. Patch Scan</b>
                        </a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-2">
                            <i class="fa fa-barcode"></i> <b>Full Patch Scan</b>
                        </a>--}}
                    </div>
                </div>
            </div>   
            <div class="table-responsive">
                @if ($dataAssetName->type_template == "Network")
                <table id="Network" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Asset&nbsp;ID</td>
                            <td>Name</td>
                            <td>Source</td>
                            <td>IP&nbsp;Address</td>
                            <td>Serial</td>
                            <td>Manufacture</td>
                            <td>Disabled</td>
                            <td>Storage&nbsp;Capacity</td>
                            <td>Type</td>
                            <td>OS&nbsp;Name</td>
                            <td>OS&nbsp;Type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                @elseif ($dataAssetName->type_template == "Recording")
                <table id="Recording" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Description</td>
                            <td>Server</td>
                            <td>Days&nbsp;Recording</td>
                            <td>Recording</td>
                            <td>Motion&nbsp;Recording</td>
                            <td>Codec</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                @elseif ($dataAssetName->type_template == "Camera")
                <table id="Camera" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Type</td>
                            <td>Description</td>
                            <td>Server</td>
                            <td>Camera</td>
                            <td>Model</td>
                            <td>Camera&nbsp;Serial&nbsp;Number</td>
                            <td>MAC&nbsp;Address</td>
                            <td>IP&nbsp;Address</td>
                            <td>Netmask</td>
                            <td>User</td>
                            <td>Pass</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                @elseif ($dataAssetName->type_template == "Server")
                <table id="Server" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Location</td>
                            <td>Brand</td>
                            <td>Model</td>
                            <td>Serial&nbsp;Nnumber</td>
                            <td>Hostname</td>
                            <td>Service&nbsp;Tag</td>
                            <td>IP&nbsp;Address</td>
                            <td>Subnet&nbsp;Mask</td>
                            <td>Default&nbsp;gateway</td>
                            <td>Pref&nbsp;IP&nbsp;Dns</td>
                            <td>Alter&nbsp;IP&nbsp;Dns</td>
                            <td>User</td>
                            <td>Pass</td>
                            <td>Storage&nbsp;Live&nbsp;DB&nbsp;total</td>
                            <td>Storage&nbsp;Archive</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                @endif
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
    var table = $('#Network').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/asset_project_name_list/detail-ajax/{{ $project_asset_name_id }}',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="12" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
        { data: null, className: "text-center", mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'asset_id', name: 'Asset ID', className: "text-center" },
        { data: 'name', name: 'Name', className: "text-center"},
        { data: 'source', name: 'Source', className: "text-center"},
        { data: 'ip_address', name: 'Ip Address', className: "text-center"},
        { data: 'serial', name: 'Serial', className: "text-center"},
        { data: 'manufacture', name: 'Manufacture', className: "text-center"},
        { data: 'disabled', name: 'Disabled', className: "text-center"},
        { data: 'storage_capacity', name: 'Storage Capacity', className: "text-center"},
        { data: 'type', name: 'Type', className: "text-center"},
        { data: 'os_name', name: 'OS Name', className: "text-center"},
        { data: 'os_type', name: 'OS Type', className: "text-center"},
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_project_name_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
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
    var table = $('#Recording').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/asset_project_name_list/detail-ajax/{{ $project_asset_name_id }}',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Recording > tbody').html(
                '<tr class="table-active table-border-double"><td colspan="8" class="font-weight-semibold">'+group+'</td></tr>'

              );
              },
              success: function(res){
                console.log(res);
              callback(res);
              }
          })
      },
      columns: [
        { data: null, className: "text-center", mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'description', className: "text-center" },
        { data: 'server', className: "text-center" },
        { data: 'days_recording', className: "text-center" },
        { data: 'recording', className: "text-center" },
        { data: 'motion_recording', className: "text-center" },
        { data: 'codec', className: "text-center" },
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_project_name_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
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
    var table = $('#Camera').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/asset_project_name_list/detail-ajax/{{ $project_asset_name_id }}',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Camera > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="13" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
        { data: 'type', name: null },
        { data: 'description', name: null },
        { data: 'server', name: null },
        { data: 'camera', name: null },
        { data: 'model', name: null },
        { data: 'camera_serial_number', name: null },
        { data: 'mac_address', name: null },
        { data: 'ip_address', name: null },
        { data: 'netmask', name: null },
        { data: 'user', name: null },
        { data: 'password', name: null },
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_project_name_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
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
    var table = $('#Server').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/asset_project_name_list/detail-ajax/{{ $project_asset_name_id }}',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Server > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="14" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
        { data: null, className: "text-center", mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'location', className: "text-center" },
        { data: 'brand', className: "text-center" },
        { data: 'model', className: "text-center" },
        { data: 'serial_number', className: "text-center" },
        { data: 'hostname', className: "text-center" },
        { data: 'service_tag', className: "text-center" },
        { data: 'ip_address', className: "text-center" },
        { data: 'subnet_mask', className: "text-center" },
        { data: 'default_getway', className: "text-center" },
        { data: 'pres_ip_dns', className: "text-center" },
        { data: 'alter_ip_dns', className: "text-center" },
        { data: 'username', className: "text-center" },
        { data: 'password', className: "text-center" },
        { data: 'storage_live_db_total', className: "text-center" },
        { data: 'storage_archive', className: "text-center" },
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/asset_project_name_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
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

  function deleteAssetNameList(id) {
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
@endpush