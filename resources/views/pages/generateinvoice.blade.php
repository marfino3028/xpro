@extends('masters/index_1')

@section('title')
    X Pro - Generate Invoices
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> 
@endsection

@section('content')
  <!-- Circle Buttons -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Generate an invoice from a time sheet</h6>
    </div>
    <div class="card-body">
        <form action="" method="POST">

        <div class="row">
        <div class="col-6">
        <div class="form-group">
                <label for="List">List By</label>
                <select class="custom-select" id="List" name="List">
                  <option value="1">Project</option>
                  <option value="2">Activity</option>
                  <option value="3">Staff</option>
                  <option value="4">Date</option>
                </select>
                
            </div>
            </div>
            <div class="col-6">
       
            <div class="form-group">
                <label for="Format">Format</label>
                <select class="custom-select" id="Format" name="Format">
                  <option value="1">Grouped</option>
                  <option value="2">Detailed</option>
                </select>
            </div>
            </div>
        <div class="col-12">

        <div class="form-group">
        <label for="Format">Include in Description:</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
          <label class="form-check-label" for="inlineCheckbox3">Project</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Activity</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Staff</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Date</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Notes</label>
        </div>
        
        </div>
        </div>
        </div>
           
          
            <div class="form-group">
                <label for="tag">Date Range</label>
                <input type="text" class="form-control" id="drange" name="drange">
            </div>

<form id="form" name="form" class="form-inline">
    <div class="form-group">
        <label for="startDate">Start Date</label>
        <input id="startDate" name="startDate" type="text" class="form-control" />
        &nbsp;
        <label for="endDate">End Date</label>
        <input id="endDate" name="endDate" type="text" class="form-control" />
    </div>
</form>

            <div class="form-group">
                <label for="tag">Default Hour Rate</label>
                <input type="number" class="form-control" id="hrate" name="hrate">
            </div>



            <div class="form-group">
                <label for="staff">Project</label>
                <select class="custom-select" id="project" name="project">
                  <option value="1">All</option>
                  <option value="2">General</option>
                </select>
            </div>

            <div class="form-group">
                <label for="staff">Activity</label>
                <select class="custom-select" id="project2" name="project2">
                  <option value="1">All</option>
                  <option value="2">General</option>
                </select>
            </div>
          <div class="row">
            <div class="col-12">
            <input type="submit" class="btn btn-success btn-block" value="Submit"/> 
            </div>
          </div>  
        </form>
          
    </div>
  </div>
@endsection

@section('js')
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection