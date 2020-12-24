@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Estimates</span></h4>
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
							<span class="breadcrumb-item active">Estimates</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
                            <div id="filter" style="display: none">
                                <button type="button"><i class="icon-trash"></i> Delete</button>
                            </div>
                            <a href="/create_estimates" class="breadcrumb-elements-item">
                                <i class="icon-add mr-2"></i>
                                Create Estimates
                            </a>                            
                            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear mr-2"></i>
                                More
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item" onclick="convertEstimates()"><i class="icon-arrow-right8"></i> Convert to Invoices</button>
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
						<h5 class="card-title">Estimates</h5>
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
                            {{--<td>Status</td>--}}
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
@endsection

@push('js')
    <script src="{{ asset('js/tail.select-full.min.js') }}"></script>
    <script>
        $('.daterange-single').daterangepicker({ 
            singleDatePicker: true
        });
        $(document).ready( function () {
            $('#Example1').DataTable({
                paging: true,
                processing: false,
                serverSide: false,
                paging: true,
                autowidth: false,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                drawCallback: function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                api.column(3, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="table-active table-border-double"><td colspan="7" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
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
                        url: '{{ url('/')}}/estimates/ajax',
                        'data': data,
                        dataType: 'json',
                        beforeSend: function(){
                        // Here, manually add the loading message.
                        $('#example1 > tbody').html(
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
                    { data: 'inv_number', name: 'inv_number', render:function(data, type, row){
                        return `
                        <div class="list-icons">
                            <input type="checkbox" class="checkbox" id="" value="${row.id}">
                            <a  href="/estimates/detail/${row.id}">#${row.id}</a>
                        </div>`
                    }},
                    { data: 'estimates_date', name: 'Period', render: function (data, type, row) {
                        return moment(row.estimates_date).format('MMM Y');
                    }},
                    { data: 'client.full_name', name: 'Client Name' },
                    /*{ data: null, mRender: function(data, type, full) {
                        return `<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
				                		<option value="5" ${data.status == 5 ? 'selected': ''}>Overdue</option>
				                		<option value="1" ${data.status == 1 ? 'selected': ''}>Draft</option>
				                		<option value="3" ${data.status == 3 ? 'selected': ''}>Paid</option>
				                		<option value="4" ${data.status == 4 ? 'selected': ''}>Invoice Sent</option>
                                        <option value="2" ${data.status == 2 ? 'selected': ''}>Unpaid</option>
                                        <option value="6" ${data.status == 6 ? 'selected': ''}>Overpaid</option>
                                        <option value="7" ${data.status == 7 ? 'selected': ''}>Partial</option>
				                	</select>`;
                    }},*/
                    { data: 'estimates_date', name: 'Estimate date',  render: function (data, type, row) {
                        return moment(row.estimates_date).format('D MMM Y');
                    }},
                    { data: 'total', name: 'Total', render: $.fn.dataTable.render.number( ',', '.', 2, '$' ) },
                    { data: null,  mRender: function(data, type, full) {
                        if(data.status == 1) {
                            return '<span class="badge badge-success" style="font-size: 9pt">Ready to sent</span>';
                        }
                        if(data.status == 2) {
                            return '<span class="badge badge-success" style="font-size: 9pt">Sent</span>';
                        }
                    }},
                    { data: null,  mRender: function(data, type, full) {
                        return `<div class="list-icons">
                                        <a href="/estimates/detail/${data.id}" class="list-icons-item"><i class="icon-file-eye"></i></a>
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" onclick="convertEstimates(${data.id})"><i class="icon-arrow-right8"></i> Convert to Invoices</button>
												<a href="/estimates/update/${data.id}" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                                <button class="dropdown-item" onclick="deleteEstimates()"><i class="icon-trash"></i> Delete</button>
											</div>
										</div>
									</div>`;
                    }}
                ],
                language: {
                    loadingRecords: "&nbsp;",
                    processing: 'Loading...'},
            })
        });

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
        function convertEstimates(id) {
            var estimates_id = [];
            if (id != null) {
                estimates_id.push(id)
            } else {
                $("input:checkbox[class=checkbox]:checked").each(function () {
                    estimates_id.push($(this).val());
                });
            }
            console.log(estimates_id)
            event.preventDefault();
                swalInit.fire({
                    title: 'Convert to Invoices?',
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Convert it!'
                }).then((result) => {
                    if (result.dismiss == "cancel") {
                        return false 
                    }
                    if (result) {
                        $.ajax({
                            url: '{{ url('/')}}/estimates/convert-to-invoices',
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                data: estimates_id
                            },
                            dataType: 'json',
                            success: function(res){
                                if (res.success) {
                                    swalInit.fire('Converted!', '', 'success')
                                }
                            }
                        })
                    }
            })
        }
        function singleDeleteEstimates(id)
        {
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
                            url: '{{ url('/')}}/estimates/delete/' + id,
                            type: "get",
                            dataType: 'json',
                            success: function(res){
                                if (res.success) {
                                    return window.location.reload()
                                }
                                Swal.fire(res.message, '', 'failed');
                            }
                        })
                    }
            })
        }
        function deleteEstimates(){
            var estimates_id = [];
            $("input:checkbox[class=checkbox]:checked").each(function () {
                estimates_id.push($(this).val());
            });
            if (estimates_id > 0) {
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
                            url: '{{ url('/')}}/estimates/delete',
                            type: "get",
                            data: {
                                data: estimates_id
                            },
                            dataType: 'json',
                            success: function(res){
                                if (res.success) {
                                    Swal.fire('Deleted success!', '', 'success')
                                }
                            }
                        })
                    }
            })
            }
        }
    </script>

    <script>
        tail.select('#select1', {
            search: true
        });
    </script>
@endpush
