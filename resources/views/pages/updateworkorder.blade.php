@extends('layouts.index')

@section('title')
X Pro - Edit Work Orders
@endsection


@section('content')
<br/>
<!-- Circle Buttons -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Work Orders</h6>
                  <div class="card-body">
                    <form action="{{ route('updateworkorder', ['id' => $update[0]->id ]) }}" method="POST">

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <p style="font-weight: bold">Title</p>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $update[0]->title }}">
                              @error('title')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>


                          <div class="form-group">
                            <p style="font-weight: bold">Start Date</p>
                            <input type="date" class="form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate" value="{{ $update[0]->start_date }}">
                            @error('startDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">

                          <div class="form-group">
                            <p style="font-weight: bold">Order Number</p>
                            <input type="number" class="form-control @error('orderNumber') is-invalid @enderror" id="orderNumber" name="orderNumber" value="{{ $update[0]->order_number }}">
                            @error('orderNumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <p style="font-weight: bold">End Date</p>
                            <input type="date" class="form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate" value="{{ $update[0]->end_date }}">
                            @error('endDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <p style="font-weight: bold">Description</p>
                        <textarea class="form-control" id="description" name="description">{{ $update[0]->description }}</textarea>
                      </div>
                      <div class="form-group">
                        <p style="font-weight: bold">Tags</p>
                        <input type="text" class="form-control tokenfield-success" @error('tag') is-invalid @enderror" id="tag" name="tag" value="{{ $update[0]->tags }}">
                        @error('tag')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="form-group">
                        <p style="font-weight: bold">Select Client</p><br>
                          <select id="select1" class="js-example-basic-single form-control" name="clients">
                            <option value="">Select Clients</option>
                            @foreach($showClient as $field)
                            <option value="{{ $field -> id}}" {{$field ->id == $update[0]->id_clients ? 'selected' : ''}}>{{ $field -> full_name}}</option>
                            @endforeach
                          </select>
                        {{--<a href="/add_new_client" class="btn btn-success mb-4 ml-3">New</a>--}}
                      </div>
                      <div class="form-group">
                        <p style="font-weight: bold">Budget</p>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="0.00" value="{{ $update[0]->budget }}">
                            @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          <div class="input-group-prepend">
                            <select class="select-dropdown custom-select" id="currency" name="currency">
                              <option value="0">AUD</option>
                              <option value="1">USD</option>
                              <option value="2">IDR</option>
                              <option value="3">JPY</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <input type="checkbox" id="myCheck"  onclick="myFunction()">
                      <label for="Asign Staff"> Asign Staff</label>
                      <div class="form-group" id="dropdown1" style="display:none">
                        <label for="staff">Select Staff</label><br>
                        <select id="select1" class="custom-select" name="staff">
                          <option value="">Select Staff</option>
                          @foreach($showStaff as $field)
                          <option value="{{ $field -> id}}" {{$field ->id == $update[0]->id_staff ? 'selected' : ''}}>{{ $field -> name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <input type="submit" class="btn btn-primary btn-block" value="Save"/> 
                        </div>
                        @csrf 
                      </form>
                      <div class="col-6">
                        <input type="submit" class="btn btn-secondary btn-block" value="Save as draft"/>    
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

  $(document).ready(function() {
    $("input[name$='radioInput']").click(function() {
      var test = $(this).val();
      $("div.desc").hide();
      $("#" + test).show();
    });
  });

  $(document).ready(function(){
    $("#cardClientDetails").hide();
    $("#showClientDetails").click(function(e){
      e.preventDefault();
      $("#cardClientDetails").show();
      $(this).show();
    });
  });


  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("dropdown1");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
     text.style.display = "none";
   }
 }


  function myFunctionTwo() {
    var checkBox = document.getElementById("addShipping");
    var text = document.getElementById("Shipping");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
     text.style.display = "none";
   }
 }


  function myFunctionThree() {
    var checkBox = document.getElementById("addShipping2");
    var text = document.getElementById("Shipping2");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
     text.style.display = "none";
   }
 }

  tail.select('#select1', {
    search: true
  });
</script>
@endpush