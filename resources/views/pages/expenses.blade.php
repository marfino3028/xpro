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
<br/>
<div class="content-wrapper">
    <section class="content">

        <div class="row">
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
        </div>

        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between">
                            <div>
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <select class="custom-select">
                                                <option selected>Date</option>
                                                <option value="1">Custom</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="inlineFormInputGroup">
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="inlineFormInputGroup">
                                        </div>
                                        <div class="col-auto">
                                            <select class="custom-select">
                                                <option value="">Any Category</option>
                                                @foreach($category as $l)
                                                    <option>{{ $l->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto justify-content-end">
                                <a href="/expenses/category" class="btn btn-outline-primary mb-2"><i class="fas fa-cog"></i>Category</a>
                                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-file-import"></i> Import</button>
                                <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-chart-pie"></i></button>
                                <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#newExpenseModal"><i class="fas fa-plus"></i> New Expenses</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <!-- <form action=""></form> -->
                        <div class="card-body">
                            <div class="row justify-content-start">
                                <div class="col-auto">
                                    <button type="button" id="btn_delete" class="btn btn-sm btn-danger mb-2 " onclick="deleteData()" disabled><i class="fas fa-trash"> </i> Delete</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-envelope"> </i> Change Category </button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-check"> </i> Change Vendor</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-file-pdf"> </i> Print PDF</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-file-export"> </i> Create Invoice</button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table" id="Example1" width="100%" cellspacing="0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th style="width:2%;">#</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Country</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- start -->
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
                    <!-- end -->
                </div>
            </div>
        </div>
    </section>
</div>  
@endsection

@push('js')
    <script>
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
              url: '{{ url('/')}}/expenses/ajax',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="9" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
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
          { data: 'country', name: 'country'},
          { data: 'description', name: 'description'}, 
          { data: null, bSortable: false, mRender: function(data, type, full) {
              return `<p>$${data.price}</p>`
          }},
      ],
      language: {
              loadingRecords: "&nbsp;",
              processing: 'Loading...'},
      })

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