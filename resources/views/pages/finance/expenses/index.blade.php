@extends('layouts.index')

@section('title')
X Pro - Expenses
@endsection

@section('content')

@if (session('success-add'))
<div class="alert alert-success">
    {{ session('success-add') }}
</div>
@elseif (session('failed-add'))
<div class="alert alert-danger">
    {{ session('failed-add') }}
</div>
@endif 

<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Detail Expanses</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
            {{--<div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                </div>--}}
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('manage_invoice') }}" class="breadcrumb-item">Expanses</a>
                    <span class="breadcrumb-item active">Update</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                {{--<div class="breadcrumb-elements-item dropdown p-0">
                        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear mr-2"></i>
                            More
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">List Detail Expenses</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#newExpenseModal"><i class="fas fa-plus"></i> New Expenses</button>
                                <button type="button" id="btn_delete" class="btn btn-sm btn-danger" onclick="deleteData()" disabled><i class="fas fa-trash"> </i> Delete</button>
                            </div>
                        </div>
                    </div>        

                    <table class="table" id="Example1" width="100%">
                        <thead>
                            <tr>
                                <td style="width:2%;">#</td>
                                <td>Name</td>
                                <td>Date</td>
                                <td>Description</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Download</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <div class="modal fade" id="newExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Expenses</h5>
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
                                            <label for="message-text" class="col-form-label">Price:</label>
                                            <textarea class="form-control @error('price') is-invalid @enderror" id="price" name="price"></textarea>
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Upload Receipt:</label>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
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
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Category:</label>
                                            <select data-placeholder="Select your client"  class="form-control form-control-select2" style="width: 100%;" name="category" id="category">
                                                <option selected="selected" disabled> Select Category </option>
                                                @foreach ($category as $o)
                                                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                                                @endforeach
                                            </select>                                           @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Date:</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                                            @error('date')
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
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@push('js')
<script>
    var setFilter;
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
                url: '{{ url('/')}}/expenses/ajax',
                'data': {
                    ...data,
                    category: '{{ request()->route("id") }}'
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
            { data: null, bSortable: false, mRender: function(data, type, full) {
                return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
            }},
            { data: 'name', name: 'name'},
            { data: 'date', name: 'date'},
            //{ data: 'country', name: 'country'},
            { data: 'description', name: 'description'}, 
            { data: 'category', name: 'category'},
            { data: null, bSortable: false, mRender: function(data, type, full) {
                return `<p>$<b> ${data.price} </b></p>`
            }},
            { data: null, bSortable: false, mRender: function(data, type, full) {
                return `<a href="${data.image}" target="_blank">Download</a>`
            }},
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

    function deleteData(id) {
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
                url: '{{ url('/')}}/expenses/delete',
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: data_id
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
        if (this.checked) {
            x.push(this.value);
        } else {
            var index = x.indexOf(this.value);
            x.splice(index, 1);
        }
        $("#btn_delete").attr("disabled", false);
        if (x < 1) {
            $("#btn_delete").attr("disabled", true);
        }
    });

    $('#upload_form').on('submit',function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{url('')}}/expenses',
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
                    $('#date').val('');
                    $('#price').val('');
                    swalInit.fire(response.message, '', 'success');
                }else{
                    $('#name').val('');
                    $('#description').val('');
                    $('#date').val('');
                    $('#price').val('');
                    swalInit.fire(response.message, '', 'error');
                }
                $('#newExpenseModal').modal('hide');
            },
            error: function (response) {
                swalInit.fire(response.message, '', 'error');
                $('#name').val('');
                $('#description').val('');
                $('#date').val('');
                $('#price').val('');
            }
        });
    })

    </script>
@endpush