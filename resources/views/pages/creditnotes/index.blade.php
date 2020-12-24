@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Credit Notes</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-bars-alt text-pink-300"></i>
								<span>Statistics</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calculator text-pink-300"></i>
								<span>Invoices</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calendar5 text-pink-300"></i>
								<span>Schedule</span>
							</a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Credit notes</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
                            {{-- <a href="/create" class="breadcrumb-elements-item">
                                <i class="icon-add mr-2"></i>
                                Create Credit Notes
                            </a> --}}
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
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
						<h5 class="card-title">Credit Notes</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item reload_table" data-action="reload" id="reload_table"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<table id="Example1" class="table table-lg">
						<thead>
							<tr>
								<td>#</td>
                                <td>Client Name</td>
                                <td>Due Date</td>
                                <td>Address</td>
                                <td>Notes</td>
							</tr>
						</thead>
                    </table>
				</div>
			</div>
</div>
@endsection

@push('js')
    <script src="/assets/js/demo_pages/invoice_archive.js"></script>

    <script>
        $(document).on("click", ".open-receivepayment", function () {
            var myBookId = $(this).data('id');
            $(".modal-body #invoice_id").val( myBookId );
        });
        $(document).on("click", "#reload_table", function () {
            var table = $('#Example1').DataTable();
            table.ajax.reload();
        });
        var setFilter;
        $(function() {
            let params = (new URL(document.location)).searchParams;
            let filter = params.get("filter");
            var table = $('#Example1').DataTable({
                paging: true,
                processing: false,
                serverSide: false,
                select: true,
                autowidth: false,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                drawCallback: function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="table-active table-border"><td colspan="8" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
                        );
     
                        last = group;
                    }
                });

                // Initializw Select2
                if (!$().select2) {
                    console.warn('Warning - select2.min.js is not loaded.');
                    return;
                }
                $('.form-control-select2').select2({
                    width: 150,
                    minimumResultsForSearch: Infinity
                });
            },
                ajax: function(data, callback){
                    $.ajax({
                        url: '{{ url('/')}}/credit_notes/ajax',
                        'data': {
                            ...data,
                            filter: filter
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
                    { data: 'id', name: 'id',  render:function(data, type, row){
                        return '<a id="btn_edit"><p class="h6">#'+ row.id +'</h6></a>'
                    }},
                    { data: 'client.full_name', name: 'address'},
                    { data: 'issue_date', name: 'invoice_date', render: function (data, type, row) {
                        return moment(row.issue_date).format('D MMM Y');
                    }},
                    { data: 'client.street', name: 'address'},
                    { data: 'notes', name: 'notes'},
                    { data: null, mRender: function(data, type, row) {
                        return null
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
    </script>
    <script>
        $(function() {
            // var tax_id = parseFloat($('#idTax').val().split('|')[0]);
            var tax_values = parseFloat($('#selecttax').val().split('|')[2]);
            $('#selectItem').on('change', function() {
                var str = this.value;
                var tes = str.split("|");
                var id = tes[0];
                var description = tes[1];
                var price = tes[2];
                $('#description').val(description);
                $('#unitprice').val(amount);
                $('#product_id').val(id);
                // console.log(tax_id);
                calculateData();
            });
            $('#selecttax').on('change', function() {
                var taxData = this.value.split("|");
                var id = taxData[0];
                var name = taxData[1];
                tax_values = taxData[2];
                $('#taxasli').val(`${name}(${tax_values}%)`);
                $('#idTax').val(id);
                calculateData();
            });
            $(".input").on('input', function() {
                calculateData();
            });
            $("input[name$='radioInput']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#" + test).show();
            });
            $("#cardClientDetails").hide();
            $("#showClientDetails").click(function(e) {
                e.preventDefault();
                $("#cardClientDetails").show();
                $(this).show();
            });
            $("#cardMoreOptions").hide();
            $("#showMoreOptions").click(function(e) {
                e.preventDefault();
                $("#cardMoreOptions").show();
                $(this).show();
            });
            function calculateData() {
                var unitPrice = parseFloat($('#unitprice').val())
                var qty = parseFloat($('#qty').val())
                var subTotal = unitPrice * qty
                var total = subTotal + ((subTotal * tax_values) / 100)
                $('#subtotal').val(subTotal)
                $('#Total').val(total)
                $('#lastTotal').val(total)
            }
            function secondaryAddress() {
                var checkBox = document.getElementById("addShipping");
                var text = document.getElementById("Shipping");
                if (checkBox.checked == true) text.style.display = "block";
                else text.style.display = "none";
            }
            function shippingAddress() {
                var checkBox = document.getElementById("addShipping2");
                var text = document.getElementById("Shipping2");
                if (checkBox.checked == true) text.style.display = "block";
                else text.style.display = "none";
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#add_row").on("click", function() {
                // Dynamic Rows Code
                // Get max row id and set new id
                var newid = 0;
                $.each($("#tab_logic tr"), function() {
                    if (parseInt($(this).data("id")) > newid) {
                        newid = parseInt($(this).data("id"));
                    }
                });
                newid++;
                var tr = $("<tr></tr>", {
                    id: "addr" + newid,
                    "data-id": newid
                });
                // loop through each td and create new elements with name of newid
                $.each($("#tab_logic tbody tr:nth(0) td"), function() {
                    var td;
                    var cur_td = $(this);
                    var children = cur_td.children();
                    // add new td and element if it has a nane
                    if ($(this).data("name") !== undefined) {
                        td = $("<td></td>", {
                            "data-name": $(cur_td).data("name")
                        });
                        var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                        c.attr("name", $(cur_td).data("name") + newid);
                        c.appendTo($(td));
                        td.appendTo($(tr));
                    } else {
                        td = $("<td></td>", {
                            'text': $('#tab_logic tr').length
                        }).appendTo($(tr));
                    }
                });
                // add the new row
                $(tr).appendTo($('#tab_logic'));
                $(tr).find("td button.row-remove").on("click", function() {
                    $(this).closest("tr").remove();
                });
            });
            // Sortable Code
            var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width())
                });
                return $helper;
            };
        });
        tail.select('#select1', {
            search: true
        });
        tail.select('#selectItem', {
            search: true
        });
    </script>

    <script>
        function deleteInvoice() {
            event.preventDefault();
            var form = event.target.form;
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
                    form.submit();
                }
            })
        }
        $("#Example1").on('change',"input[type='checkbox']",function(e){
            var x = [];
            var filter = document.getElementById("filters");
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
        $(document).on('click', '#save_receive_payment', function(e) {
            e.preventDefault()
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
                        $.ajax({
                            url: "/receive_payment",
                            type: "post",
                            dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                data: {
                                    invoice_id: $('#invoice_id').val(),
                                    amount: $('#amount').val(),
                                    received_at: $('#received_at').val(),
                                    note: $('#note').val(),
                                    type_account: 1
                                }
                            },
                            success: function(res) {
                                if(res.success) {
                                    $("#receive_payment").modal("toggle");
                                    var table = $('#Example1').DataTable();
                                    table.ajax.reload();
                                    $('#invoice_id').val('');
                                    $('#amount').val('');
                                    $('#received_at').val('');
                                    $('#note').val('');
                                    getLogActivity();
                                    return Swal.fire('', res.message, 'success');
                                }
                                return Swal.fire('', res.message, 'error');
                            }
                        });
                    }
                })
        });
        getLogActivity();
        function getLogActivity() {
            $('#log_activity').html('');
            $.ajax({
              url: '{{url('')}}/log/activity',
              dataType: "json",
              type: "GET",
              processData: false,
              contentType: false,
              success: function (response) {
                  response.forEach(element => {
                      $('#log_activity').append(`
                                <div class="activity-icon terques">
                                    <i class="fa fa-envelope" style="margin-top: 7px;"></i>
                                </div>
                                <div class="activity-desk">
                                    <h2>${element.created_at}</h2>
                                    <p>${element.title}</p>
                                    <small>${element.action_by}</small>
                                </div>                
                      `)
                  });
              },
              error: function (response) {
              }
        });
        }
    </script>
@endpush