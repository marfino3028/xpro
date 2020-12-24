@extends('layouts.index')


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
                    $client_name = $showClient->client_business_name != null ? $showClient->client_business_name :
                    $showClient->client_name;
                    $fname = "Work_Order_$client_name" . "_$showClient->order_number";
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
                            <p class="font-weight-bold" style="font-size: 30px; font-family: sans-serif;">{{ $company_setting->business_name }}</p>
                                {{ $company_setting->business_address }}<br/>
                                {{ $company_setting->business_email }}<br/>
                                {{ $company_setting->business_phone }}
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
                                <td style="width: 30%;" class="border border-primary text-capitalize"><strong>{{ $showClient->full_name }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">ORDER NUMBER</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->order_number }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">CLIENT PHONE</td>
                                <td colspan="3" style="width: 30%;" class="border border-primary"><strong>{{ $showClient->mobile }}</strong></td>
                            {{--<td style="width: 30%;" class="table-primary border-primary">CUSTOMER ID</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->client_name }}</strong></td>--}}
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary"> CLIENT EMAIL</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $showClient->email }}</strong></td>
                                <td style="width: 30%;" class="table-primary border-primary">ORDER RECEIVED BY</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->order_received_by }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">HOURLY RATE</td>
                                <td style="width: 30%;" class="border border-primary"><strong>$ {{ number_format($data->hourly_rate,2,'.',',') }}</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">BUDGET</td>
                                <td style="width: 30%;" class="border border-primary"><strong>$ {{ number_format($data->budget,2,'.',',') }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">PRIORITY LEVEL</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ $data->priority_level }}</strong></td>
                                <td style="width: 30%;" class="table-primary border-primary">ORDER DATE</td>
                                <td style="width: 30%;" class="border border-primary"><strong>{{ date('d M y h:m A', strtotime($data->created_at)) }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">DATE NEEDED</td>
                                <td colspan="3" style="width: 30%;" class="border border-primary"><strong>{{ date('d M y h:m A', strtotime($data->delivered_date)) }}</strong></td>
                            {{--<td style="width: 20%;" class="table-primary border-primary">DATE DELIVERED</td>
                                <td style="width: 30%;" class="border border-primary"></td>--}}
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">WORK ASSIGNED TO</td>
                                <td style="width: 80%;" class="border border-primary text-capitalize">
                                
                                <?php
                                foreach ($data->id_staff as $value){
                                    $showStaff  = \App\Models\Staff::where('id',$value)->first();
                                    echo "<strong>- ".$showStaff->name."</strong>";
                                    echo "<br/>";
                                }
                                ?>                                
                                </td>
                            {{--<td style="width: 20%;" class="table-primary border-primary">WORK BILLED TO</td>
                                <td style="width: 30%;" class="border border-primary"></td>--}}
                            </tr>
                        </table>
                    </div>
                    <br />
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border-primary">Start Date</td>
                                <td style="width: 30%;" class="border border-primary"><strong>@if($data->start_date != null) {{ date('d M y h:m A', strtotime($data->start_date)) }} @endif</strong></td>
                                <td style="width: 20%;" class="table-primary border-primary">End Date</td>
                                <td style="width: 30%;" class="border border-primary"><strong>@if($data->end_date != null) {{ date('d M y h:m A', strtotime($data->end_date)) }} @endif</strong></td>
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
                                <td class="text-center table-primary border-primary">DESCRIPTION OF WORK COMPLETED</td>
                            </tr>
                            <tr>
                                <td class="border-primary text-capitalize">
                                    <strong>{{ $data->description_work_completed }}</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                            @if($data->explanation_pending_work != NULL )
                                <td class="text-center table-primary border-primary">EXPLANATION OF PENDING WORK</td>
                            @endif
                            @if($data->explanation_incomplete_work != NULL )
                                <td class="text-center table-primary border-primary">EXPLANATION OF CANCELATION WORK</td>
                            @endif
                            </tr>
                            <tr>
                                <td class="border-primary text-capitalize">
                                @if($data->explanation_pending_work != NULL)
                                    <strong>{{ $data->explanation_pending_work }}</strong>
                                @endif
                                @if($data->explanation_incomplete_work != NULL)
                                    <strong>{{ $data->explanation_incomplete_work }}</strong>
                                @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td class="text-center table-primary border-primary">NOTES</td>
                            </tr>
                            <tr>
                            <td class="border-primary text-capitalize">
                                    <strong>{{ $data->notes }}</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                            @if($data->status == 1)
                                <td class="text-center table-light border-primary"><strong>STATUS : DRAFT</strong></td>
                            @endif
                            @if($data->status == 2)
                                <td class="text-center table-success border-primary"><strong>STATUS : FINISH</strong></td>
                            @endif
                            @if($data->status == 3)
                                <td class="text-center table-warning border-primary"><strong>STATUS : PENDING</strong></td>
                            @endif
                            @if($data->status == 4)
                                <td class="text-center table-danger border-primary"><strong>STATUS : CANCLED</strong></td>
                            @endif
                            @if($data->status == 5)
                                <td class="text-center table-info border-primary"><strong>STATUS : ON GOING</strong></td>
                            @endif
                            @if($data->status == 6)
                                <td class="text-center table-primary border-primary"><strong>STATUS : WAITING APPROVAL</strong></td>
                            @endif
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="table-primary border border-primary">WORK COMPELETED BY</td>
                                <td style="width: 30%;" class="border-primary">{{ $data->completed_by }}</td>
                                <td style="width: 20%;" class="table-primary border border-primary">DATE</td>
                                <td style="width: 30%;" class="border-primary"><strong>{{ $data->completed_date }}</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;" class="table-primary border border-primary">WORK APPROVED BY</td>
                                <td style="width: 30%;" class="border-primary"><strong>{{ $data->approved_by }}</strong></td>
                                <td style="width: 20%;" class="table-primary border border-primary">DATE</td>
                                <td style="width: 30%;" class="border-primary"><strong>@if($data->approved_date <> '') {{ date('d M y h:m A', strtotime($data->approved_date)) }} @endif</strong></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div class="row">
                        <table class="table border border-primary">
                            <tr>
                                <td style="width: 20%;" class="text-center table-primary border border-primary">ITEM</td>
                                <td style="width: 20%;" class="text-center table-primary border border-primary">QUANTITY</td>
                            </tr>
                            @foreach($showItems as $field)
                            <tr>
                                <td style="width: 20%;" class="text-center border border-primary"><strong>{{ $field->product->name }}</strong></td>
                                <td style="width: 20%;" class="text-center border border-primary"><strong>{{ $field->qty }}</strong></td>
                            </tr>
                            @endforeach
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
