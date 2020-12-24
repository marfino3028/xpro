@extends('masters/index_2')

@section('title')
    X Pro - Forgot Password
@endsection

@section('content')
<div class="limiter" style="background-image: url({{ asset('login/images/img-01.jpg') }});">
  <div class="container-login100">
    <div class="wrap-login100 p-t-150 p-b-30">
        <div class="login100-form-avatar">
          <img src="{{ asset('/img/logo4.png') }}" alt="Logo Xpro">
        </div>

        <span class="login100-form-title p-t-20 p-b-45">
          Forgot Your Password?
        </span>
        <p class="mb-4 text-black">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
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
        <form class="user" method="POST" action="{{ route('resetPasswordPost') }}">
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            <input class="input100" type="email" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope"></i>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-10">
            <button type="submit" class="login100-form-btn">
            Reset Password
						</button>
          </div>
          @csrf
      </form>

      <div class="text-center w-full p-t-25 p-b-230">
        <a class="small text-white" href="{{ route('login') }}">Already have an account? Login!</a>
      </div>
    </div>
  </div>
</div>
@endsection