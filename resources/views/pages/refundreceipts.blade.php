@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Refund Receipts</span></h4>
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
							<span class="breadcrumb-item active">Refund Receipts</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
                            <a href="/refund_receipts" class="breadcrumb-elements-item">
                                <i class="icon-add mr-2"></i>
                                Create Refund Receipts
                            </a>
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
						<h5 class="card-title">Refund Receipts</h5>
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
								<th>#</th>
                <th>Client Name</th>
                <th>Due Date</th>
                <th>Address</th>
                <th>Price</th>
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
                            '<tr class="table-active table-border-double"><td colspan="8" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
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
                        url: '{{ url('/')}}/refund_receipts/ajax',
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
                    { data: 'id', name: 'id', className: "text-center", render:function(data, type, row){
                        return '<a id="btn_edit" href="/manage_invoice/detail/'+ row.id +'"><p class="h6">#'+ row.id +'</h6></a>'
                    }},
                    { data: 'client.full_name', name: 'address', className: "mb-0 font-weight-bold text-center"},
                    { data: 'issue_date', name: 'invoice_date', className: "text-center", render: function (data, type, row) {
                        return moment(row.issue_date).format('D MMM Y');
                    }},
                    { data: 'client.street', name: 'address', className: "mb-0 font-weight-bold text-center"},
                    { data: 'notes', name: 'notes', className: "mb-0 font-weight-bold text-center"},
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
@endpush