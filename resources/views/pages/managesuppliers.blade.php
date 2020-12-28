@extends('layouts.index')

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Suppliers</span></h4>
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
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Suppliers</span>
                    <span class="breadcrumb-item active">Archive</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <div style="display: none; float:right;" id="filter">
                        <button type="button" onclick="deleteManageSuplier()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                    </div>
                    <a href="{{route('addsuppliers')}}" class="breadcrumb-elements-item">
                        <i class="icon-add mr-2"></i>
                        Create Suppliers
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
                <h6 class="card-title">Suppliers</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="" type="submit" class="btn btn-sm btn-primary" title="Logs">
                            <i class="icon-info3"></i>
                        </a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item reload_table" data-action="reload" id="reload_table"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>     

            <table id="Example1" class="table table-lg invoice-archive">
                <thead>
                    <tr>
                        <td style="width:5%">#</td>
                        <td>Business&nbsp;Name</td>
                        <td>Name</td>
                        <td>Country</td>
                        <td>Status</td>
                        <td>Email</td>
                        <td>Actions</td>
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
              url: '{{ url('/')}}/manage_suppliers/ajax',
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
        { data: null, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { name: 'project_name', render:function(data, type, row){
              return `<a id="btn_edit" href="/manage_suppliers/summary/${row.id}">${row.business_name}</a>`
        }},
        { data: null, render:function(data, type, row){
          return `${data.first_name} ${data.last_name}`;
        }},
        { data: 'country', name: 'Country'},
        { data: null, className: "text-center", render:function(data, type, row){
            return `<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
                        <option value="Active" ${data.status == 'Active' ? 'selected': ''}>Active</option>
                        <option value="Expired" ${data.status == 'Expired' ? 'selected': ''}>Expired</option>
                    </select>`;
        }},
        { data: 'email', name: 'Email'},
        { data: null, className: "text-center", mRender: function(data, type, full) {
          return `<a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/manage_suppliers/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/manage_suppliers/Edit/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="/manage_suppliers/delete/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
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
  function deleteManageSuplier(id) {
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
        confirmButtonText: projects_name_id
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