<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/custom/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/custom/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/custom/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/custom/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/custom/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="/assets/js/main/jquery.min.js"></script>
	<script src="/assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="/assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

    <!-- Theme JS files -->
	<script src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/assets/custom/js/app.js"></script>
    <script src="/assets/js/plugins/ui/moment/moment.min.js"></script>
	<!-- /theme JS files -->

</head>

  <body>
    
    <!-- Main content -->
<div class="content-wrapper">
            <!-- Content area -->
			<div class="content">
   <!-- Invoice template -->
   <div class="card">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">Invoice</h6>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <img src="/assets/images/logo_demo.png" class="mb-3 mt-2" alt="" style="width: 120px;">
                    <br/>
                    {{ $company_setting->business_address }}<br/>
                    {{ $company_setting->business_email }}<br/>
                    {{ $company_setting->business_phone }}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <div class="text-sm-right">
                        <h4 class="text-primary mb-2 mt-md-2">Invoice #{{ $data->inv_number }}</h4>
                        <ul class="list list-unstyled mb-0">
                            <li>Date: <span class="font-weight-semibold">{{ \Carbon\Carbon::parse($data->invoice_date)->format('d F Y') }}</span></li>
                            <li>Due date: <span class="font-weight-semibold">{{ \Carbon\Carbon::parse($data->due_date)->format('d F Y') }}</span></li>
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
                @foreach($data->invoiceitems as $item)
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
                        @foreach($data->invoiceitems as $item)
                            @if(!in_array($item->tax, $tax_rate, true))
                                <?php array_push($tax_rate, ["value" => $item->tax->value, "name" => $item->tax->name]); ?>
                            @endif
                        <?php $tax += $item->tax->value / 100 * $item->total ?>
                        <?php $total += $item->unit_price * $item->qty ?>
                        @endforeach
                            <tr>
                                <th>Subtotal:</th>
                                <td class="text-right">${{ $total }}.00</td>
                            </tr>
                            <tr>
                                @foreach($tax_rate as $valuetax)
                                <th>{{ $valuetax['name'] }}:</th>
                                <td class="text-right">{{ $valuetax['value'] }}%</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Tax:</th>
                                <td class="text-right">${{ $tax }}.00</td>
                            </tr>
                            <tr>
                            <?php $paid = 0 ?>
                                @if(count($receive_payment) > 0)
                                
                                @foreach($receive_payment as $value)
                                    <?php $paid += $value->amount; ?>
                                @endforeach
                                <th>Paid: </th>
                                <td class="text-right">- ${{ $paid }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td class="text-right text-primary"><h5 class="font-weight-semibold">${{ $data->total }}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($invoice_setting)
        @if (!$invoice_setting->disable_footer)
            <div class="card-footer">
                <span class="text-muted">Powered By - {{ $company_setting->business_name }}</span>
            </div>
        @endif
    @endif
</div>
<!-- /invoice template -->
			</div>
</div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
    </body>
</html>