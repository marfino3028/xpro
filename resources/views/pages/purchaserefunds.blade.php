@extends('masters/index_1')

@section('title')
    X Pro - Purchase Refunds
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
  <!-- perbaikan layout -->
  <link rel="stylesheet" href="{{ asset('custom/css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('custom/admin-lte/plugin/iCheck/square/blue.css') }}">
@endsection

@section('content')
  <!-- Circle Buttons -->
<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h6 class="m-0 font-weight-bold text-primary">Purchase Refunds</h6>
            <div class="card-body">
              <div class="content-header d-flex justify-content-between">
                <div>
                  <form>
                    <div class="form-row align-items-center">
                      <div class="col-auto">
                        <select class="custom-select">
                          <option selected>Any Supplier</option>
                          <option value="1">Test</option>
                        </select>
                      </div>
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">P.O. Number</label>
                        <input type="Text" class="form-control" id="inlineFormInputGroup" placeholder="Purchase Number">
                      </div>
                      <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary">Filter</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-auto justify-content-end">
                  <button type="submit" class="btn btn-outline-primary mb-2"><i class="fas fa-cog"></i></button>
                  <button type="submit" class="btn btn-outline-success mb-2"><i class="fas fa-plus"></i> New Purchase Order</button>
                </div>
              </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row justify-content-start">
                <div class="col-auto">
                  <button type="submit" class="btn btn-sm btn-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
                </div>
              </div>
              <br>
                <div class="table-responsive">
                  <table class="table" id="dataTableMultii" width="100%" cellspacing="0">
                  <thead class="bg-primary text-white">
                  <tr>
                      <th style="width:2%;">#</th>
                      <th>Customer Name</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Body 2</th>
                      <th>Created</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" id="" value=""></td>
                      <td>#1</td>
                      <td>Test Project</td>
                      <td></td>
                      <td></td>
                      <!--<td>
                          <!-- Dropdown Card Example ->
                        <div class="card border-left-success">
                          <!-- Card Header - Dropdown ->
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-info">#1 Test Project - 2020-02-27</h6>
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <i class="fas fa-envelope"> </i>  Email to Supplier</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <i class="fas fa-credit-card"> </i>  Add Payment</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <i class="fas fa-trash"> </i>  Delete</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> <i class="fas fa-clone"> </i>  Clone</a>
                              </div>
                            </div>
                          </div>
                          <!-- Card Body ->
                          <div class="card-body">
                            <div class="d-flex justify-content-between">
                              <div>
                              <ul style="list-style-type:none">
                                <li><i class="fas fa-phone"></i> <b>#1 2020-03-05</b></li>
                                <li><i class="fas fa-"></i> Title</li>
                                <li><i class="fas fa"></i> body</li>
                                <li><i class="fas fa"></i> body 2</li>
                            </ul>
                              </div>

                              <div>
                              <ul style="list-style-type:none">
                              <li> <b>Created: </b> 2020-03-05</li>
                              <li><h6><i class="fas fa-cart"></i> $777.00</h6><li>
                              <li><h6 style="color: red"> Refunded: $2.5214</h6><li>
                                <li class="badge badge-danger">Unreceived</li>
                                <li class="badge badge-success">Paid</li>
                              </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>-->
                    </tr>          
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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