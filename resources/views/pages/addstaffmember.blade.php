@extends('layouts.index')

@section('title')
X Pro - Add Staff Member
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Works Order</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Works Order</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->
    
    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <form action="{{ route('poststaffmembers') }}" method="post">
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4" id="cardClientDetails">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Staff Member Details</h6>
                        </div>
                        <div class="card-body">
                            <div id="show-me">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First name" name="name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">Home Phone</label>
                                <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Telephone" name="home_phone"> 
                                @error('home_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">Mobile</label>
                                <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Mobile" name="mobile_phone"> 
                                @error('mobile_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">Full Address</label>
                                <input type="text" class="form-control @error('full_address') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Address" name="full_address">
                                @error('full_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Address" name="city"> 
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">State</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="state">
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="exampleFormControlInput1">Postal Code</label>
                                <input type="number" class="form-control @error('postal_code') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="postal_code">
                                @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="form-row align-items-center">
                                    <label for="exampleFormControlInput1">Country</label>
                                    <select class="text-capitalize js-example-basic-single form-control" name="country">
                                        <option selected>Select Country</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Australian">Australian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row align-items-center">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                                @endforeach
                                @endif
                                <div class="col-auto">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput11" placeholder="Email" name="email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <input type="password" class="form-control"  placeholder="Password" name="password">
                                    <br>
                                    <input type="password" class="form-control" placeholder="Confirmation Password"  name="password_confirmation" id="confirm_password">
                                    <br>
                                    <div class="form-row align-items-center">
                                        <label for="exampleFormControlInput1">Notes</label>
                                        <textarea type="text-area" class="form-control" id="exampleFormControlInput11" name="notes"></textarea>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-row align-items-center ml-2">
                                            <label for="exampleFormControlInput1">Role</label>
                                            <select class="js-example-basic-single custom-select @error('role_id') is-invalid @enderror" name="role_id">
                                                @foreach($role as $value)
                                                <option selected value="{{ $value->id }}">{{ $value->name_role }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <div style="margin-top: 20px;" class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input @error('status') is-invalid @enderror" id="customRadioInline1" name="status" value="1">
                                                <label class="custom-control-label" for="customRadioInline1">Active</label>
                                                @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror         
                                            </div>
                                            <div style="margin-top: 20px;" class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input @error('status') is-invalid @enderror" id="customRadioInline2" name="status" value="2">
                                                <label class="custom-control-label" for="customRadioInline2">Nonactive</label>
                                                @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror         
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row align-items-center">
                                        <label for="exampleFormControlInput1">Hourly Rate</label>
                                        <input type="text" class="form-control @error('rate_per_hour') is-invalid @enderror" id="exampleFormControlInput11" name="rate_per_hour">
                                        @error('rate_per_hour')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleFormControlInput1" class="mt-2">Hourly rate currency code</label>
                                        <select class="js-example-basic-single custom-select" name="rate_currency">
                                            <option selected>AUD Australian Dollar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                      <button class="btn btn-success" type="submit">Save</button>
                  </div>
                </div>
            </div>
        @csrf
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2({
        theme: "bootstrap"
    });
    $("input[name$='status']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
</script>
@endpush