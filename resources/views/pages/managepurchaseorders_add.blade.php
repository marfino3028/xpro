@extends('layouts.index')

@section('content')
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
                    <a href="/manage_purchase_orders" class="breadcrumb-item">Manage Purchase Order</a>
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
                <h5 class="card-title">Create Manage Purchase Order</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>     
            <section class="content">
                <div class="box box-default">
                    <div class="box-body pad">
                        @if ($message = Session::get('add'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <form action="{{ route('addDataManagePurchaseOrders') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="justify-content: space-between">
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Vendor <span style="color: red">*</span></font>
                                    <select class="js-example-basic-single form-control" style="width: 100%;" name="suplier" id="suplier">
                                        <option selected="selected" disabled>- Select Your Supliers -</option>
                                        @foreach ($showSupliers as $o)
                                        <option value="{{ $o->id }}">{{ $o->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Currency <span style="color: red">*</span></font>
                                    <select class="js-example-basic-single form-control" style="width: 100%;" name="curency" id="curency">
                                        <option selected="selected" disabled>- Select Your Currency -</option>
                                        @foreach ($showSupliers as $o)
                                        <option value="{{ $o->id }}">{{ $o->currency }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Bill Date <span style="color: red">*</span></font>
                                    <input type="datetime-local" class="form-control @error('bil_date') is-invalid @enderror" id="bil_date" name="bil_date" value="">
                                    @error('bil_date')
                                    <strong role="alert">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Due Date <span style="color: red">*</span></font>
                                    <input type="datetime-local" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="">
                                    @error('due_date')
                                    <strong role="alert">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Bill Number <span style="color: red">*</span></font>
                                    <input type="text" class="form-control @error('bill_number') is-invalid @enderror" id="bill_number" name="bill_number" readonly value="{{ $bill_number }}" >
                                    @error('bill_number')
                                    <strong role="alert">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <font style="font-weight: bold">Order Number <span style="color: red">*</span></font>
                                    <input type="text" class="form-control @error('order_number') is-invalid @enderror" id="order_number" name="order_number" placeholder="Enter order number">
                                    @error('order_number')
                                    <strong role="alert">{{ $message }}</strong>
                                    @enderror
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-4 mt-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead class="bg-primary text-white h6">
                                                <tr>
                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">Item</th>
                                                    <th class="text-center" style="width: 10%">Quantity</th>
                                                    <th class="text-center" style="width: 18%">Price</th>
                                                    <th class="text-center">Tax</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="element_table">
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="button" class="btn btn-primary float-left" style="color: white" id="add_row" value="Add New Item" />
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Subtotal">Subtotal</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-usd"></i>
                                                            </span>
                                                        </div>                                                      
                                                    </div>
                                                    <input type="number" placeholder="0.00" name='lastTotal' class="form-control" id="subtotal" readonly />
                                                </div>
                                                <label for="Subtotal">Tax</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-usd"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <input type="number" placeholder="0.00" name='tax' class="form-control" id="tax" readonly />
                                                </div>
                                                <label for="Total">Total</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-usd"></i>
                                                        </span>
                                                    </div> 
                                                    <input type="number" placeholder="0.00" name='lastTotal' class="form-control"
                                                           id="lastTotal" readonly />
                                                </div>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label>Note</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" rows="3" id="isi"
                                      name="isi"></textarea>
                            @error('isi')
                            <strong role="alert">{{ $message }}</strong>
                            @enderror
                            <br/>
                            <a href="/manage_invoice" class="btn btn-icon btn-outline-danger header-button-top">
                                Cancel
                            </a>
                            <button type="button" class="btn btn-outline-success btn-icon-split col-auto ml-3" id="save" form="form">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@push('js')

    <script>
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
                                                        <button name="del0" class='btn btn-outline-danger icon-trash' id="delete_row"></button>
                                                    </td>
                                                    <td>
                                                        <select class="js-example-basic-single selectproduct form-control" name="selectproduct" style="width: 100%" id="selectproduct_${index}">
                                                            <option >Select Product</option>
                                                            @foreach ($showProduct as $field)
                                                                <option value="{{ $field->id }}|{{ $field->name }}|{{ $field->price }}|{{ $field->stock }}">{{ $field->name }}</option>
                                                            @endforeach 
                                                          </select>
                                                    </td>
                                                    <td data-name="qty">
                                                        <input type="hidden" name="productid"  id="productid_${index}">

                                                        <input type="hidden" name="stock" id="stock_${index}" />
                                                        <input type="number" name='quantity' class="input quantity form-control" id="qty_${index}" />
                                                        <small style="display: none; color: red; margin-left: 5px; margin-right: 5px; font-size: 12px; margin-top: 2px" id="reminder_${index}">stock level after: 1</small>
                                                    </td>

                                                    <td data-name="unitprice">
                                                        <input type="number" name='unitprice'  placeholder='0' class="unitprice form-control" id="unitprice_${index}" />
                                                    </td>

                                                    <td data-name="sel">
                                                        <select class="select2-tax selecttax form-control" name="selecttax" id="selecttax_${index}" style="width: 100%">
                                                            @foreach ($showTax as $field)
                                                            <option value="{{ $field->value }}" selected="">{{ $field->name }}({{ $field->value }}%)</option>
                                                        @endforeach
                                                          </select>
                                                    </td>

                                                    <td data-name="total">
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" placeholder="0.00" name='Total' class="total form-control" id="total_${index}" readonly/>
                                                        </div>
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

            let unitprice = function() {
                $('.unitprice').each(function (index, obj) {
                    index++
                    let get_id = obj['id'];
                    let split_id = get_id.split('_')[1];
                    $(`#${get_id}`).keyup(function(){
                        let price = $(`#${get_id}`).val();
                        let qty = $(`#qty_${split_id}`).val();
                        let total = price * qty;
                        $(`#total_${split_id}`).val(total);
                        totalprice();
                    });
                });
            }

            let quantity = function() {
                $('.quantity').each(function (index, obj) {
                    index++
                    let get_id = obj['id'];
                    let split_id = get_id.split('_')[1];
                    $(`#${get_id}`).keyup(function(){
                        let price = $(`#unitprice_${split_id}`).val();
                        let qty = $(`#qty_${split_id}`).val();
                        let total = price * qty;
                        $(`#total_${split_id}`).val(total);
                        totalprice();
                    });
                });
            }

            let totalprice = function() {
                let total = 0;
                let tax = 0;
                $('.total').each(function (index, obj) {
                    let get_id = obj['id'];
                    let split_id = get_id.split('_')[1];
                    let value = obj['value'];
                    let value_tax = $(`#selecttax_${split_id}`).find(":selected").val();
                    let nilai_tax = parseInt(value_tax) / 100 * parseInt(value);
                    total += parseInt(value);
                    tax += parseInt(nilai_tax);
                });
                $('#subtotal').val(total);
                $('#tax').val(tax);
                $('#lastTotal').val(total + tax);
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
                        $(`#description`).val(description);
                        $(`#unitprice_${split_id}`).val(price);
                        $(`#productid_${split_id}`).val(id);
                        $(`#stock_${split_id}`).val(stock);
                    });
                });
            }

            let selecttax = function() {
                $('.selecttax').each(function (index, obj) {
                    let get_id = obj['id'];
                    let split_id = get_id.split('_')[1];
                    $(`#${get_id}`).on('change', function() {
                        totalprice()
                    });
                });
            }

            selectproduct();
            unitprice();
            quantity();
            selecttax();

            $("#add_row").click(function() {
                i++
                add_row(i)
                unitprice()
                selectproduct()
                quantity()
                selecttax()
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
                    '<a href="/invoice_settings" style="padding: 10px;height: 20px;display: inline-table; font-weight: bold;"><i class="fa fa-plus"></i> Add New Tax</a>'
                );
            })
        });

        $(document).on('click', '#add_tax', function() {
            alert('a')
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
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to save!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let product = [];
                        let data = {
                          suplier: $(`#suplier`).find(":selected").val(),
                          curency: $(`#curency`).find(":selected").val(),
                          bil_date: $(`#bil_date`).val(),
                          due_date: $(`#due_date`).val(),
                          bill_number: $(`#bill_number`).val(),
                          order_number: $(`#order_number`).val(),
                          amount: $(`#lastTotal`).val(),
                          sub_total: $(`#subtotal`).val(),
                          tax: $(`#tax`).val(),
                          notes: $(`#isi`).val(),
                        }

                        $('.selectproduct').each(function (index, obj) {
                                let get_id = obj['id'];
                                let split_id = get_id.split('_')[1];
                                product.push({
                                    //product_id: $(`#productid_${split_id}`).val(),
                                    unit_price: $(`#unitprice_${split_id}`).val(),
                                    qty: $(`#qty_${split_id}`).val(),
                                    tax: $(`#selecttax_${split_id}`).find(":selected").val(),
                                    total: $(`#total_${split_id}`).val()
                                });
                            });
                        data = {
                            ...data,
                            product
                        }
                        $.ajax({
                            url: "/add_manage_purchase_orders/add",
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
