@extends('masters/index_2')

@section('title')
    X Pro - Login
@endsection

@section('content')
<div class="limiter" style="background-image: url({{ asset('login/images/img-01.jpg') }});">
  <div class="container-login100">
    <div class="wrap-login100 p-t-150 p-b-30">
        <div class="login100-form-avatar">
          <img src="{{ asset('/img/logo4.png') }}" alt="Logo Xpro">
        </div>

        <span class="login100-form-title p-t-20 p-b-45">
          Welcome To XPRO
        </span>
        @if (session('error') != '')
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
          </div>
        @endif
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
        <form class="user" method="POST" action="{{ route('loginPost') }}">
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            <input autofocus autocomplete="off" class="input100" type="email" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
            <input class="input100" type="password" name="password" id="exampleInputPassword" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-10">
            <button type="submit" class="login100-form-btn">
							Login
						</button>
          </div>
          @csrf
      </form>

      <div class="text-center w-full p-t-25 p-b-230">
        <a class="small text-white" href="{{ route('resetPasswordGet') }}">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>
@endsection