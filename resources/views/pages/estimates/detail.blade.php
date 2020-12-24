@extends('layouts.index')

@section('content')

<!-- Main content -->
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
					<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="{{ route('estimates') }}" class="breadcrumb-item">Estimates</a>
							<span class="breadcrumb-item active">Detail</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">

							<div class="breadcrumb-elements-item dropdown p-0">
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
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- /page header -->
            
            <div class="content">
                <!-- Invoice template -->
   <div class="card" id="print_area">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">Estimates</h6>
        <div class="header-elements">
            <button type="button" id="export_pdf" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>
            <a href="/estimates/print/{{ $data->id }}" target="_blank"  class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <img src="/assets/images/logo_demo.png" class="mb-3 mt-2" alt="" style="width: 120px;">
                     <ul class="list list-unstyled mb-0">
                        <li>2269 Elba Lane</li>
                        <li>Paris, France</li>
                        <li>888-555-2311</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <div class="text-sm-right">
                        <h4 class="text-primary mb-2 mt-md-2">Estimates #{{ $data->id }}</h4>
                        <ul class="list list-unstyled mb-0">
                            <li>Date: <span class="font-weight-semibold">{{ \Carbon\Carbon::parse($data->estimates_date)->format('d F Y') }}</span></li>
                            <li>Due date: <span class="font-weight-semibold">{{ \Carbon\Carbon::parse($data->issue_date)->format('d F Y') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-wrap">
            <div class="mb-4 mb-md-2">
                <span class="text-muted">Invoice To:</span>
                 <ul class="list list-unstyled mb-0">
                    <li><h5 class="my-2">{{ $company_setting->business_name }}</h5></li>
                    <li>{{ $data->client->full_name }}</li>
                    <li>{{ $data->client->street }}</li>
                    <li>{{ $data->client->country }}</li>
                    <li><a href="#">{{ $data->client->email }}</a></li>
                </ul>
            </div>

            <div class="mb-2 ml-auto">
                <span class="text-muted">Payment Details:</span>
                <div class="d-flex flex-wrap wmin-md-400">
                    <ul class="list list-unstyled mb-0">
                        <li><h5 class="my-2">Total Due:</h5></li>
                    </ul>

                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                        <li><h5 class="font-weight-semibold my-2">${{ $data->total }}</h5></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->estimatesitems as $item)
                <tr>
                    <td style="width: 60%">
                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                    <span class="text-muted">{{ $item->product->description }}</span>
                    </td>
                    <td id="qty">{{ $item->qty }}</td>
                    <td id="unitprice">${{ $item->unit_price }}.00</td>
                    <td id="subtotal"><span class="font-weight-semibold">${{ $item->unit_price * $item->qty }}.00</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="d-md-flex flex-md-wrap">
            <div class="pt-2 mb-3">
                <h6 class="mb-3">Thank's your business</h6>
                <div class="mb-3">
                </div>
            </div>

            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                <h6 class="mb-3">Total due</h6>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <?php $tax = 0; $tax_rate = []; $total = 0;  ?>
                            @foreach($data->estimatesitems as $item)
                            @if(!in_array($item->tax, $tax_rate, true))
                                <?php array_push($tax_rate, $item->tax); ?>
                            @endif
                                <?php $tax += $item->tax / 100 * $item->unit_price ?>
                                <?php $total += $item->unit_price * $item->qty ?>
                            @endforeach
                            <tr>
                                <th>Subtotal:</th>
                                <td class="text-right">${{ $total }}.00</td>
                            </tr>
                            <tr>
                                <th>Tax:</th>
                                <td class="text-right">${{ $tax }}.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td class="text-right text-primary"><h5 class="font-weight-semibold">${{ $data->total }}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-3">
                    <button type="button" id="sendestimates" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Send Estimates</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /invoice template -->
            </div>

</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script>
    $('#export_pdf').click(function() {
        var options = {
            background: '#FFFFFF'
        };
        var pdf = new jsPDF('p', 'pt', 'a4');
        pdf.addHTML($("#print_area"), 15, 15, options, function() {
            pdf.save('estimate-{{ $data->id }}.pdf');
        });
    });

    function Print(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>
@endpush