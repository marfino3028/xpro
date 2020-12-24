@extends('layouts.index')

@section('title')
X Pro - Account Settings
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success mb-2"><i class="fas fa-edit"></i> Change Password</button>
                                    <button type="submit" class="btn btn-success mb-2"><i class="fas fa-edit"></i> Change Email</button>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4" id="cardClientDetails">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Business Details</h6>
                                </div>
                                <div class="card-body">
                                    <div id="show-me">
                                        <label for="exampleFormControlInput1">Business Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="business_name"
                                               value="{{ $data->business_name }}" placeholder="Business name">
                                        <br>
                                        <label for="exampleFormControlInput1">Business Telephone</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput4" name="business_phone"
                                               value="{{ $data->business_phone }}" placeholder="Business telephone">
                                        <br>
                                        <label for="exampleFormControlInput1">Business Address</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput3" value="{{ $data->address }}"
                                               placeholder="Business address">
                                        <br>
                                        <label for="exampleFormControlInput1">City</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Address">
                                        <br>
                                        <label for="exampleFormControlInput1">State</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput5" placeholder="Province">
                                        <br>
                                        <label for="exampleFormControlInput1">Postal Code</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput5" placeholder="Province">
                                        <br>
                                        <div class="form-row align-items-center">
                                            <label for="exampleFormControlInput1">Country</label>
                                            <select class="js-example-basic-single form-control">
                                                <option selected>Select Country</option>
                                                <option value="1">Indonesia</option>
                                                <option value="2">Malaysia </option>
                                            </select>
                                        </div>
                                        <br>
                                        <label for="exampleFormControlInput1">ABN (Optional)</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput512" placeholder="">
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
                                    <div id="show-me">
                                        <div class="form-row align-items-center">
                                            <label for="exampleFormControlInput1">Currency: </label>
                                            <select class="js-example-basic-single form-control">
                                                <option selected>AUD Australian Dollar</option>
                                                <option value="1">BDT Taka</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-row align-items-center">
                                            <label for="exampleFormControlInput1">Time Zone: </label>
                                            <select class="js-example-basic-single form-control">
                                                <option selected>(UTC+ 10:00) Sydney)</option>
                                                <option value="1">(UTC+ 10:00) Vladivostok)</option>
                                                <option value="2">(UTC+ 10:00) Hanoi)</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-row align-items-center">
                                            <label for="exampleFormControlInput1">Date Format </label>
                                            <select class="js-example-basic-single form-control">
                                                <option selected>dd/mm/yyyy (27/03/2019)</option>
                                                <option selected value="1">dd-mm-yyyy (27-03-2019)</option>
                                                <option selected value="2">dd.mm.yyyy (27.03.2019)</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-row align-items-center">
                                            <label for="exampleFormControlInput1">You Sell</label>
                                            <select class="js-example-basic-single form-control">
                                                <option selected>Services & Products</option>
                                                <option value="1">Products Only</option>
                                                <option value="2">Services Obly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            theme: "bootstrap"
        });
        $("input[name$='status']").click(function () {
            var test = $(this).val();
            $("div.desc").hide();
            $("#" + test).show();
        });
    });
</script>
@endpush

