@extends('masters/index_1')

@section('title')
X Pro - Manage Inovice
@endsection

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- <style>
  body {
    background: grey;
    margin-top: 120px;
    margin-bottom: 120px;
}
</style> -->

@endsection

@section('content')
@if (session('add'))
<div class="alert alert-success">
  {{ session('add') }}
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger">
  {{ session('delete') }}
</div>
@endif
<br>
<!-- Circle Buttons -->
<div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-7">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Detail</h6>
            </div>
            <div class="col-md-5">
                <?php 
                    $client_name = ($data->client->business_name != NULL) ? $data->client->business_name : $data->client->full_name;
                    $id = $data->client->id;
                    $fname = "Invoice_$client_name"."_$id";
                ?>
                <a href="#" onclick="createPdf('invoice', '{{ $fname }}')" class="btn btn-outline-danger btn-sm"><i class="fa fa-file"></i> Export as PDF</a>
                <a href="#" onclick="printInvoice('invoice')" class="btn btn-outline-info btn-sm"><i class="fa fa-print"></i> Print</a>
                <a href="" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <button data-toggle="modal" data-target="#EmailModal" data-whatever="@getbootstrap" class="btn btn-outline-danger btn-sm"><i class="fa fa-envelope"></i> Send to Email</button>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="invoice" id="invoice">
         <table class="table table-borderless">
          <tbody>
            <tr>
                <td>
                    <div class="col-md-6 ml-4">
                        <p class="font-weight-normal" style="font-size: 50px; color: black; font-family: sans-serif;">Invoice</p>
                        <p class="font-weight-normal" style="font-size: 27px; color: black; font-family: sans-serif;">Xpro</p>
                        <p class="font-weight-normal" style="font-size: 15px; color: black;">Sydney</p>
                        <p class="font-weight-normal" style="font-size: 15px; color: black;">Australia</p>
                        <p class="font-weight-normal" style="font-size: 15px; color: black;">2031</p>
                    </div>
                </td>
                <td align="text-center" valign="middle" style="background: #2D84F7; color: white;">
                    <div class="mt-5 ml-2">
                        <br><br>
                        <h5>Due</h5>
                        <br>
                        <h2>${{$data->total}}</h2>
                    </div>
                </td>
            </tr>
            <tr><td></td></tr>
        </tbody>
    </table>

    <div class="row pb-5 p-5">
        <div class="col-md-6">
            <p class="font-weight-bold mb-4">BILL TO :</p>
            <p class="mb-1">{{$data->client->full_name}}</p>
            <p class="mb-1">{{$data->client->street}}</p>
            <p>{{$data->client->country}}</p>
            <!-- <p class="mb-1">6781 45P</p> -->
        </div>

        <div class="col-md-6 text-right">
            <p class="font-weight-bold mb-4">Invoice#</p>
            <p class="mb-1"> 1425782</p>
            <p class="font-weight-bold mb-1">Date :</p>
            <p class="mb-1">{{$data->invoice_date}}</p>
            <p class="font-weight-bold mb-1">Invoice Due Date :</p>
            <p class="mb-1">{{$data->issue_date}}</p>
        </div>
    </div>

    <!-- <div class="row p-5"> -->
        <!-- <div class="col-md-12"> -->
        <div class="box-body p-5">
            <div class="">
                <table class="table table-striped py-5" width="100%" cellspacing="0">
                    <thead class="">
                        <tr style="background: #2D84F7; color: white;">
                            <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                            <th class="border-0 text-uppercase small font-weight-bold">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($showProduct as $field)
                        <tr class="table-primary" style="color: black;">
                            <td>{{$field->product->name}}</td>
                            <td>{{$field->product->description}}</td>
                            <td id="qty">{{$field->qty}}</td>
                            <td id="unitprice">${{$field->product->price}}</td>
                            <td id="subtotal">${{$field->subtotal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- </div> -->
        <!-- </div> -->
        <div class="row pb-5 p-5">
            <div class="col-md-6">
                <p class="font-weight-bold mb-4">Notes :</p>
                <p class="mb-1">{{$data->notes}}</p>
                <!-- <p class="mb-1">6781 45P</p> -->
            </div>

            <div class="col-md-3 text-right">
                <p class="font-weight-bold mb-4">SUB-TOTAL</p>
                <p class="font-weight-bold mb-4">TAX RATE</p>
                <p class="font-weight-bold mb-4">TAX</p>
                <hr>
                <br>
                <p class="font-weight-bold mb-4">TOTAL</p>
            </div>
            <div class="col-md-3 text-right">
                <p class="font-weight-light mb-4">$00.00</p>
                <p class="font-weight-light mb-4">00%</p>
                <p class="font-weight-light mb-4">$00.00</p>
                <hr>
                <br>
                <p class="font-weight-bold mb-4">${{$data->total}}</p>
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
</div>

</div>

</div>



@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables-select.min.js') }}"></script>
<script src="{{ asset('js/dropdown-search.js') }}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('mousetrap-master/mousetrap.min.js') }}"></script>
{{-- <script src="{{ asset('jspdf/jspdf.debug.js') }}"></script>
<script src="{{ asset('jspdf/html2canvas.min.js') }}"></script> --}}

<script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>

<script>

  $('.select-dropdown').select2();
</script>
<script>
  Mousetrap.bind(['command+p', 'ctrl+p'], function() {
    printInvoice('invoice')
    return false
})

  function printInvoice(id) {
    var printContents = document.getElementById(id).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function createPdf(id, filename){
   kendo.drawing
   .drawDOM($(`#${id}`), 
   { 
    paperSize: "A4",
    margin: { top: "1cm", bottom: "1cm" },
    scale: 0.5,
    height: 500
})
   .then(function(group){
    kendo.drawing.pdf.saveAs(group, `${filename}.pdf`)
});
}

function calculateData(){
  var unitPrice   = parseFloat($('#unitprice').val())
  var qty         = parseFloat($('#qty').val())
  var subTotal    = unitPrice * qty
  var total       = subTotal + ((subTotal * tax_values) / 100)

  $('#subtotal').val(subTotal)

}
</script>
@endsection