@extends('layouts.index')

@section('title')
X Pro - Add New Client
@endsection


@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/projects" class="breadcrumb-item">Project</a>
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
                <h5 class="card-title">Add Project</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>
            <form action="{{ route('postupdateprojects', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data"> 
                @csrf     
                <div id="individual" class="desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Project Name</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Project name" value="{{ $data->project_name }}"  name="project_name">
                                    @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Client</label>
                                    <select class="js-example-basic-single form-control" name="client_id" id="client_id">
                                        <option selected value="">Choose Client</option>
                                        @foreach($client as $value)
                                        <option value="{{ $value->id }}" data-company="{{ $value->business_name }}" data-address="{{ $value->street }}" @if($data->client_id == $value->id) selected @endif>{{ $value->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Status</label>
                                    <select class="js-example-basic-single form-control" name="status_information">
                                        <option selected value="1" @if($data->status_information == "1") selected @endif>Pending</option>
                                        <option value="2" @if($data->status_information == "2") selected @endif>Ongoing</option>
                                        <option value="3" @if($data->status_information == "3") selected @endif>Finished</option>
                                        <option value="4" @if($data->status_information == "4") selected @endif>Cancel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save Project</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Company Name</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Company Name" value="{{ $project_client->business_name }}" name="company_name" id="company_name">
                                    @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Address</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Address name" value="{{ $project_client->street }} " name="address_name" id="address_name">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
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

        $('#client_id').on('change', function () {
            let address = $(this).find(':selected').data("address");
            let company_name = $(this).find(':selected').data("company");
            $('#address_name').val(address);
            $('#company_name').val(company_name);
        });

    });
</script>
<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("dropdown1");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
<script>
    function myFunctionTwo() {
        var checkBox = document.getElementById("addShipping");
        var text = document.getElementById("Shipping");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
<script>
    function myFunctionThree() {
        var checkBox = document.getElementById("addShipping2");
        var text = document.getElementById("Shipping2");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
<script>
    tail.select('#select1', {
        search: true
    });
</script>
@endpush