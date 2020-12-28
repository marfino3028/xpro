@extends('layouts.index')

@section('title')
X Pro - Time Sheets
@endsection

@section('content')
<style>
    #scroll, #list {
    position: absolute;
    left: 10px;
    top: 124px;
    bottom: 0;
    width: 240px;
}

.item {
    box-sizing: border-box;
    padding: 10px 20px;
    margin-bottom: 10px;
}

#scheduler {
    margin-left: 270px;
}

.dx-draggable-source {
    opacity: 0.5;
}

.dx-popup-content {
    bottom: 250px;
}

.dx-draggable-dragging > * {
    box-shadow: 0 1px 3px, 0 3px 5px;
}
.dx-draggable {
    
}
</style>
<script>
    $(function () {
    var draggingGroupName = "appointmentsGroup";

    var createItemElement = function(data) {
        $("<div>")
            .text(data.text)
            .addClass("item dx-card dx-theme-background-color dx-theme-text-color")
            .appendTo("#list")
            .dxDraggable({
                group: draggingGroupName,
                data: data,
                clone: true,
                onDragEnd: function(e) {
                    if (e.toData) {
                        e.cancel = true;
                    }
                },
                onDragStart: function(e) {
                    e.itemData = e.fromData;
                }
            });
    }

    $("#scroll").dxScrollView({});

    $("#list").dxDraggable({
        data: "dropArea",
        group: draggingGroupName,
        onDragStart: function(e) {
            e.cancel = true;
        }
    });

    tasks.forEach(function(task) {
        createItemElement(task);
    });

    $("#scheduler").dxScheduler({
        timeZone: "America/Los_Angeles",
        dataSource: appointments,
        views: [{
            type: "day",
            intervalCount: 3
        }],
        currentDate: new Date(2021, 4, 24),
        startDayHour: 8,
        height: 600,
        editing: true,
        appointmentDragging: {
            group: draggingGroupName,
            onRemove: function(e) {
                e.component.deleteAppointment(e.itemData);
                createItemElement(e.itemData);
            },
            onAdd: function(e) {
                e.component.addAppointment(e.itemData);
                e.itemElement.remove();
            }
        }
    });
});


var tasks = [
    {
        text: "New Brochures"
    }, {
        text: "Brochure Design Review"
    }, {
        text: "Upgrade Personal Computers"
    }, {
        text: "Install New Router in Dev Room"
    }, {
        text: "Upgrade Server Hardware"
    }, {
        text: "Install New Database"
    }, {
        text: "Website Re-Design Plan"
    }, {
        text: "Create Icons for Website"
    }, {
        text: "Submit New Website Design"
    }, {
        text: "Launch New Website"
    }
];

var appointments = [{
        text: "Book Flights to San Fran for Sales Trip",
        startDate: new Date("2021-05-24T19:00:00.000Z"),
        endDate: new Date("2021-05-24T20:00:00.000Z"),
        allDay: true
    }, {
        text: "Approve Personal Computer Upgrade Plan",
        startDate: new Date("2021-05-25T17:00:00.000Z"),
        endDate: new Date("2021-05-25T18:00:00.000Z")
    }, {
        text: "Final Budget Review",
        startDate: new Date("2021-05-25T19:00:00.000Z"),
        endDate: new Date("2021-05-25T20:35:00.000Z")
    }, {
        text: "Approve New Online Marketing Strategy",
        startDate: new Date("2021-05-26T19:00:00.000Z"),
        endDate: new Date("2021-05-26T21:00:00.000Z")
    }, {
        text: "Customer Workshop",
        startDate: new Date("2021-05-27T18:00:00.000Z"),
        endDate: new Date("2021-05-27T19:00:00.000Z"),
        allDay: true
    }, {
        text: "Prepare 2021 Marketing Plan",
        startDate: new Date("2021-05-27T18:00:00.000Z"),
        endDate: new Date("2021-05-27T20:30:00.000Z")
    }
];

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/20.2.4/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/20.2.4/css/dx.greenmist.css" />
    <script src="https://cdn3.devexpress.com/jslib/20.2.4/js/dx.all.js"></script>

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
                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <div id="filters" style="display: none;">
                                    <button type="button" class="dropdown-item" onclick="deleteInvoice()"><i class="icon-trash red-text"></i> Delete</button>
                                </div>
                                <a href="/time_sheet_add" class="breadcrumb-elements-item">
                                    <i class="icon-add mr-2"></i>
                                    Create Time Sheet
                                </a>
    
                                <a href="/time_sheet_settings" class="breadcrumb-elements-item">
                                    <i class="icon-gear mr-2"></i>
                                    Settings Time Sheet
                                </a>
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
                    
                    <div id="scroll">
                            <div id="list"></div>
                    </div>
                        <div id="scheduler"></div>
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