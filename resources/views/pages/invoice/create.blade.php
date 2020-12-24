@extends('layouts.index')
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create Invoices</span></h4>
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
							<a href="{{ route('manage_invoice') }}" class="breadcrumb-item">Invoices</a>
							<span class="breadcrumb-item active">Create</span>
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
								<h5 class="card-title">Create Invoice</h5>
								<div class="header-elements">
			                	</div>
							</div>

							<div class="card-body">
                                <form action="{{ route('postData') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Client <span style="color: red">*</span></label>
                                                <select data-placeholder="Select your client"  class="form-control form-control-select2" style="width: 100%;" name="client_id" id="client_id">
                                                        <option selected="selected" disabled> Select Your Client </option>
                                                    @foreach ($showClient as $o)
                                                        <option value="{{ $o->id }}">{{ $o->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="font-weight-bold">Invoice Number <span style="color: red">*</span></p>
                                                <input readonly type="text" class="form-control font-weight-bold" placeholder="Invoice" name="invoice_number" id="invoice_number" value="{{ $inv_number }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="font-weight-bold">Invoice Date <span style="color: red">*</span></p>
                                                <input type="datetime-local"
                                                        class="form-control @error('invoice_date') is-invalid @enderror" id="invoice_date"
                                                        name="invoice_date" value="">
                                                    @error('invoice_date')
                                                    <strong role="alert">{{ $message }}</strong>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="font-weight-bold">Due Date <span style="color: red">*</span></p>
                                                <input type="datetime-local"
                                                        class="form-control @error('issue_date') is-invalid @enderror" id="issue_date"
                                                        name="issue_date" value="">
                                                    @error('issue_date')
                                                    <strong role="alert">{{ $message }}</strong>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="font-weight-bold">Tags</p>
                                            {{--<input type="text" class="form-control tags-input" value="" id="tagging" data-fouc>--}}
                                                <select required class="text-capitalize js-example-basic-single form-control select-fixed-multiple" multiple="multiple" data-fouc id="tagging">
                                                    @foreach($showProject as $Project)
                                                    <option value="{{ $Project -> project_name  }}">{{ $Project -> project_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead style="background-color: #293a50; color: #FFF;">
                                                    <tr>
                                                        <td>Action</td>
                                                        <td>Item</td>
                                                        <td>Stock</td>
                                                        <td>Quantity</td>
                                                        <td>Price</td>
                                                        <td>Tax</td>
                                                        <td>Total</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="element_table">
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <button type="button" class="btn btn-primary mt-2" style="color: white" id="add_row"/><i class="icon-plus-circle2 mr-2"></i> Add New Item </button>
                                                    <br/><br/><label>Notes</label>
                                                    <textarea class="form-control @error('isi') is-invalid @enderror" rows="3" id="isi" name="isi"></textarea>
                                                    @error('isi')
                                                    <strong role="alert">{{ $message }}</strong>
                                                    @enderror
                                                    <br/>
                                                </div>
                                                <div class="col-md-3">
            
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="Subtotal" class="font-weight-semibold" style="margin-bottom: -3px;">Subtotal</label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" placeholder="0.00" name='lastTotal' class="form-control"
                                                            id="subtotal" readonly />
                                                    </div>
                                                    <label for="Subtotal" class="font-weight-semibold" style="margin-bottom: -3px;">Tax</label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" placeholder="0.00" name='tax' class="form-control" id="tax"
                                                            readonly />
                                                    </div>
                                                    <label for="Total"class="font-weight-semibold" style="margin-bottom: -3px;">Total</label>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" placeholder="0.00" name='lastTotal' class="form-control"
                                                            id="lastTotal" readonly />
                                                    </div>
                                                    <br/>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                                                <div class="btn-group">
                                                </div>
                
                                                <div class="mt-2 mt-sm-0">
                                                    <a href="/manage_invoice" class="btn btn-light ml-3"><i class="icon-cross2 mr-2"></i> Close</a>
                                                    <button type="button" class="btn bg-primary-400" id="save" form="form"><i class="icon-checkmark3 mr-2"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</form>
							</div>
						</div>
						<!-- /basic layout -->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
        $('.tags-input').tagsinput();
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
                                                    <td  width="100" data-name="stock">
                                                        <input readonly type="number" name='stock' class="stock form-control" id="stock_${index}" />
                                                    </td>
                                                    <td  width="150" data-name="qty">
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
                                                            <option value="{{ $field->value }}" data-id="{{ $field->id }}" selected="">{{ $field->name }}({{ $field->value }}%)</option>
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
                            invoice_date: $(`#invoice_date`).val(),
                            due_date: $(`#issue_date`).val(),
                            total: $(`#lastTotal`).val(),
                            tax: $(`#tax`).val(),
                            notes: $(`#isi`).val(),
                            //tagging: $("#tagging").tagsinput('items'),
                            tagging: $("#tagging").val(),
                        }

                        $('.selectproduct').each(function (index, obj) {
                                let get_id = obj['id'];
                                let split_id = get_id.split('_')[1];
                                product.push({
                                    product_id: $(`#productid_${split_id}`).val(),
                                    unit_price: $(`#unitprice_${split_id}`).val(),
                                    qty: $(`#qty_${split_id}`).val(),
                                    tax: $(`#selecttax_${split_id}`).find(":selected").attr('data-id'),
                                    total: $(`#total_${split_id}`).val(),
                                });
                            });
                        data = {
                            ...data,
                            product
                        }
                        $.ajax({
                            url: "/create_invoice",
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
                                return swalInit.fire(res.message, '', 'error');
                            }
                        });
                    }
                })
        });
</script>
@endpush
