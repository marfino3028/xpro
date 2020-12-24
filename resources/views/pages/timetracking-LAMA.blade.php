@extends('masters/index_1')

@section('title')
X Pro - Time Sheets
@endsection

@section('css')
<link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
<link href="{{ asset('fullcalendar-5.1.0/lib/main.min.css') }}" rel="stylesheet">
<style>
  .hover-end{
    padding: 0;
    margin: 0;
    font-size: 75%;
    text-align: center;
    position: absolute;
    bottom: 0;
    width: 100%;
    opacity: .8;
  }
</style>
@endsection

@section('content')
@if ($message = Session::get('sukses'))
  <div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
  </div>
@endif
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Time Sheet</h6>
  </div>
  <div class="card-body">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <button class="btn btn-dark" data-toggle="modal" data-target="#ModalAdd" data-whatever="@getbootstrap">Add</button>
      <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#ModalEdit" data-whatever="@getbootstrap">Edit</button> -->
    </div>
    <br>
    <br>
    <!-- start -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="recipient-name" name="name">
              </div>
              <div class="form-group">
                <label for="client">Select Work Orders</label><br>
                <select id="select1" name="WorkOrders">
                  <option value="">Select Work Orders</option>
                  @foreach($showWorkorder as $field)
                  <option value="{{ $field -> id}}">{{ $field -> title}}</option>
                  @endforeach
                </select>
                <!-- <a href="/add_new_client" class="btn btn-success mb-4 ml-3">New</a> -->
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" id="message-text" name="description"></textarea>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Start Date:</label>
                <input type="date" class="form-control" id="recipient-name" name="start_date">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">End Date:</label>
                <input type="date" class="form-control" id="recipient-name" name="end_date">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
            @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->
    <!-- Edit -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form>
            <div class="form-group">
              <label class="col-form-label">Name:</label>
              <input type="text" class="form-control" id="recipient-name" name="name">
            </div>
            <div class="form-group">
                <label for="client">Select Work Orders</label><br>
                <select id="select1" name="WorkOrders">
                  <option value="">Select Work Orders</option>
                  @foreach($showWorkorder as $field)
                  <option value="{{ $field -> id}}">{{ $field -> title}}</option>
                  @endforeach
                </select>
                <!-- <a href="/add_new_client" class="btn btn-success mb-4 ml-3">New</a> -->
              </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" id="message-text" name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Start Date:</label>
              <input type="date" class="form-control" id="recipient-name" name="start_date">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">End Date:</label>
              <input type="date" class="form-control" id="recipient-name" name="end_date">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->
  <div id='calendar'></div> 


</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/dropdown-search.js') }}"></script>
<script src="{{ asset('js/tail.select-full.min.js') }}"></script>
<script src="{{ asset('fullcalendar-5.1.0/lib/main.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    let datas   = '<?php echo json_encode($datas); ?>'
    datas = jQuery.parseJSON(datas)
    let events  = []
    let baseUrl = '{{ route("detailworkorder", ":id") }}';

    $.each(datas, function(i, item) {
      let urlLink = baseUrl.replace(':id', item.id)

      events[i] = {
        url: urlLink,
        title: item.description,
        start: item.start_date,
        end: item.end_date,
      }
    })

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      initialDate: '2020-07-09',
      headerToolbar: {
        center: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventMouseEnter: function(calEvent, jsEvent) {
        console.log('hovering')
        var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;">' + calEvent.title + '</div>';
        var $tooltip = $(tooltip).appendTo('body');

        $(this).mouseover(function(e) {
          $(this).css('z-index', 10000);
          $tooltip.fadeIn('500');
          $tooltip.fadeTo('10', 1.9);
        }).mousemove(function(e) {
          $tooltip.css('top', e.pageY + 10);
          $tooltip.css('left', e.pageX + 20);
        });
      },
      eventMouseLeave: function(calEvent, jsEvent) {
        console.log('leaving')
        $(this).css('z-index', 8);
        $('.tooltipevent').remove();
      },
      eventClick: function(info) {
        info.jsEvent.preventDefault()
        if (info.event.url) window.open(info.event.url);
      },
      events: events
    })
    calendar.render()
  });
</script>
<script>
  tail.select('#select1', {
    search: true
  });
</script>
@endsection