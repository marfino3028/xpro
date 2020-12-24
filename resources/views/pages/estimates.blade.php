@extends('masters/index_1')

@section('title')
X Pro - Estimates
@endsection

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
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
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Estimates</h6>
  </div>
  <div class="card-body">
    <form>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Appointments</button>
        <a href="{{ route('create_estimates') }}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> New Estimates</a>

      </div>
    </form>
  </div>
</div>

<!-- Search -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Search  </h6>
  </div>
  <div class="card-body">
    <div class="form-row align-items-center">
      <div class="col-auto text-right">
        <select class="select-dropdown custom-select" id="select1" name="clients">
          <option value="">Select Clients</option>
          @foreach($showClient as $field)
          <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-auto">
        <label class="sr-only" for="inlineFormInputGroup">Invoice Number</label>
        <input type="Text" class="form-control" id="inlineFormInputGroup" placeholder="Estimate number">
      </div>
      <div class="col-auto">
        <select class="custom-select">
          <option selected>Any Status</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </div>
</div>
</div>


<!-- data tables -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List Estimates</h6>
  </div>

  <div class="card-body">
    <div class="row justify-content-start">
      <div class="col-auto">
        <button type="submit" class="btn btn-sm btn-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
      </div>
    </div>

    <br>

    <div class="table-responsive">
      @foreach($showData as $field)
      <table class="table" id="dataTableMulti" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width:2%;">#</th>
            <th>Customer Name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td>
              <!-- Dropdown Card Example -->
              <div class="card border-left-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{ route('estimatedetail', $field->id) }}" target="_blank">
                    <h6 class="m-0 font-weight-bold text-info">#{{$no++}} Estimate</h6>
                  </a>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-caret-down fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-search"> </i>  View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-edit"> </i>  Edit</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-file-pdf"> </i>  PDF</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-print"> </i>  Print</a>
                      <!-- <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-envelope"> </i>  Email to Client</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-credit-card"> </i>  Add Payment</a> -->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('deleteestimates', ['id' => $field->id ]) }}"> <i class="fas fa-trash"> </i>  Delete</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-clone"> </i>  Clone</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <ul style="list-style-type:none">
                        <li><i class="fas fa-user"></i> PM: {{$field->full_name}}</li>
                        <li><i class="fas fa-clock"></i> Due Date: {{$field->estimates_date}} | {{$field->issue_date}}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{$field->street}}, {{$field->city}}, {{$field->province}}</li>
                        <li><i class="fas fa-globe-asia"></i> {{$field->country}}</li>

                      </ul>


                      <span class="badge badge-info">#BigProject</span>
                      <span class="badge badge-info">#TeamProject</span>
                    </div>

                    <div>
                      <ul style="list-style-type:none">
                        <li><h2>${{$field->price}}.00</h2><li>
                          <li><i class="fas fa-info-circle"></i> Status: <span class="badge badge-success">Open</span></li>
                        </ul>


                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <!-- </tr> -->
          </tbody>
        </table>
        @endforeach
      </div>
    </div>
  </div>
  
  @endsection

  @section('js')
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Data table select -->
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/dataTables-select.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/tail.select-full.min.js') }}"></script>

  <script>
    tail.select('#select1', {
      search: true
    });
  </script>
  @endsection