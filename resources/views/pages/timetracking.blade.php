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
                                <a href="/timesheet_add" class="btn btn-sm btn-primary"><i class="icon-plus3"></i></a>
                              </div>
                            <a href="/time_sheet_settings" type="submit" class="btn btn-sm btn-primary" title="Config">
                            <i class="icon-cogs"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="fullcalendar-agenda"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                Title
                                <span class="d-block font-size-base">subtitle</span>
                            </h6>
                        </div>

                        <div class="card-body">
                            Header Subtitle
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card">
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
                                <td>41.00 hrs</td>
                                <td>$123.00</td>
                            </tr>
                            <tr>
                                <td>Total time</td>
                                <td>41.00 hrs</td>
                                <td>$123.00</td>
                            </tr>
                            <tr>
                                <td>Total clocked Hours</td>
                                <td>38.70 hrs</td>
                                <td>$123.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
var FullCalendarBasic = function() {
    var _componentFullCalendarBasic = function() {
        if (typeof FullCalendar == 'undefined') {
            console.warn('Warning - Fullcalendar files are not loaded.');
            return;
        }
        var events = [
            {
                title: 'TITLE',
                url: 'http://xpros.ddns.net/',
                start: '2020-11-13'
            },
            {
                title: 'Meeting',
                start: '2020-11-13T10:30:00',
                end: '2020-11-13T12:30:00'
            },
        ];


        var calendarBasicViewElement = document.querySelector('.fullcalendar-basic');
        if(calendarBasicViewElement) {
            var calendarBasicViewInit = new FullCalendar.Calendar(calendarBasicViewElement, {
                plugins: [ 'dayGrid', 'interaction' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                defaultDate: '2020-11-13',
                editable: true,
                events: events,
                eventLimit: true
            }).render();
        }


        var calendarAgendaViewElement = document.querySelector('.fullcalendar-agenda');
        if(calendarAgendaViewElement) {
            var calendarAgendaViewInit = new FullCalendar.Calendar(calendarAgendaViewElement, {
                plugins: [ 'dayGrid', 'timeGrid', 'interaction' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                defaultDate: '2020-11-13',
                defaultView: 'timeGridWeek',
                editable: true,
                businessHours: true,
                events: events
            }).render();
        }

        var calendarListViewElement = document.querySelector('.fullcalendar-list');
        if(calendarListViewElement) {
            var calendarListViewInit = new FullCalendar.Calendar(calendarListViewElement, {
                plugins: [ 'list', 'interaction' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,listMonth'
                },
                views: {
                    listDay: { buttonText: 'Day' },
                    listWeek: { buttonText: 'Week' },
                    listMonth: { buttonText: 'Month' }
                },
                defaultView: 'listMonth',
                defaultDate: '2020-11-13',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: events
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