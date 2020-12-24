@extends('layouts.index')

@section('title')
    X Pro - Update Estimates
@endsection

@section('content')
    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif

    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Update Estimates</span></h4>
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
                        <a href="{{ route('estimates') }}" class="breadcrumb-item">Estimates</a>
                        <span class="breadcrumb-item active">Update</span>
                    </div>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="breadcrumb justify-content-center">
                        <div class="breadcrumb-elements-item dropdown p-0">

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
                            <h5 class="card-title">Update Estimates</h5>
                            <div class="header-elements">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="box box-default">
                                <div class="box-body pad">
                                    @if ($message = Session::get('add'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                
                                    <form action="{{ route('postData') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row" style="justify-content: space-between">
                                            <div class="col-md-6 mb-2">
                                                <p style="font-weight: bold">Client <span style="color: red">*</span></p>
                                                <select class="js-example-basic-single form-control" style="width: 100%;" name="client_id"
                                                        id="client_id">
                                                        <option selected="selected" disabled>--Select Your Client--</option>
                                                        @foreach ($showClient as $o)
                                                            <option value="{{ $o->id }}" @if($o->id == $data->id_clients) selected @endif>{{ $o->full_name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <p style="font-weight: bold">Estimates Date <span style="color: red">*</span></p>
                                                <input type="datetime-local"
                                                        class="form-control @error('invoice_date') is-invalid @enderror" id="invoice_date"
                                                        name="invoice_date" value="{{ date('Y-m-d\TH:i', strtotime($data->estimates_date)) }}">
                                                    @error('invoice_date')
                                                    <strong role="alert">{{ $message }}</strong>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mb-4 mt-4">
                                                <table class="table table-bordered table-hover" id="tab_logic">
                                                    <thead style="background-color: #293a50; color: #FFF;">
                                                        <tr>
                                                            <td>Action</th>
                                                            <td>Item</th>
                                                            <td style="width: 10%">Quantity</td>
                                                            <td style="width: 18%">Price</td>
                                                            <td>Tax</td>
                                                            <td>Total</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="element_table">
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary mt-2" style="color: white" id="add_row"/><i class="icon-plus-circle2 mr-2"></i> Add New Item </button>
                                                        <br/></br/>
                                                        <label>Note</label>
                                                        <textarea class="form-control @error('isi') is-invalid @enderror" rows="3" id="isi" name="isi">{{ $data->notes }}</textarea>
                                                        @error('isi')
                                                        <strong role="alert">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="Subtotal" class="font-weight-semibold" style="margin-bottom: -3px; margin-top: 5px;">Subtotal</label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" placeholder="0.00" name='lastTotal' class="form-control" id="subtotal" readonly />
                                                        </div>
                                                        <label for="Subtotal" class="font-weight-semibold" style="margin-bottom: -3px; margin-top: 5px;">Tax</label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" placeholder="0.00" name='tax' class="form-control" id="tax" readonly />
                                                        </div>
                                                        <label for="Total" class="font-weight-semibold" style="margin-bottom: -3px; margin-top: 5px;">Total</label>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" placeholder="0.00" name='lastTotal' class="form-control" id="lastTotal" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                                            <div class="btn-group">
                                            </div>

                                            <div class="mt-2 mt-sm-0">
                                                <a href="/estimates" class="btn btn-light ml-3"><i class="icon-cross2 mr-2"></i> Cancel</a>
                                                <button type="button" class="btn bg-primary-400" id="save" form="form"><i class="icon-checkmark3 mr-2"></i> Save</button>
                                            </div> 
                                        </div>
                                    </form>
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
        $(document).ready(function() {
            let i = 1;
            var select_item = function() {
                var sudah = $('#combination').val(
                    $("#element_table .js-example-basic-single").map(function(index, element) {
                        return $(element).val();
                    }).get().join("+")
                );
            };
            var add_row = function(value) {
                var new_row = $(`<tr class="tr_input">
                                                <td data-name="del" class="text-center">
                                                        <button name="del0" class='btn btn-sm btn-danger icon-trash' id="delete_row"></button>
                                                    </td>
                                                    <td>
                                                        <select class="js-example-basic-single selectproduct form-control" name="selectproduct" style="width: 100%" id="selectproduct_${value.id}">
                                                            <option >Select Product</option>
                                                          </select>
                                                    </td>
                                                    <td data-name="qty">
                                                        <input type="hidden" name="productid"  id="productid_${value.id}" value="${value.product_id}">

                                                        <input type="hidden" name="stock" id="stock_${value.id}" />
                                                        <input type="number" name='quantity' class="input quantity form-control" id="qty_${value.id}" value="${value.qty}" />
                                                        <small style="display: none; color: red; margin-left: 5px; margin-right: 5px; font-size: 12px; margin-top: 2px" id="reminder_${value.id}">stock level after: 1</small>
                                                    </td>

                                                    <td data-name="unitprice">
                                                        <input type="number" name='unitprice'  placeholder='0' class="unitprice form-control" id="unitprice_${value.id}" value="${value.unit_price}" />
                                                    </td>

                                                    <td data-name="sel">
                                                        <select class="select2-tax selecttax form-control" name="selecttax" id="selecttax_${value.id}" style="width: 100%">
                                                        </select>
                                                    </td>

                                                    <td data-name="total">
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" placeholder="0.00" name='Total' class="total form-control" id="total_${value.id}" value="${value.total}" readonly/>
                                                        </div>
                                                    </td>
                                            </tr>`).appendTo("#element_table");

                let product = JSON.parse({!!json_encode($showProduct)!!});

                product.forEach(element => {
                    if (element.id == value.product_id) {
                        $(`#selectproduct_${value.id}`).append(`<option value="${element.id}|${element.name}|${element.price}|${element.stock}" selected>${element.name}</option>`);
                    } else {
                        $(`#selectproduct_${value.id}`).append(`<option value="${element.id}|${element.name}|${element.price}|${element.stock}">${element.name}</option>`);
                    }
                });

                let tax = JSON.parse({!!json_encode($showTax)!!});
                tax.forEach(element => {
                    if (element.id == value.tax) {
                        $(`#selecttax_${value.id}`).append(`<option value="${element.value}" data-id="${element.id}" selected>${element.name}(${element.value}%)</option>`);
                    } else {
                        $(`#selecttax_${value.id}`).append(`<option value="${element.value}" data-id="${element.id}">${element.name}(${element.value}%)</option>`);
                    }
                });

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
            
            let data = JSON.parse({!!json_encode($estimates_items)!!});            
            data.forEach(element => {
                add_row(element);
            });

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
            totalprice();
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
                totalprice()
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
                    '<a href="/invoice_settings" style="padding: 6px;height: 20px;display: inline-table;">Add New Tax</a>'
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
                            client_id: $(`#client_id`).find(":selected").val(),
                            inv_number: $(`#invoice_number`).val(),
                            due_date: $(`#invoice_number`).val(),
                            invoice_date: $(`#invoice_date`).val(),
                            issue_date: $(`#issue_date`).val(),
                            total: $(`#lastTotal`).val(),
                            tax: $(`#tax`).val(),
                            notes: $(`#isi`).val(),
                        }

                        $('.selectproduct').each(function (index, obj) {
                                let get_id = obj['id'];
                                let split_id = get_id.split('_')[1];
                                product.push({
                                    id: split_id,
                                    product_id: $(`#productid_${split_id}`).val(),
                                    unit_price: $(`#unitprice_${split_id}`).val(),
                                    qty: $(`#qty_${split_id}`).val(),
                                    tax: $(`#selecttax_${split_id}`).find(":selected").attr('data-id'),
                                    total: $(`#total_${split_id}`).val()
                                });
                            });
                        data = {
                            ...data,
                            product
                        }
                        $.ajax({
                            url: "",
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
