@extends('layouts.index')
@section('title')
X Pro - Project Management
@endsection

@section('content')

<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expenses Category</span></h4>
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
                    <span class="breadcrumb-item active">Expenses</span>
                    <span class="breadcrumb-item active">Category</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <div id="filters" style="display: none;">
                        <button type="button" class="dropdown-item" onclick="deleteInvoice()"><i class="icon-trash red-text"></i> Delete</button>
                    </div>
                    <a href="/create_invoice" class="breadcrumb-elements-item" data-toggle="modal" data-target="#newExpenseModal">
                        <i class="icon-add mr-2"></i>
                        Create Category
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- /page header -->

    {{--<div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 7 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $last_7_days }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 30 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $last_30_days }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Last 365 Days</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $last_365_days }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>--}}

    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Expenses Category</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteCategory()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>

            <table id="Example1" class="table table-lg">
                <thead>
                    <tr>
                    <td style="width:2%;">#</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Created At</td>
                    <td>Action</td>
                    </tr>
                </thead>
            </table>
          </div>
      </div>
</div>

<!-- start -->
<div class="modal fade" id="newExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category Expenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="upload_form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-form-label">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="add_expenses" class="btn btn-primary">Save</button>
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end -->

@endsection

@push('js')
<script>
/*var setFilter;
$(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");*/
    var table = $('#Example1').DataTable({
        paging: true,
        processing: false,
        serverSide: false,
        select: true,
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        ajax: function(data, callback){
            $.ajax({
                url: '{{ url('') }}/expenses/category/ajax',
                'data': {
                    ...data
                },
                dataType: 'json',
                beforeSend: function(){
                // Here, manually add the loading message.
                $('#Example1 > tbody').html(
                    '<tr class="odd">' +
                    '<td valign="top" colspan="5" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
            { data: null, mRender: function(data, type, full) {
                return `<a href="/expenses/category-group/${data.id}">${data.name}</a>`;
            }},
            { data: 'description', name: 'description'},
            { data: 'created_at', name: 'Created At'},
            { data: null,  mRender: function (data, type, full) {
                return `<form class="d-inline" action="" method="POST">
                            @csrf                    
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" onclick="deleteCategory(${data.id})" class="dropdown-item"><i class="icon-trash" aria-hidden="true"></i> Delete Data</button>
                            </div>
                        </form>`;
            }} 
        ],
        language: {
                loadingRecords: "&nbsp;",
                processing: 'Loading...'},
        })
    /*setFilter = function (filter) {
        $('#filter').val(filter);
        table.draw()
    }
});*/

function deleteCategory(id) {
    var data_id = []
    if (id != null) {
        data_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        data_id.push($(this).val());
      });
    }
    swalInit.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
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
            url: '{{ url('') }}/expenses/category/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: data_id
              },
              dataType: 'json',
              success: function(res){
                if (res.success) {
                    swalInit.fire('Deleted!', '', 'success');
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

  $('#upload_form').on('submit',function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{url('')}}/expenses/category',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            enctype: 'multipart/form-data',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.success){
                    $('#name').val('');
                    $('#description').val('');
                    swalInit.fire(response.message, '', 'success');
                }else{
                    $('#name').val('');
                    $('#description').val('');
                    swalInit.fire(response.message, '', 'error');
                }
                $('#newExpenseModal').modal('hide');
                $('#Example1').DataTable().ajax.reload();
            },
            error: function (response) {
                swalInit.fire(response.message, '', 'error');
                $('#name').val('');
                $('#description').val('');
            }
        });
    })

</script>
@endpush