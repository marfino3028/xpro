@extends('layouts.index')

@section('title')
X Pro - Time Sheets
@endsection

@section('content')
<div class="page-content">
    <div class="content-wrapper">
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Time Sheet</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    
                </div>
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="" class="breadcrumb-item">Time Sheet</a>
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
                    <h5 class="card-title">Time Sheet</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <div class="mr-2">
                                <a href="/time_sheet_add" class="btn btn-sm btn-primary"><i class="icon-plus3"></i></a>
                            </div>
                            <div class="mr-2">
                              <a href="/time_sheet_settings" type="submit" class="btn btn-sm btn-primary" title="Config">
                                <i class="icon-cogs"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <form action="/time_tracking/search" method="post" target="_blank"> 
                    <div style="margin-left: 20px;">
                        <div class="row">
                            <div class="col-2">
                                <p class="font-weight-semibold">Staff</p>
                                <select required class="text-capitalize js-example-basic-single form-control" name="staff_id" id="staff_id">
                                    <option value="">Select Staff</option>
                                    @foreach($showStaff as $field)
                                    <option value="{{ $field -> id}}">{{ $field -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <p class="font-weight-semibold">Start Date</p>
                                <input required class="form-control" type="date" name="start_date">
                            </div>
                            <div class="col-2">
                                <p class="font-weight-semibold">End Date</p>
                                <input required class="form-control" type="date" name="end_date">
                            </div>
                            <div class="col-2">
                                <p class="font-weight-semibold">&nbsp;</p>
                                <button type="submit" class="btn  btn-outline-success btn-filter"><b><i class="icon-search4"></i></b></button>
                            </div>
                        </div>
                    </div>
                    @csrf   
                </form>
                <hr/>
                <div class="card-body">
                    <div class="fullcalendar-agenda"></div>
                </div>
            </div>

        {{--<div class="row" id="timesheet_detail">
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Sunday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Monday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Tuesday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Wednesday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                            <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Thursday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Friday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>1 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td>$ 10</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Saturday
                            </h6>
                        </div>
                        <div class="card-body">
                            <table style="width:100%">
                                <tr>
                                    <th style="width: 80%"><small>Normal Hours:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x1.5:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Penalty Rates x2:</small></th>
                                    <td>0 hrs</td>
                                </tr>
                                <tr>
                                    <th style="width: 80%"><small>Cost:</small></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        
            <div class="card" id="timesheet_summary">
            </div>--}}
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

$(document).ready(function() {
    $('.js-example-basic-single').select2({
        theme: "bootstrap"
    });
    $("input[name$='status']").click(function() {
    var test = $(this).val();
    $("div.desc").hide();
    $("#" + test).show();
    });

    $('#project_name').on('change', function() {
        let company = $(this).find(':selected').data("company");
        $('#company').val(company);
    });
});

var FullCalendarBasic = function() {
    var _componentFullCalendarBasic = function() {
        if (typeof FullCalendar == 'undefined') {
            console.warn('Warning - Fullcalendar files are not loaded.');
            return;
        }
        let data = JSON.parse({!!json_encode($data_event)!!});
        console.log(data)
        let events = [];
        data.forEach(element => {
            events.push({
                'id'            : element.id,
                'title'         : element.name,
                'start'         : element.time_start,
                'end'           : element.time_end,
                'color'         : element.color_input,
                /*
                'id'    : element.id,
                'title' : element.name,
                'start' : element.workorder ? element.workorder.start_date : null,
                'end'   : element.workorder ? element.workorder.end_date : null,
                'color' : element.color_input,
                'workerorder_id' : element.workorder.id ? element.workorder.id : null,
                'order_number' : element.workorder.order_number ? element.workorder.order_number : null,
                'description' : element.description,
                */
            })
        });

        var calendarAgendaViewElement = document.querySelector('.fullcalendar-agenda');
        if(calendarAgendaViewElement) {
            var calendarAgendaViewInit = new FullCalendar.Calendar(calendarAgendaViewElement, {
                plugins: [ 'dayGrid', 'timeGrid', 'interaction' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                // defaultDate: '2020-11-13',
                defaultView: 'timeGridWeek',
                editable: false,
                businessHours: true,
                events: events,
                eventClick: function(info) {
                    $.ajax({
                        url: `{{url('')}}/time_sheet_detail_by_id?id=${info.event.id}`,
                            dataType: "json",
                            type: "GET",
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                let total_time = 0;
                                let total_pay = 0;
                                $('#timesheet_detail').html('');
                                $('#timesheet_summary').html('');
                                response.data.forEach(element => {
                                    total_time  += parseInt(element.settings.normal_hours);
                                    total_pay   += parseInt(element.workorder.hourly_rate) * parseInt(element.settings.normal_hours)
                                    // activity timesheet
                                    $('#timesheet_detail').append(`
                                    <div class="col-2">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">
                                                    ${element.title}
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <table style="width:100%">
                                                <tr>
                                                    <th style="width: 70%"><small>Normal Hours:</small></th>
                                                    {{--<td>${element.settings.normal_hours} hrs</td>--}}
                                                    <td>2 hrs</td>
                                                </tr>
                                                ${element.settings.enable_penalty ? `
                                                    <tr>
                                                    <th style="width: 70%"><small>Penalty Rates x1.5:</small></th>
                                                    {{--<td>${element.settings.max_hours_penalty_1} hrs</td>--}}
                                                    <td>0 hrs</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 70%"><small>Penalty Rates x2:</small></th>
                                                        {{--<td>${element.settings.max_hours_penalty_2} hrs</td>--}}
                                                        <td>0 hrs</td>
                                                    </tr>
                                                ` : ''}
                                                    <tr>
                                                        <th style="width: 70%"><small>Cost:</small></th>
                                                        {{--<td>$${(parseInt(element.workorder.hourly_rate) * parseInt(element.settings.normal_hours))}</td>--}}
                                                        <td>$ 90 </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    `)
                                });
                                // timesheet summary
                                $('#timesheet_summary').append(`
                                    <div class="table-responsive">
                                        <table class="table table-xs">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Time</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Base Pay</td>
                                                    <td>${total_time} hrs</td>
                                                    <td>$${total_pay}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total time</td>
                                                    <td>${total_time} hrs</td>
                                                    <td>$${total_pay}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total clocked Hours</td>
                                                    <td>${total_time} hrs</td>
                                                    <td>$${total_pay}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    `)
                            },
                            error: function (response) {
                            }
                        });
                }
            }).render();
        }

    };

    return {
        init: function() {
            _componentFullCalendarBasic();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    FullCalendarBasic.init();
});

</script>
@endpush