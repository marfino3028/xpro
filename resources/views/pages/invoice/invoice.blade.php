@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Invoices</span></h4>
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
							<span class="breadcrumb-item active">Invoices</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
                            <div id="filters" style="display: none;">
                                <button type="button" class="dropdown-item" onclick="deleteInvoice()"><i class="icon-trash red-text"></i> Delete</button>
                            </div>
                            <a href="/create_invoice" class="breadcrumb-elements-item">
                                <i class="icon-add mr-2"></i>
                                Create Invoices
                            </a>

                            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear mr-2"></i>
                                More Actions
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item" onclick="sendEmail()"><i class="icon-envelope"></i> Send Email</button>
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
						<h5 class="card-title">Invoices</h5>
						<div class="header-elements">
							<div class="list-icons">
                                <a href="/invoice_settings" type="submit" class="btn btn-sm btn-primary" title="Config">
                                    <i class="icon-cogs"></i>
                                </a>
                                <a href="" type="submit" class="btn btn-sm btn-primary" title="Logs">
                                    <i class="icon-info3"></i>
                                </a>
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
                                <td>Period</td>
                                <td>Issued to</td>
                                <td>Status</td>
								<td>Issue Date</td>
                                <td>Due Date</td>
                                <td>Amount</td>
								<td>Actions</td>
							</tr>
						</thead>
                    </table>
				</div>
			</div>
</div>

<!-- Primary modal -->
<div id="receive_payment" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Receive Payment</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="/settings/tax">
                @csrf
            <div class="modal-body">
                <div class="row" style="justify-content: space-between">
                    <div class="col-md-6 mb-2">
                        <input type="hidden" name="invoice_id" id="invoice_id" value=""/>
                        <p style="font-weight: bold">Amount <span style="color: red">*</span></p>
                        <input type="number" class="form-control mb-2" placeholder="Enter amount" name="amount" id="amount"
                            required />
                    </div>
                    <div class="col-md-6 mb-2">
                        <p style="font-weight: bold">Receive Date <span style="color: red">*</span></p>
                        <input type="datetime-local" class="form-control" id="received_at" name="received_at" value="">
                    </div>
                </div>
                <div class="row" style="justify-content: space-between">
                    <div class="col-md-12 mb-2">
                        <p style="font-weight: bold">Note</p>
                        <textarea class="form-control mb-2" rows="4" name="note" id="note"  placeholder="Place Note"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-primary" id="save_receive_payment">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /primary modal -->


