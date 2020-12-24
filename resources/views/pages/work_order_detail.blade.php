@extends('layouts.index')

@section('title')
    X Pro - Work Orders
@endsection

@push('css')
<style>
    
</style>
@endpush

@section('content')
@if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<br>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-7">
                    <h6 class="m-0 font-weight-bold text-primary">Work Orders</h6>
                </div>
                <div class="col-md-5">
                    <?php
                    $client_name = $data->client_business_name != null ? $data->client_business_name :
                    $data->client_name;
                    $fname = "Work_Order_$client_name" . "_$data->order_number";
                    ?>
                    <a  style="margin-left: 71px;" href="#" onclick="createPdf('work_order', '{{ $fname }}')" class="btn btn-primary btn-sm"><i
                            class="fa fa-file"></i> Export as PDF</a>
                    <a href="#" onclick="printInvoice('work_order')" class="btn btn-primary btn-sm"><i
                            class="fa fa-print"></i> Print</a>
                    <a href="/work_orders/edit_work_order/{{ $data->id }}" class="btn btn-success btn-sm"><i
                            class="fas fa-edit"></i> Edit</a>
                    <button data-toggle="modal" data-target="#EmailModal" data-whatever="@getbootstrap"
                        class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send to Email</button>

                    <!-- start -->
                    <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('sendEmail', ['id' => $data->id]) }}" method="post">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">From:</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                value="{{ $data->email_staff }}" name="from">
                                            <label for="recipient-name" class="col-form-label">To:</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                value="{{ $data->email_client }}" name="to">
                                            <label for="recipient-name" class="col-form-label">Subject: </label>
                                            <input type="text" class="form-control" id="recipient-name" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text" name="message"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="work_order" id="work_order" style="background-color:#FFF" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-6"><br><br>
                            <p class="font-weight-bold" style="font-size: 30px; font-family: sans-serif;">X -PRO</p>
                            <small>
                                Company Address <br>
                                Company City <br>
                                02154318575 <br>
                                email company <br>
                            </small>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('img/logo4.png') }}" class="" align="right" style="width: 200px;" />
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">CLIENT NAME</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $client_name }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">ORDER NUMBER</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->order_number }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">CLIENT PHONE</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->client_mobile }}</strong></td>
                                <td style="width: 30%;" class="table-primary border-primary">CUSTOMER ID</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->client_name }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary"> CLIENT EMAIL</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->client_email }}</strong></td>
                                <td style="width: 30%;" class="table-primary border-primary">ORDER RECEIVED BY</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->order_received_by }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">HOURLY RATE</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->hourly_rate }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">BUDGET</td>
                                <td style="width: 30%;" class="border border-primary"><strong>$ {{ $data->budget }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">PRIORITY LEVEL</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->priority_level }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">ORDER DATE</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->start_date }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">DATE NEEDED</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->end_date }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">DATE DELIVERED</td>
                                <td style="width: 30%;" class="border border-primary"></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">WORK ASSIGNED TO</td>
                                <td style="width: 30%;" class="border border-primary text-capitalize"><strong>{{ $data->staff_name }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">WORK BILLED TO</td>
                                <td style="width: 30%;" class="border border-primary"></td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">Start Date</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->start_date }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">End Date</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->end_date }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td class="text-center table-primary border-primary">REQUEST DESCRIPTION</td>
                            </tr>
                            <tr>
                                <td class="border-primary text-capitalize">
                                    <strong>{{ $data->description }}</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td class="text-center table-primary border-primary">DESCTIPTION OF WORK COMPLETED</td>
                            </tr>
                            <tr>
                                <td class="border-primary text-capitalize">
                                    <strong>-</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td class="text-center table-primary border-primary">EXPLANATION OF INCOMPELETE WORK</td>
                            </tr>
                            <tr>
                            <td class="border-primary text-capitalize">
                                    <strong>-</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">WORK COMPELETED BY</td>
                                <td style="width: 30%;" class="border-primary"></td>
                                <td style="width: 20%;" class="table-primary border-primary">DATE</td>
                                <td style="width: 30%;" class="border-primary"></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">WORK APPROVED BY</td>
                                <td style="width: 30%;" class="border-primary"></td>
                                <td style="width: 20%;" class="table-primary border-primary">DATE</td>
                                <td style="width: 30%;" class="border-primary"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
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

        function createPdf(id, filename) {
            var options = {
                background: '#FFFFFF'
            };
            var pdf = new jsPDF('p', 'pt', 'a4');
            pdf.addHTML($("#work_order"), 15, 15, options, function() {
                pdf.save(`${filename}.pdf`);
            });
        }

    </script>
@endpush
