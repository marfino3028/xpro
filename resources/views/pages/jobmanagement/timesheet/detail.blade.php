@extends('layouts.index')

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Time Sheet Detail</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    
                </div>
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="" class="breadcrumb-item">Time Sheet Detail</a>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="breadcrumb justify-content-center">
                        <div class="breadcrumb-elements-item dropdown p-0">
                            <div class="dropdown-menu dropdown-menu-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Time Sheet Detail</h5>
                    <a href="#" onclick="printInvoice('timesheet')" class="btn btn-primary btn-sm"><i class="icon-printer mr-1"></i> Print</a>
                </div>
                <hr/>
                
                <div class="card-body timesheet" id="timesheet">
                    <div class="font-weight-bold" style="margin-bottom: 10px; margin-top: -25px;">
                        <center>
                            {{ \Carbon\Carbon::parse($start)->format('d M y') }} ~ {{ \Carbon\Carbon::parse($end)->format('d M y') }}
                        </center>
                    </div>
                    <div class="table-responsive">
                        @if (session('successverifi'))
                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">{{ session('successverifi') }}</span>
                        </div>
                        @endif 
                        <table class="table table-bordered">
                            <tbody>
                            @foreach ($showData as $date => $dategroup)
                                <tr class="fc-list-heading table-primary">
                                    <td colspan="5">
                                        {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
                                        <a class="fc-list-heading-alt">{{ \Carbon\Carbon::parse($date)->format('l') }}</a>
                                    </td>
                                </tr>
                                @php($totalll   = 0)
                                @php($tampil_normal_hours      = '')
                                @php($tampil_penalty_rates_x1  = '')
                                @php($tampil_penalty_rates_x2  = '')
                                @php($tampil_cost              = '')
                                @php($normal_hours      = 0)
                                @php($penalty_rates_x1  = 0)
                                @php($penalty_rates_x2  = 0)
                                @php($cost              = 0)

                                @php($total_hours   = 0)
                               
                                @foreach($dategroup as $data)
                                    <tr>
                                        <td class="fc-list-item-marker fc-widget-content">
                                            {{ $data->name }}
                                        </td>
                                        <td class="fc-list-item-marker fc-widget-content">
                                            {{ \Carbon\Carbon::parse($data->time_start)->format('h:i A') }} 
                                            - 
                                            {{ \Carbon\Carbon::parse($data->time_end)->format('h:i A') }}
                                        </td>
                                        <td class="fc-list-item-marker fc-widget-content">
                                            <b>{{ round(((((\Carbon\Carbon::parse($data->time_end)->timestamp) - (\Carbon\Carbon::parse($data->time_start)->timestamp))/60)/60),2) }} hrs</b>
                                        </td>
                                        <td class="fc-list-item-marker fc-widget-content">
                                            <span class="fc-event-dot" style="background-color: {{$data->color_input}}"></span>
                                        </td>
                                        <td>
                                            
                                            <?php
                                            $showWorkOrder  = \App\Models\WorkOrder::where('id',$data->workorder_id)->first();
                                            if($showWorkOrder == NULL){ ?>
                                                Work Order : #{{ $data->workorder_id }}<font style='color:red'> (Work Orders was Deleted) </font>
                                            <?php } else { ?>
                                                <a href="/work_orders/detail/{{ $data->workorder_id }}" target="_blank"> Work Order : # {{ $data->workorder_id }} </a>
                                            <?php } ?>
                                        </td>
                                    {{--<td>
                                        @if($data->hours == NULL)
                                            <form action="/time_tracking/check" method="post" >
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="hidden" name="start_date" value="{{ $start }}">
                                                <input type="hidden" name="end_date" value="{{ $end }}">
                                                <input type="hidden" name="staff_id" value="{{ $showStaff->id }}">
                                                <input type="hidden" name="hours" value="{{ round(((((\Carbon\Carbon::parse($data->time_end)->timestamp) - (\Carbon\Carbon::parse($data->time_start)->timestamp))/60)/60),2) }}">
                                                <button type="submit" class="btn btn-sm btn-outline-success"><i class="icon-checkmark3"></i></button>
                                            </form>
                                        @else
                                            <i class="icon-check"></i>
                                        @endif
                                        </td>--}}
                                    </tr>
                                    @php($totall = ((((\Carbon\Carbon::parse($data->time_end)->timestamp) - (\Carbon\Carbon::parse($data->time_start)->timestamp))/60)/60))
                                    @php($totalll += round($totall,2))

                                @endforeach
                                    <tr>
                                        <td colspan="2" class="fc-list-item-marker fc-widget-content text-right font-weight-bold">
                                            Total Hours :
                                        </td>
                                        <td colspan="4" class="fc-list-item-marker fc-widget-content text-left">
                                            <b>{{ $totalll }} hrs</b> <br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="fc-list-item-marker fc-widget-content text-right font-weight-bold">
                                            Normal Hours :
                                        </td>
                                        <td colspan="4" class="fc-list-item-marker fc-widget-content text-left"> 
                                        <?php                                       
                                            if( $timesheet_setting->normal_hours >= $totalll){
                                                $tampil_normal_hours = $totalll .' x $ '. $showStaff->rate_per_hour .' = ';
                                                $normal_hours =  ($showStaff->rate_per_hour*$totalll);
                                            }else{
                                                $tampil_normal_hours = $timesheet_setting->normal_hours .' x  $ '. $showStaff->rate_per_hour .' = ';
                                                $normal_hours = ($showStaff->rate_per_hour * $timesheet_setting->normal_hours);
                                            }
                                        ?>
                                        {{ $tampil_normal_hours }} <b>$ {{$normal_hours}}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="fc-list-item-marker fc-widget-content text-right font-weight-bold">
                                            Penalty Rates x1.5 :
                                        </td>
                                        <td colspan="4" class="fc-list-item-marker fc-widget-content text-left">
                                        <?php 
                                            if( $timesheet_setting->normal_hours >= $totalll){
                                                $penalty_rates_x1 = "0";
                                            }else{
                                                if( ($totalll - $timesheet_setting->normal_hours) >= $timesheet_setting->max_hours_penalty_1 ){
                                                    $tampil_penalty_rates_x1 = $timesheet_setting->max_hours_penalty_1 .' x $ '. ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_1) .' = ';
                                                    $penalty_rates_x1 = ($timesheet_setting->max_hours_penalty_1 * ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_1));
                                                }else{
                                                    $tampil_penalty_rates_x1 = ($totalll - $timesheet_setting->normal_hours) .' x $ '. ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_1) .' = ';
                                                    $penalty_rates_x1 = (($totalll - $timesheet_setting->normal_hours) * ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_1));
                                                }
                                            }
                                        ?>
                                        {{ $tampil_penalty_rates_x1 }} <b>$ {{ $penalty_rates_x1 }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="fc-list-item-marker fc-widget-content text-right font-weight-bold">
                                            Penalty Rates x2 :
                                        </td>
                                        <td colspan="4" class="fc-list-item-marker fc-widget-content text-left">
                                        <?php
                                            if( $timesheet_setting->normal_hours >= $totalll){
                                                $penalty_rates_x2 = "0";
                                            }else{
                                                if( ($totalll - $timesheet_setting->normal_hours) >= $timesheet_setting->max_hours_penalty_2 ){
                                                    $tampil_penalty_rates_x2 = (round($totalll - $timesheet_setting->normal_hours,2) - $timesheet_setting->max_hours_penalty_1) .' x $ '. ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_2) .' =  ';
                                                    $penalty_rates_x2 = ((round($totalll - $timesheet_setting->normal_hours,2) - $timesheet_setting->max_hours_penalty_1) * ($showStaff->rate_per_hour * $timesheet_setting->penalty_rates_2));
                                                }
                                            }
                                        ?>
                                        {{ $tampil_penalty_rates_x2 }} <b>$ {{ $penalty_rates_x2 }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="fc-list-item-marker fc-widget-content text-right font-weight-bold">
                                            Cost : 
                                        </td>
                                        <td colspan="4" class="fc-list-item-marker fc-widget-content text-left font-weight-bold">
                                            <b>$ {{ $normal_hours + $penalty_rates_x1 + $penalty_rates_x2 }}</b>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br/>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th width="33%">Name</th>
                                    <th width="33%">Time</th>
                                    <th width="33%">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Base Pay</td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total time</td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total clocked Hours</td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                            </tbody>
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
</script>
@endpush