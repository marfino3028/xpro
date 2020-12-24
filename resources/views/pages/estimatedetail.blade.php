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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table">
                      <tbody>
                        <tr>
                            <td><br>
                                <div class="ml-5">
                                    <p class="font-weight-normal" style="font-size: 50px; color: black;">Estimate Detail</p>
                                    <p class="font-weight-normal" style="font-size: 27px; color: black;">Xpro</p>
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
                                    <h2>${{$data[0]->price}}.00</h2>
                                </div>
                            </td>
                        </tr>
                        <tr><td></td></tr>
                    </tbody>
                </table>

                <div class="row pb-5 p-5">
                    <div class="col-md-6">
                        <p class="font-weight-bold mb-4">BILL TO :</p>
                        <p class="mb-1">{{$data[0]->full_name}}</p>
                        <p class="mb-1">{{$data[0]->street}}</p>
                        <p>{{$data[0]->country}}</p>
                        <!-- <p class="mb-1">6781 45P</p> -->
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-4">Estimate#</p>
                        <p class="mb-1"> 1425782</p>
                        <p class="font-weight-bold mb-1">Date :</p>
                        <p class="mb-1">{{$data[0]->estimates_date}}</p>
                        <p class="font-weight-bold mb-1">Invoice Due Date :</p>
                        <p class="mb-1">{{$data[0]->issue_date}}</p>
                    </div>
                </div>

                <!-- <div class="row p-5"> -->
                    <!-- <div class="col-md-12"> -->
                      @foreach($data as $field)
                      <table class="table">
                        <thead>
                            <tr style="background: #4e73df; color: white;">
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 5%">ID</th>
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 15%">Item</th>
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 50%">Description</th>
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 10%">Quantity</th>
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 10%">Price</th>
                                <th class="border-0 text-uppercase small font-weight-bold" style="width: 10%">Ammount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-primary" style="color: black;">
                                <td>{{$id_product++}}</td>
                                <td>{{$field->name}}</td>
                                <td>{{$field->description}}</td>
                                <td>{{$field->quantity}}</td>
                                <td>${{$field->price}}</td>
                                <td>$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Notes :</p>
                            <p class="mb-1">{{$data[0]->notes}}</p>
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
                            <p class="font-weight-light mb-4">${{$data[0]->price}}</p>
                            <p class="font-weight-light mb-4">00%</p>
                            <p class="font-weight-light mb-4">$00.00</p>
                            <hr>
                            <br>
                            <p class="font-weight-bold mb-4">${{$data[0]->price}}.00</p>
                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse text-white p-4" style="background: #4e73df;">
                        <div class="col-md-6 text-right">
                            <div>Powered by - XPRO</div>
                        </div>
                        <div class="col-md-6">
                            <div>Invoice Detail Template</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

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

<script>

  $('.select-dropdown').select2();
</script>
@endsection