@extends('layouts.index')

@section('title')
X Pro - Edit Staff Member
@endsection



@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/project_asset_list" class="breadcrumb-item">Project Asset List</a>
                    <span class="breadcrumb-item active">Archive</span>
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
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Manage Purchase Order</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <!-- Project Card Example -->
                    <form action="{{ route('updateDetailStaffMembers', ['id' => $update[0]->id ]) }}" method="post">
                        <div class="card shadow mb-4" id="cardClientDetails">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Staff Member Details</h6>
                            </div>
                            <div class="card-body">
                                <div id="show-me">
                                    <label for="exampleFormControlInput1">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First name" name="name" value="{{ $update[0]->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">Home Phone</label>
                                    <input type="text" class="form-control @error('home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Telephone" name="home_phone" value="{{ $update[0]->home_phone }}"> 
                                    @error('home_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">Mobile</label>
                                    <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Mobile" name="mobile_phone" value="{{ $update[0]->mobile_phone }}"> 
                                    @error('mobile_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">Full Address</label>
                                    <input type="text" class="form-control @error('full_address') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Address" name="full_address" value="{{ $update[0]->full_address }}">
                                    @error('full_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Address" name="city" value="{{ $update[0]->city }}"> 
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">State</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="state" value="{{ $update[0]->state }}">
                                    @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="exampleFormControlInput1">Postal Code</label>
                                    <input type="number" class="form-control @error('postal_code') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="postal_code" value="{{ $update[0]->postal_code }}">
                                    @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="form-row align-items-center">
                                        <label for="exampleFormControlInput1">Country</label>
                                        <select class="custom-select @error('country') is-invalid @enderror" name="country">
                                            <option selected value="{{ $update[0]->country }}">Select Country</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Australian">Australian </option>
                                        </select>
                                        @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                <div class="col-auto">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput11" placeholder="Email" name="email" value="{{ $update[0]->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="form-row align-items-center">
                                        <label for="exampleFormControlInput1">Notes</label>
                                        <textarea type="text-area" class="form-control" id="exampleFormControlInput11" name="notes" value="{{ $update[0]->notes }}"></textarea>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-row align-items-center ml-2">
                                            <label for="exampleFormControlInput1">Role</label>
                                            <select class="custom-select" name="role_id">
                                                <option selected value="{{ $update[0]->role_id }}">Select Role</option>
                                                <option selected value="2">Manager</option>
                                                <option selected value="3">Staff</option>
                                            </select>
                                            @error('role_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input @error('status') is-invalid @enderror" id="customRadioInline1" name="status" value="1">
                                                <label class="custom-control-label" for="customRadioInline1">Active</label>
                                                @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror         
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
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
                                        <input type="text" class="form-control @error('rate_per_hour') is-invalid @enderror" id="exampleFormControlInput11" name="rate_per_hour" value="{{ $update[0]->rate_per_hour }}">
                                        @error('rate_per_hour')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleFormControlInput1" class="mt-2">Hourly rate currency code</label>
                                        <select class="custom-select" name="rate_currency">
                                            <option selected value="{{ $update[0]->rate_currency }}">AUD Australian Dollar</option>
                                        </select>
                                        @error('rate_currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
        </div>
        
        @csrf
        </form>
    </div>
</div>
@endsection