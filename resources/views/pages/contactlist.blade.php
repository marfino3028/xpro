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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Contact List</span></h4>
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
                    <a href="/contact_list" class="breadcrumb-item">Contact List</a>
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
                <h6 class="card-title">Contact List</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="" class="btn btn-outline-primary">
                            <i class="icon-cog3"></i>
                        </a>
                        <a href="/add_contact_list" class="btn btn-sm btn-outline-success">
                             Add New
                        </a>
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteContactList()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table id="ContactList" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td style="width:2%;">#</td>
                            <td>Customer&nbsp;Name</td>
                            <td>Phone Number</td>
                            <td>Email</td>
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
@endsection

@push('js')
<script>
    $(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");
    var table = $('#ContactList').DataTable({
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
                url: '{{ url('/')}}/contact_list/ajax',
                'data': {
                    ...data,
                },
                dataType: 'json',
                beforeSend: function(){
                // Here, manually add the loading message.
                $('#ContactList > tbody').html(
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
            { data: 'name', name: 'Name' },
            { data: 'phone_number', name: 'Phone Number' },
            { data: 'email', name: 'Email'},
            { data: null,  mRender: function(data, type, full) {
                if(data.status == 1) {
                    return '<span class="badge badge-success" style="font-size: 9.5pt">Active</span>';
                }
                if(data.status == 0) {
                    return '<span class="badge badge-danger" style="font-size: 9.5pt">Not Active</span>';
                }
            }},
            { data: null,  mRender: function(data, type, full) {
            return `<form class="d-inline" id="delete" action="#" method="POST">
                        @csrf
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/contact_list/update/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                            <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-check" aria-hidden="true"></i> Active</a>
                            <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-cancel-circle2" aria-hidden="true"></i> Not Active</a>
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
  function deleteContactList(id) {
    var contact_id = []
    if (id != null) {
      contact_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        contact_id.push($(this).val());
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
            url: '{{ url('/')}}/contact_list/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: contact_id
              },
              dataType: 'json',
              success: function(res){
                if (res.success) {
                  Swal.fire('Deleted!', '', 'success');
                  $('#ContactList').DataTable().ajax.reload();
                }
              }
          })
        }
    })
  }

  $("#ContactList").on('change',"input[type='checkbox']",function(e){
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