<!-- Logs modal -->
<div id="log" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Logs</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Action By</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 0;
                        $showLogsInvoice  = \App\Models\LogActivity::where('title','LIKE', '%INV-0049%')->get();
                        foreach($showLogsInvoice as $value){
                        $no++;
                    ?>
                        <tr>
                            <td>{{ $no }}<td>
                            <td>{{ $value->action_by }}<td>
                            <td>{{ $value->note }}<td>
                        <tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Logs modal -->

@endsection

@push('js')
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
                api.column(4, {page:'current'} ).data().each( function ( group, i ) {
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
                        url: '{{ url('/')}}/manage_invoice/ajax',
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
                    { data: 'inv_number', name: 'inv_number', render:function(data, type, row){
                        return `
                        <div class="list-icons">
                            <input type="checkbox" class="checkbox" id="" value="${row.id}">
                            <a id="btn_edit" href="/manage_invoice/detail/${row.id}">#${row.inv_number}</a>
                        </div>`
                    }},
                    { data: null, name: 'Period', render:function(data, type, row){
                        return moment(row.invoice_date).format('MMM Y');
                    }},
                    { data: 'client.full_name', name: 'client name'},
                    { data: 'status', mRender: function(data, type, row) {
                        let badgee = null;
                        let bagde_status = null;
                        if(row.status == 1) {
                            badgee = 'badge-light';
                            bagde_status = 'Draft';
                        }
                        if(row.status == 2){
                            badgee = 'badge-danger';
                            bagde_status = 'Unpaid';
                        }
                        if(row.status == 3){
                            badgee = 'badge-success';
                            bagde_status = 'Paid';
                        }
                        if(row.status == 4){
                            badgee = 'badge-primary';
                            bagde_status = 'Invoice Sent';
                        }
                        if(row.status == 5){
                            badgee = 'badge-danger';
                            bagde_status = 'Overdue';
                        }
                        if(row.status == 6){
                            badgee = 'badge-danger';
                            bagde_status = 'Overpaid';
                        }
                        if(row.status == 7){
                            badgee = 'badge-warning';
                            bagde_status = 'Partial';
                        }
                        return `<ul class="list list-unstyled mb-0">
                                    <li class="dropdown">
                                        <a href="#" class="badge ${badgee} align-top dropdown-toggle" data-toggle="dropdown" style="font-size: 9pt;">${bagde_status}</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=1" class="dropdown-item ${row.status == 1 ? 'active': ''}">Draft</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=2" class="dropdown-item ${row.status == 2 ? 'active': ''}">Unpaid</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=3" class="dropdown-item ${row.status == 3 ? 'active': ''}">Paid</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=4" class="dropdown-item ${row.status == 4 ? 'active': ''}">Invoice Sent</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=5" class="dropdown-item ${row.status == 5 ? 'active': ''}">Overdue</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=6" class="dropdown-item ${row.status == 6 ? 'active': ''}">Overpaid</a>
                                            <a href="/manage_invoice/update-status?id_invoice=${row.id}&status=7" class="dropdown-item ${row.status == 7 ? 'active': ''}">Partial</a>
                                        </div>
                                    </li>
                                </ul>`;

                    /*
                    return `<select name="status" class="form-control form-control-select2" id="invoice_status" data-placeholder="Select status">
                                <option value="5" ${data.status == 5 ? 'selected': ''} data-id="${data.id}">Overdue</option>
                                <option value="1" ${data.status == 1 ? 'selected': ''} data-id="${data.id}">Draft</option>
                                <option value="3" ${data.status == 3 ? 'selected': ''} data-id="${data.id}">Paid</option>
                                <option value="4" ${data.status == 4 ? 'selected': ''} data-id="${data.id}">Invoice Sent</option>
                                <option value="2" ${data.status == 2 ? 'selected': ''} data-id="${data.id}">Unpaid</option>
                                <option value="6" ${data.status == 6 ? 'selected': ''} data-id="${data.id}">Overpaid</option>
                                <option value="7" ${data.status == 7 ? 'selected': ''} data-id="${data.id}">Partial</option>
                            </select>`;
                    */
                        
                    }},
                    { data: 'invoice_date', name: 'invoice_date', render: function (data, type, row) {
                        return moment(row.invoice_date).format('D MMM Y');
                    }},
                    { data: 'due_date', render: function (data, type, row) {
                        let badge = null;
                        if(row.status == 1) {
                            badge = 'badge-default';
                        }
                        if(row.status == 2) {
                            badge = 'badge-danger';
                        }
                        if(row.status == 3) {
                            badge = 'badge-success';
                        }
                        if(row.status == 4) {
                            badge = 'badge-success';
                        }
                        if(row.status == 5) {
                            badge = 'badge-danger';
                        }
                        if(row.status == 6) {
                            badge = 'badge-danger';
                        }
                        if(row.status == 7) {
                            badge = 'badge-primary';
                        }
                        if('{{ \Carbon\Carbon::now() }}' >= row.due_date ) {
                            return '<span class="badge badge-danger" style="font-size: 9pt;">'+moment(row.due_date).format('DD-MM-YYYY  hh:mm')+'</span>';
                        } else if( moment(row.due_date).format('DD-MM-YYYY') == moment('{{ \Carbon\Carbon::tomorrow() }}').format('DD-MM-YYYY') ) {
                            return '<span class="badge badge-warning" style="font-size: 9pt;">'+moment(row.due_date).format('DD-MM-YYYY  hh:mm')+'</span>';
                        } else if( moment(row.due_date).format('DD-MM-YYYY') == moment('{{ \Carbon\Carbon::now() }}').format('DD-MM-YYYY') ) {
                            return '<span class="badge badge-danger" style="font-size: 9pt;">'+moment(row.due_date).format('DD-MM-YYYY  hh:mm')+'</span>';
                        } else {
                            return `<span class="badge ${badge}" style="font-size: 9pt;">${moment(row.due_date).format('DD-MM-YYYY  hh:mm')}</span>`;
                        }
                    }},
                    { data: 'remaining_amount', name: 'Total', className: "mb-0 font-weight-bold", render: $.fn.dataTable.render.number( ',', '.', 2, '$' ) },
                    /*{ data: null, mRender: function(data, type, row) {
                        if(row.remaining_amount == '0'){
                            return row.total;
                        }else{
                            return row.remaining_amount;
                        }
                    }},*/
                    { data: null, mRender: function(data, type, full) {
                        return `
                        <form class="d-inline" id="delete"
                                    action="/manage_invoice/delete/${data.id}" method="GET">
                                    @csrf
                            <div class="list-icons">
                                        <a href="/manage_invoice/detail/${data.id}" class="list-icons-item"><i class="icon-file-eye"></i></a>
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item open-receivepayment" data-toggle="modal" data-id="${data.id}" data-target="#receive_payment"><i class="icon-hand"></i> Receive Payment</a>
												<a href="/manage_invoice/update/${data.id}" class="dropdown-item"><i class="icon-finder"></i> Edit</a>
                                                <button type="button" class="dropdown-item" onclick="sendEmail(${data.id})"><i class="icon-envelope"></i> Send Email</button>
                                                <button type="button" class="dropdown-item" onclick="deleteInvoice(${data.id})"><i class="icon-trash"></i> Delete</button>
                                                <!--<a href="#" class="dropdown-item open-log" data-toggle="modal" data-id="${data.inv_number}" data-target="#log"><i class="icon-info3"></i> Logs</a>-->
                                            </div>
										</div>
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

        $("#Example1").on("change","#invoice_status", function () {
            let invoice_id = $(this).find(':selected').attr('data-id');
            $.ajax({
                url: `/manage_invoice/update-status?id_invoice=${invoice_id}&status=${this.value}`,
                type: "get",
                success: function(res) {
                    return swalInit.fire({
                        text: 'Status invoices updated',
                        type: 'success',
                        toast: true,
                        showConfirmButton: false,
                        position: 'top-right'
                    });
                }
            });
        });
    </script>
    <script>
        function sendEmail(id) {
            let invoices_id = [];
            if (id != null) {
                invoices_id.push(id)
            } else {
                $("input:checkbox[class=checkbox]:checked").each(function () {
                    invoices_id.push($(this).val());
                });
            }
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, send it!'
            }).then((result) => {
                if (result.dismiss == "cancel") {
                        return false 
                    }
                if (result) {
                    $.ajax({
                      url: '{{ url('/')}}/manage_invoice/send-email',
                        type: "post",
                        data: {
                          "_token": "{{ csrf_token() }}",
                          data: invoices_id
                        },
                        dataType: 'json',
                        success: function(res){
                          if (res.success) {
                            swalInit.fire('Email hasbeen sent!', '', 'success');
                          }
                        }
                    })
                }
            })
        }
        function deleteInvoice(id) {
            var invoices_id = [];
            if (id != null) {
                invoices_id.push(id)
            } else {
                $("input:checkbox[class=checkbox]:checked").each(function () {
                    invoices_id.push($(this).val());
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
                      url: '{{ url('/')}}/manage_invoice/delete',
                        type: "post",
                        data: {
                          "_token": "{{ csrf_token() }}",
                          data: invoices_id
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
                                    return swalInit.fire('', res.message, 'success');
                                }
                                return swalInit.fire('', res.message, 'error');
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