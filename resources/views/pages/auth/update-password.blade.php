@extends('masters/index_2')

@section('title')
    X Pro - Forgot Password
@endsection

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Please input your new password</h1>
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
                  @if ($errors->any())
                      @foreach ($errors->all() as $error)
                          <div class="alert alert-danger">{{$error}}</div>
                      @endforeach
                  @endif
                </div>
                <form class="user" action="{{ route('updateNewPassword') }}" method="POST">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Enter New Password...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="confirm_password" placeholder="Enter Confirm New Password...">
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Update Password
                  </button>
                </form>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection