@extends('layouts.index')

@section('title')
X Pro - Add Work Orders
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create Work Orders</span></h4>
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
                    <a href="/work_order" class="breadcrumb-item">Work Orders</a>
                    <span class="breadcrumb-item active">Create</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                    <div class="breadcrumb-elements-item dropdown p-0">
                        <div class="dropdown-menu dropdown-menu-right">
                            
                        </div>
                    </div>
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
                        <h5 class="card-title">Create Work Orders</h5>
                        <div class="header-elements">
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('postworkorder') }}" method="POST" enctype="multipart/form-data">
                            @csrf  
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-weight: bold">Order Number</p>
                                        <input required type="text" class="font-weight-semibold form-control @error('work_number') is-invalid @enderror" id="work_number" name="work_number" readonly value="{{ $work_number }}">
                                        @error('work_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <p style="font-weight: bold">Client <span style="color: red">*</span></p>
                                        <select required class="text-capitalize js-example-basic-single form-control" name="client_id" id="client_id">
                                            <option value="">Select Clients</option>
                                            @foreach($showClient as $field)
                                            <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p style="font-weight: bold">Start Date</p>
                                        <input type="datetime-local" class="font-weight-semibold form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate">
                                        @error('startDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <p style="font-weight: bold">Hourly Rate <span style="color: red">*</span></p>
                                        <input required type="number" class="font-weight-semibold form-control @error('hourly_rate') is-invalid @enderror" id="hourly_rate" name="hourly_rate" placeholder="0.00">
                                    </div>
                                </div>                                   

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-weight: bold">Title <span style="color: red">*</span></p>
                                        <input required type="text" class="font-weight-semibold form-control @error('title') is-invalid @enderror" id="title" name="title">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    <p style="font-weight: bold">Asign Staff <span style="color: red">*</span></p>
                                        <select required class="text-capitalize js-example-basic-single form-control select-fixed-multiple" multiple="multiple" data-fouc id="id_staff">
                                            @foreach($showStaff as $field)
                                            <option value="{{ $field -> id}}">{{ $field -> name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p style="font-weight: bold">End Date <span style="color: red">*</span></p>
                                        <input type="datetime-local" class="font-weight-semibold form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate">
                                        {{-- <input type="time" class="form-control" name="timeendDate"> --}}
                                        @error('endDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <p style="font-weight: bold">Budget <span style="color: red">*</span></p>
                                        <input required type="number" class="font-weight-semibold form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="0.00">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-weight: bold">Tags <span style="color: red">*</span></p>
                                    {{--<input required type="text" class="form-control tags-input" value="" id="tagging" data-fouc>--}}
                                        <select required class="text-capitalize js-example-basic-single form-control select-fixed-multiple" multiple="multiple" data-fouc id="tagging">
                                            @foreach($showProject as $Project)
                                            <option value="{{ $Project -> project_name  }}">{{ $Project -> project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <p style="font-weight: bold">Priority Level <span style="color: red">*</span></p>
                                        <select required class="text-capitalize js-example-basic-single form-control" name="priority_level" id="priority_level">
                                            <option value="">Select Priority Level</option>
                                            <option value="Urgent">Urgent</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p style="font-weight: bold"> Received Work Order Date<span style="color: red">*</span></p>
                                        <input required type="datetime-local" class="font-weight-semibold form-control @error('delivered_date') is-invalid @enderror" id="delivered_date" name="delivered_date">
                                        @error('delivered_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    <p style="font-weight: bold"> Attachment <span style="color: red">*</span></p>
                                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_document">
                                            <i class="fa fa-file"></i> <b>Document</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover">
                                        <thead style="background-color: #293a50; color: #FFF;">
                                            <tr>
                                                <td>Description</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <textarea required class="text-capitalize font-weight-semibold form-control" name="description" id="description" rows="2"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead style="background-color: #293a50; color: #FFF;">
                                            <tr>
                                                <td>Action</td>
                                                <td>Item</td>
                                                <td width="150">Total Stock</td>
                                                <td>Quantity</td>
                                            </tr>
                                        </thead>
                                        <tbody id="element_table">
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary mt-2 mb-2" style="color: white" id="add_row"/><i class="icon-plus-circle2 mr-2"></i> Add New Item </button>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                                        <div class="btn-group">
                                                
                                        </div>
        
                                        <div class="mt-2 mt-sm-0">
                                            <a href="/work_orders" class="btn btn-light ml-3">Close</a>
                                            <button type="button" class="btn bg-primary-400" id="save" form="form"><i class="icon-checkmark3 mr-2"></i> Save</button>
                                            <button type="button" class="btn bg-info-400" id="save_draft" form="form"> Save Draft</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Document -->
<div class="modal fade" id="modal_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Document Work Orders</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="upload_form" action="/upload/documents">
                @csrf
                <input type="hidden" name="project_name" value="">
                <input type="hidden" name="project_id" value="">
                <div class="modal-body">
                    <div class="row" id="row">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="file" class="form-control-file" name="document">
                    <button class="btn btn-primary form-control" id="submit_document" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> uploading..." type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    //$('.tags-input').tagsinput();
    $('.select-fixed-multiple').select2();
    //console.log($("#tagging").tagsinput('items'))
    $(document).ready(function() {
        let i = 1;
        var select_item = function() {
            var sudah = $('#combination').val(
                $("#element_table .js-example-basic-single").map(function(index, element) {
                    return $(element).val();
                }).get().join("+")
            );
        };
        var add_row = function(index) {
            var new_row = $(`<tr class="tr_input">
                                <td data-name="del" class="text-center">
                                        <button name="del0" class='btn btn-sm btn-danger icon-trash' id="delete_row"></button>
                                    </td>
                                    <td>
                                        <select class="js-example-basic-single selectproduct form-control" name="selectproduct" style="width: 100%" id="selectproduct_${index}">
                                            <option >Select Product</option>
                                            @foreach ($showProduct as $field)
                                                <option value="{{ $field->id }}|{{ $field->name }}|{{ $field->price }}|{{ $field->stock }}">{{ $field->name }}</option>
                                            @endforeach 
                                            </select>
                                    </td>
                                    <td  width="150" data-name="stock">
                                        <input readonly type="number" name='stock' class="stock form-control" id="stock_${index}" />
                                    </td>
                                    <td data-name="qty">
                                        <input type="hidden" name="productid"  id="productid_${index}">
                                        <input type="number" name='quantity' class="input quantity form-control" id="qty_${index}" />
                                        <small style="display: none; color: red; margin-left: 5px; margin-right: 5px; font-size: 12px; margin-top: 2px" id="reminder_${index}">stock level after: 1</small>
                                    </td>
                            </tr>`).appendTo("#element_table");

            select_item();
            new_row.find('.js-example-basic-single').select2({
                theme: "bootstrap",
                tags: true
            });
            new_row.find('.js-example-basic-single').on('change', select_item);
            new_row.find("#delete_row").click(function() {
                i--
                $(this).parents("tr").remove();
                select_item();
            });
        };
        
        add_row(i);

        
        let quantity = function() {
            $('.quantity').each(function (index, obj) {
                index++
                let get_id = obj['id'];
                let split_id = get_id.split('_')[1];
                $(`#${get_id}`).keyup(function(){
                    let qty = $(`#qty_${split_id}`).val();
                });
            });
        }


        let selectproduct = function() {
            $('.selectproduct').each(function (index, obj) {
                let get_id = obj['id'];
                let split_id = get_id.split('_')[1];
                $(`#selectproduct_${split_id}`).on('change', function() {
                    var str = this.value;
                    var tes = str.split("|");
                    var id = tes[0];
                    var description = tes[1];
                    var price = tes[2];
                    var stock = tes[3];
                    console.log(tes)
                    //$(`#description`).val(description);
                    $(`#unitprice_${split_id}`).val(price);
                    $(`#productid_${split_id}`).val(id);
                    $(`#stock_${split_id}`).val(stock);
                });
            });
        }

        selectproduct();
        quantity();

        $("#add_row").click(function() {
            i++
            add_row(i)
            selectproduct()
            quantity()
        });
    
        
    });


    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "bootstrap",
            tags: true
        });
        $('.select2-tax').select2({
            theme: "bootstrap",
            tags: true
        }).on('select2:open', () => {
            $(".select2-results:not(:has(a))").append(
                '<a href="/work_order_settings-1" style="padding: 6px;height: 20px;display: inline-table;">Add New Tax</a>'
            );
        })
    });

    $('#qty').keyup(function() {
        var reminder = document.getElementById("reminder");
        let value = $('#qty').val();
        if (value == false) {
            reminder.style.display = 'none';
        } else {
            let stock_after = $('#stock').val() - value
            $('#reminder').text(`stock after level: ${stock_after}`);
            reminder.style.display = 'block';
        }
        console.log(value);
    });

    $(document).on('click', '#save', function() {
        swalInit.fire({
            title: 'Are you sure?',
            text: "Do you want to save!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save it!'
        }).then((result) => {
            if (result.dismiss == "cancel") {
                return false 
            }
            if (result) {
                let product = [];
                let data = {
                    id_clients: $(`#client_id`).find(":selected").val(),
                    work_number: $(`#work_number`).val(),
                    startDate: $(`#startDate`).val(),
                    hourly_rate: $(`#hourly_rate`).val(),
                    title: $(`#title`).val(),
                    //id_staff: $(`#id_staff`).find(":selected").val(),
                    endDate: $(`#endDate`).val(),
                    budget: $(`#budget`).val(),
                    //tagging: $("#tagging").tagsinput('items'),
                    tagging: $("#tagging").val(),
                    id_staff: $("#id_staff").val(),
                    priority_level: $(`#priority_level`).find(":selected").val(),
                    delivered_date: $(`#delivered_date`).val(),
                    description: $(`#description`).val(),
                }

                $('.selectproduct').each(function (index, obj) {
                        let get_id = obj['id'];
                        let split_id = get_id.split('_')[1];
                        product.push({
                            product_id: $(`#productid_${split_id}`).val(),
                            qty: $(`#qty_${split_id}`).val(),
                        });
                    });
                data = {
                    ...data,
                    product
                }
                $.ajax({
                    url: "/add_work_order",
                    type: "post",
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: JSON.stringify(data)
                    },
                    success: function(res) {
                        if(res.success) {
                            return window.location = res.data.redirect_uri
                        }
                        return alert('failed added data');
                    }
                });
            }
        })
    });
</script>
@endpush