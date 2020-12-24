@extends('layouts.index')

@section('title')
X Pro - Add Work Orders
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Work Orders</h6>
                    <div class="table-responsive">
                        <div class="card-body">
                            <form action="{{ route('postworkorder') }}" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <p style="font-weight: bold">Title</p>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <p style="font-weight: bold">Start Date</p>
                                            <input type="datetime-local" class="form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate" id="picker">
                                            @error('startDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <p style="font-weight: bold">Order Number</p>
                                            <input type="text" class="form-control @error('work_number') is-invalid @enderror" id="work_number" name="orderNumber" readonly value="{{ $work_number }}">
                                            @error('orderNumber')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">End Date</p>
                                            <input type="datetime-local" class="form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate">
                                            {{-- <input type="time" class="form-control" name="timeendDate"> --}}
                                            @error('endDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <p style="font-weight: bold">Tags<span style="color: red">*</span></p>
                                        <input type="text" value="" id="tagging" class="form-control tokenfield-success" width="100%" data-role="tagsinput" placeholder="Add tags" />
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="tab_logic" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Client</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Tags</th>
                                                <th class="text-center">Hourly Rate</th>
                                                <th class="text-center">Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select id="select1" class="form-control form-control-select2" name="clients">
                                                        <option value="">Select Clients</option>
                                                        @foreach($showClient as $field)
                                                        <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="description" name="description" rows="1"></textarea>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-select2 @error('tag') is-invalid @enderror" id="tag" name="tag">
                                                    @error('tag')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="hourly_rate" placeholder="0.00">
                                                        <div class="input-group-prepend">
                                                            <select class="form-control form-control-select2" id="currency" name="currency">
                                                                <option value="0">AUD</option>
                                                                <option value="1">USD</option>
                                                                <option value="2">IDR</option>
                                                                <option value="3">JPY</option>
                                                            </select>
                                                        </div>
                                                        @error('budget')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="0.00">
                                                        <div class="input-group-prepend">
                                                            <select class="form-control form-control-select2" id="currency" name="currency">
                                                                <option value="0">AUD</option>
                                                                <option value="1">USD</option>
                                                                <option value="2">IDR</option>
                                                                <option value="3">JPY</option>
                                                            </select>
                                                        </div>
                                                        @error('budget')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <input type="checkbox" id="myCheckPriority"  onclick="myFunctionOne()">
                                <label for="Asign Staff"> Priority Level</label>
                                <div class="form-group" id="dropdown2" style="display:none">
                                    <select id="select1" class="js-example-basic-single form-control" name="staff">
                                        <option value="45">Select Priority Level</option>
                                        <option value="1">Urgent</option>
                                        <option value="2">High</option>
                                        <option value="3">Medium</option>
                                        <option value="4">Low</option>
                                    </select>
                                </div>

                                <br/><br/>
                                <input type="checkbox" id="myCheck"  onclick="myFunctionZero()">
                                <label for="Asign Staff"> Asign Staff</label>
                                <div class="form-group" id="dropdown1" style="display:none">
                                    <select id="select2" class="js-example-basic-single form-control" name="staff">
                                        <option value="45">Select Staff</option>
                                        @foreach($showStaff as $field)
                                        <option value="{{ $field -> id}}">{{ $field -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="submit" class="btn btn-lg btn-outline-primary btn-block" value="save" name="save" /> 
                                    </div>
                                    @csrf   
                            </form>
                            <div class="col-6">
                                <input type="submit" class="btn btn-lg btn-outline-secondary btn-block" value="saveDraft" name="save" />    
                            </div>
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

<script>
    $(document).ready(function () {
        $("input[name$='radioInput']").click(function () {
            var test = $(this).val();
            $("div.desc").hide();
            $("#" + test).show();
        });
    });
</script>
<script>
    $('#picker').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d',
        value: '2020-08-14',
        weeks: true
    })
</script>
<script>
    $(document).ready(function () {
        $("#cardClientDetails").hide();
        $("#showClientDetails").click(function (e) {
            e.preventDefault();
            $("#cardClientDetails").show();
            $(this).show();
        });
    });
</script>
<script>
    function myFunctionZero() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("dropdown1");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
    
    function myFunctionOne() {
        var checkBox = document.getElementById("myCheckPriority");
        var text = document.getElementById("dropdown2");
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
    tail.select('#select2', {
        search: true
    });
</script>
@endpush