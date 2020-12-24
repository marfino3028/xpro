<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link href="{{ asset('bootstrap441/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="invoice" id="invoice">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>
                        <div class="ml-5">
                            <p class="font-weight-normal" style="font-size: 50px; color: black; font-family: sans-serif;">Invoice</p>
                            <p class="font-weight-normal" style="font-size: 27px; color: black; font-family: sans-serif;">Xpro</p>
                            <p class="font-weight-normal" style="font-size: 15px; color: black;">Sydney</p>
                            <p class="font-weight-normal" style="font-size: 15px; color: black;">Australia</p>
                            <p class="font-weight-normal" style="font-size: 15px; color: black;">2031</p>
                        </div>
                    </td>
                    <td align="text-center" valign="middle" style="background: #4e73df; color: white;">
                        <div class="mt-5 ml-2">
                            <br><br>
                            <h5>Due</h5>
                            <br>
                            <h2>$0.00</h2>
                        </div>
                    </td>
                </tr>
                <tr><td></td></tr>
            </tbody>
        </table>

        <div class="row pb-5 p-5">
            <div class="col-md-6">
                <p class="font-weight-bold mb-4">BILL TO :</p>
                <p class="mb-1">{{$invoices[0]->client_name}}</p>
                <p class="mb-1">{{$invoices[0]->client_street}}</p>
                <p>{{$invoices[0]->client_country}}</p>
                <!-- <p class="mb-1">6781 45P</p> -->
            </div>

            <div class="col-md-6 text-right">
                <p class="font-weight-bold mb-4">Invoice#</p>
                <p class="mb-1"> 1425782</p>
                <p class="font-weight-bold mb-1">Date :</p>
                <p class="mb-1">{{$invoices[0]->invoice_date}}</p>
                <p class="font-weight-bold mb-1">Invoice Due Date :</p>
                <p class="mb-1">{{$invoices[0]->invoice_issue_date}}</p>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr style="background: #4e73df; color: white;">
                    <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                    <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                    <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                    <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                    <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                    <th class="border-0 text-uppercase small font-weight-bold">Ammount</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=0; ?>
                @foreach($invoices as $invoice)
                <tr class="table-primary" style="color: black;">
                    <td>{{$no++}}</td>
                    <td>{{$invoice->product_name}}</td>
                    <td>{{$invoice->product_description}}</td>
                    <td>{{$invoice->product_quantity}}</td>
                    <td>${{$invoice->product_price}}</td>
                    <td>$0.00</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row pb-5 p-5">
            <div class="col-md-6">
                <p class="font-weight-bold mb-4">Notes :</p>
                <p class="mb-1">{{$invoices[0]->invoice_notes}}</p>
                <!-- <p class="mb-1">6781 45P</p> -->
            </div>
            <div class="col-md-3 col-sm-3 text-right">
                <p class="font-weight-bold mb-4">SUB-TOTAL</p>
                <p class="font-weight-bold mb-4">TAX RATE</p>
                <p class="font-weight-bold mb-4">TAX</p>
                <hr>
                <br>
                <p class="font-weight-bold mb-4">TOTAL</p>
            </div>
            <div class="col-md-3 col-sm-3 text-right">
                <p class="font-weight-light mb-4">${{$invoices[0]->product_price}}</p>
                <p class="font-weight-light mb-4">00%</p>
                <p class="font-weight-light mb-4">$00.00</p>
                <hr>
                <br>
                <p class="font-weight-bold mb-4">${{$invoices[0]->product_price}}.00</p>
            </div>
        </div>

        <div class="d-flex flex-row-reverse text-white p-4" style="background: #4e73df;">
            <div class="col-md-6 text-right">
                <div>Powered by - XPRO</div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <div>Invoice Detail Template</div>
            </div>
        </div>
    </div>
</body>
</html>