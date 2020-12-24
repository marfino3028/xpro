@extends('masters/index_1')

@section('title')
    X Pro - Treasuries & Bank Accounts

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
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Treasuries & Bank Accounts</h6>
    </div>

    <div class="card-body">
      <form>
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add Treasury</button>
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add Bank Account</button>
      </div>
      </form>
    </div>
  </div>

  <div class="card shadow">
          <div class="ml-3">
          <table class="table">
              <tbody>
                <tr>
                  <td valign="middle"><br>
                    <font class="font-weight-bold ml-1" size="4">Main</font><br>
                  </td>
                  <td width="320px"></td>
                  <td width="120px" valign="middle" align="right">
                      <font class="font-weight-bold" size="4">-$20,981.60</font>
                      <font class="font-weight-bold" size="3">
                          <mark style="background: green; color: white;">ACTIVE</mark>
                      </font>
                  </td>
                  <td width="80px">
                      <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><hr>
                          <div class="dropdown-menu">
                              <a class=" fas fa-search" href="#"> View</a>
                          </div>
                      </div>
                  </td>
                </tr>
              </tbody>
          </table>
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