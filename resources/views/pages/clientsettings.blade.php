@extends('layouts.index')

@section('title')
X Pro - Client Settings
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <!-- Client Settings -->
                        <div class="card shadow mb-4 ml-3" style="width: 525px;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Client Settings	</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check col-auto">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Disable client online access</label>
                                </div>
                            </div>
                            <div class="col-auto ml-2 mb-4">
                                <label for="">Client Type : </label><br>
                                <select class="custom-select" style="width: 400px;">
                                    <option selected value="1">Both</option>
                                    <option value="2">Business Only</option>
                                    <option value="3">Individual Only</option>
                                </select>
                            </div>
                        </div>
                        <!-- Client Extra Fields -->
                        <div class="card shadow mb-4 ml-3" style="width: 525px;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Client Extra Fields</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-check col-auto ml-4 mb-2 mr-5">
                                        <input type="checkbox" class="form-check-input" id="Check1">
                                        <label class="form-check-label" for="exampleCheck1">Photo</label>
                                    </div>
                                    <div class="form-check col-auto ml-5 mb-2">
                                        <input type="checkbox" class="form-check-input" id="Check2">
                                        <label class="form-check-label" for="exampleCheck1">Gender</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-auto ml-4 mb-2 mr-5">
                                        <input type="checkbox" class="form-check-input" id="Check3">
                                        <label class="form-check-label" for="exampleCheck1">Birth Date</label>
                                    </div>
                                    <div class="form-check col-auto ml-3 mb-2">
                                        <input type="checkbox" class="form-check-input" id="Check4">
                                        <label class="form-check-label" for="exampleCheck1">Map Location</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-auto ml-4 mb-2">
                                        <input type="checkbox" class="form-check-input" id="Check5">
                                        <label class="form-check-label" for="exampleCheck1">Opening Balance</label>
                                    </div>
                                </div>
                                <a href="#" class="fas fa-cog mt-2 ml-2"> Customize more fields</a>
                            </div>
                        </div>
                    </div>
                    <!-- Client Permission -->
                    <div class="card shadow mb-4 ml-1" style="width: 525px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Client Settings	</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check col-auto mt-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                <label class="form-check-label" for="exampleCheck1">View his profile</label>
                            </div>
                            <div class="form-check col-auto mt-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                <label class="form-check-label" for="exampleCheck1">Edit his profile</label>
                            </div> 
                            <div class="form-check col-auto mt-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                <label class="form-check-label" for="exampleCheck1">View & Pay Invoices</label>
                            </div>
                            <div class="form-check col-auto mt-3 mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                <label class="form-check-label" for="exampleCheck1">View Shared Notes / Attachments</label>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons -->

                    <a href="#" class="btn btn-success btn-icon-split col-auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="text">Save</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection