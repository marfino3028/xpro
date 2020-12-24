@extends('masters/index_1')

@section('title')
    X Pro - Time Tracking Settings 
@endsection

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
@endsection

@section('content')
  <!-- Circle Buttons -->
  <div class="row">
<div class="col-lg-12 mb-4" >
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Time Tracking Settings</h6>
    </div>

<div class="card-body" id="cardMoreOptions">
  <!-- Nav tabs -->

    <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#menu1">General</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Projects</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#menu3">Activities</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="menu1" class=" tab-pane active"><br>
      <div class="form-check col-auto">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Calculate entered time records in Expenses report, Profit & loss report and other financial reports</label>
      </div>
      <br>
      <form>
        <div class="col-auto">
          <div class="col-auto">
          <label for="">First day of week : </label><br>
            <select class="custom-select" style="width: 500px;">
              <option selected value="1">Monday</option>
              <option value="2">Tuesday</option>
              <option value="3">Wednesday</option>
              <option value="4">Thursday</option>
              <option value="5">Friday</option>
              <option value="6">Saturday</option>
              <option value="7">Sunday</option>
            </select>
          </div>
<br>
          <div class="col-auto">
          <label for="">Admin hourly rate</label> <br>
          <input type="text" class="form-control" style="width: 500px;">
          </div>
          <p></p>

          <a href="#" class="btn btn-success btn-icon-split col-auto">
              <span class="icon text-white-50">
                  <i class="fas fa-chevron-right"></i>
              </span>
              <span class="text">Save</span>
          </a>
        </div>
      </form>
    </div>

    <div id="menu2" class=" tab-pane fade"><br>
    
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
    </div>
    <div class="card-body">
      <form>
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> New Project</button>

      </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Project</h6>
    </div>
    
    <div class="card-body">
    <div class="row justify-content-start">
    <div class="col-auto">
      <button type="submit" class="btn btn-sm btn-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
    </div>
      </div>

      <br>

      <div class="table-responsive">
    <table class="table table-bordered" id="dataTableMulti" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Id</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td>1</td>
          <td>Sahtia Murti</td>
          <td>Yes</td>
          <td>
          <button type="submit" class="btn btn-info mb-2">View</button>
          <button type="submit" class="btn btn-info mb-2">Edit</button>
          <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>2</td>
          <td>Murti</td>
          <td>No</td>
          <td>
          <button type="submit" class="btn btn-info mb-2">View</button>
          <button type="submit" class="btn btn-info mb-2">Edit</button>
          <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>

        
    </div>

    <div id="menu3" class=" tab-pane fade"><br>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Activity</h6>
    </div>
    <div class="card-body">
      <form>
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> New Activities</button>

      </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Activities</h6>
    </div>
    
    <div class="card-body">
    <div class="row justify-content-start">
    <div class="col-auto">
      <button type="submit" class="btn btn-sm btn-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
    </div>
      </div>

      <br>

      <div class="table-responsive">
    <table class="table table-bordered" id="dataTableMulti" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Id</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td>1</td>
          <td>Sahtia Murti</td>
          <td>Yes</td>
          <td>
          <button type="submit" class="btn btn-info mb-2">View</button>
          <button type="submit" class="btn btn-info mb-2">Edit</button>
          <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>2</td>
          <td>Murti</td>
          <td>No</td>
          <td>
          <button type="submit" class="btn btn-info mb-2">View</button>
          <button type="submit" class="btn btn-info mb-2">Edit</button>
          <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>


      
    </div>




    </div> 
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


  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <script>

$('.select-dropdown').select2();
  </script>
@endsection