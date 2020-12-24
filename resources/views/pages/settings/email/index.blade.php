@extends('masters/index_1')

@section('title')
    X Pro - SMTP Settings
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">SMTP Settings</h6>
    </div>
    {{-- <div class="card-body">
    <div class="form-check ml-3">
            <input type="checkbox" class="form-check-input" id="exampleCheck1"/>
            <label class="form-check-label" for="exampleCheck1">Send emails using my SMTP account</label>
        </div>
    <br>
    <a href="#" class="btn btn-success btn-icon-split col-auto ml-3">
        <span class="icon text-white-50">
            <i class="fas fa-chevron-right"></i>
        </span>
        <span class="text">Save</span>
    </a>
    </div> --}}
    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
      @endif 
      @if (session('failed'))
      <div class="alert alert-danger">
      {{ session('failed') }}
      </div>
      @endif 
      <div id="show-me">
        <form action="/smtp_settings/update" method="POST">
            @csrf
            <label for="exampleFormControlInput1">Sender Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="sender_email" value="{{ $data->sender_email }}" placeholder="Sender email">
              <br>
              <label for="exampleFormControlInput1">SMTP Host</label>
            <input type="text" class="form-control" id="exampleFormControlInput11" name="smtp_host" value="{{ $data->smtp_host }}" placeholder="Smtp host">
              <br>
              <label for="exampleFormControlInput1">SMTP Port</label>
            <input type="text" class="form-control" id="exampleFormControlInput12" name="smtp_port" value="{{ $data->smtp_port }}" placeholder="Smtp port">
              <br>
            <label for="exampleFormControlInput1">SMTP Username</label>
            <input type="text" class="form-control" id="exampleFormControlInput4" name="smtp_username" value="{{ $data->smtp_username }}" placeholder="Smtp username"> 
              <br>
            <label for="exampleFormControlInput1">SMTP Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput4" name="smtp_password" value="{{ $data->smtp_password }}" placeholder="Smtp Password"> 
              <br>
            <label for="exampleFormControlInput1">SMTP Security</label>
                        <select class="custom-select" name="smtp_security">
                          <option selected>Select Security</option>
                          <option value="ssl" @if($data->smtp_security == "ssl") selected @endif>SSL</option>
                          <option value="tls" @if($data->smtp_security == "tls") selected @endif>TLS </option>
                        </select>
          </div>
          <br><br>
          <button type="submit" class="btn btn-success btn-icon-split col-auto ml-3">
                <span class="icon text-white-50">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <span class="text">Save</span>
          </button>
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