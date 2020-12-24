@extends('layouts.index')

@section('title')
X Pro - Add New Client
@endsection


@section('content')
<div class="row">
@if (session('update'))
  <div class="alert alert-success">
      {{ session('update') }}
  </div>
@endif 
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4" id="cardClientDetails">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Clients</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('updateclient', ['id' => $update[0]->id ]) }}" method="post">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <h2>Client Details</h2><br>
              <h5>Type :</h5><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="individual" checked="checked">
                <label class="form-check-label" for="inlineRadio1">Individual</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="business">
                <label class="form-check-label" for="inlineRadio2">Business</label>
              </div>
            </div>
          </div>
          <!-- Individual --><br>
          <div class="col-lg-6">
            <div id="individual" class="desc">
              <label for="exampleFormControlInput1">Full Name</label>
              <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Your name" name="full_name" value="{{ $update[0]->full_name }}">
              @error('full_name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput2" placeholder="name@example.com" name="email" value="{{ $update[0]->email }}">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Street</label>
              <textarea type="text" class="form-control @error('street') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Address" name="street">{{ $update[0]->street }}</textarea>
              @error('street')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">City</label>
              <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Address" name="city" value="{{ $update[0]->city }}">
              @error('city')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror 
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Province</label>
              <input type="text" class="form-control @error('province') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="province" value="{{ $update[0]->province }}">
              @error('province')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Telephone</label>
              <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Telephone" name="telephone" value="{{ $update[0]->telephone }}"> 
              @error('telephone')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Mobile</label>
              <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Mobile" name="mobile" value="{{ $update[0]->mobile }}"> 
              @error('mobile')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <div class="form-row align-items-center">
                <label for="exampleFormControlInput1">Country</label>
                <select class="select-dropdown custom-select" name="country">
                  <option selected value="Indonesia">Indonesia</option>
                  <option value="Malaysia">Malaysia </option>
                </select>
              </div>
              <br>
              <label> Logo : </label><br>
              <input type="file" name="logo_clients" value="{{asset('uploads/'.$update[0] -> logo_clients)}}"> 
              <br>
              <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="addShipping" onclick="myFunctionTwo()">
                <label class="form-check-label" for="exampleCheck1">Add Secondary Address</label>
              </div>
              <!-- Add Secondary Address -->
              <br>
              <div id="Shipping" class="desc" style="display:none" >
                <label for="exampleFormControlInput1">Street address 1</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Address 1" name="secondary_address1" value="{{ $update[0]->secondary_address1 }}">
                <br>
                <label for="exampleFormControlInput1">Street address 2</label>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Address 2" name="secondary_address2" value="secondary_address2">
                <br>
                <label for="exampleFormControlInput1">City</label>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Your City" name="secondary_city" value="secondary_city">
                <br>
                <label for="exampleFormControlInput1">State</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Your State" name="secondary_state" value="secondary_state"> 
                <br>
                <label for="exampleFormControlInput1">Postal/Zip Code</label>
                <input type="text" class="form-control" id="exampleFormControlInput5" placeholder="Province" name="secondary_postal" value="secondary_postal">
                <br>
                <div class="form-row align-items-center">
                  <label for="exampleFormControlInput1">Country</label>
                  <select class="custom-select" name="country">
                    <option value="Indonesia">Indonesia</option>
                    <option value="Malaysia">Malaysia </option>
                  </select>
                </div>
                <br>
              </div>
              <br>
              <div class="col-auto">
                <button type="submit" class="btn btn-success">Save Client Individual</button>
                @csrf
              </form>
              </div>
            </div>
          </div>
          

          <!-- Business -->
          <form action="{{ route('postaddclients') }}" method="post">
          <div class="col-lg-6">
            <div id="business" class="desc" style="display:none" >
              <label for="exampleFormControlInput1">Business name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Business name" name="business_name">
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Your name" name="full_name">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput2" placeholder="name@example.com" name="email">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Street</label>
              <textarea type="text" class="form-control @error('street') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Address" name="street"></textarea>
              @error('street')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">City</label>
              <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Address" name="city">
              @error('city')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror 
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Province</label>
              <input type="text" class="form-control @error('province') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Province" name="province">
              @error('province')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Telephone</label>
              <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Telephone" name="telephone"> 
              @error('telephone')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <label for="exampleFormControlInput1">Mobile</label>
              <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="exampleFormControlInput4" placeholder="Mobile" name="mobile"> 
              @error('mobile')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <br>
              <!--  -->
              <div class="form-row align-items-center">
                <label for="exampleFormControlInput1">County</label>
                <select class="custom-select" name="country">
                  <option selected>Country</option>
                  <option value="1">Indonesia</option>
                  <option value="2">Malaysia </option>
                </select>
              </div><br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="addShipping2" onclick="myFunctionThree()">
                <label class="form-check-label" for="exampleCheck1">Add Shipping Address</label>
              </div>
              <!-- Add Secondary Address -->
              <br>
              <div id="Shipping2" class="desc" style="display:none" >
                <label for="exampleFormControlInput1">Street address 1</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Address 1">
                <br>
                <label for="exampleFormControlInput1">Street address 2</label>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Address 2">
                <br>
                <label for="exampleFormControlInput1">City</label>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Your City">
                <br>
                <label for="exampleFormControlInput1">State</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Your State"> 
                <br>
                <label for="exampleFormControlInput1">Postal/Zip Code</label>
                <input type="text" class="form-control" id="exampleFormControlInput5" placeholder="Province">
                <br>
                <div class="form-row align-items-center">
                  <label for="exampleFormControlInput1">Country</label>
                  <select class="custom-select" name="country">
                    <option selected>Country</option>
                    <option value="1">Indonesia</option>
                    <option value="2">Malaysia </option>
                  </select>
                </div>
              </div>
              <br>
              <div class="col-auto">
                <button type="submit" class="btn btn-success">Save Client Business</button>
                @csrf
              </form>
              </div>
            </div>
            
          </div>


        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4" style="display:none">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Account Details</h6>
        </div>
        <div class="card-body">

          <div class="form-row align-items-center">
           <div class="col-auto">
             <br>
             <label for="exampleFormControlInput1">Code Number</label>
             <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
             <br>
             <div class="form-row align-items-center">
              <label for="exampleFormControlInput1">Invoicing Method</label>
              <select class="custom-select">
                <option selected>Send Via Email</option>
                <option value="1">Print (Offline)</option>
              </select>
            </div>
            <br>
            <div class="form-row align-items-center">
              <label for="exampleFormControlInput1">Currency</label>
              <select class="custom-select">
                <option selected>Select Currency</option>
                <option value="1">AUD Australian Dollar</option>
                <option value="2">AFA Afghani </option>
              </select>
            </div>
            <br>
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="">
            <br>
            <label for="exampleFormControlInput1">Category</label>

            <div class="input-group">
              <input type="text" class="form-control" aria-label="Text input with dropdown button">
              <div class="input-group-append">

                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
            </div>
            <br>
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
            <br>
            <div class="form-row align-items-center">
              <label for="exampleFormControlInput1">Price Group</label>
              <select class="custom-select">
                <option selected>Select Price Group</option>
                <option value="1">Coming</option>
                <option value="2">Test Group Price</option>
              </select>
            </div>
            <br>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Send online login details to client</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@push('js')

<script>
  $(document).ready(function() {
    $("input[name$='status']").click(function() {
      var test = $(this).val();
      $("div.desc").hide();
      $("#" + test).show();
    });
  });
</script>
<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("dropdown1");
    if (checkBox.checked == true){
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
    if (checkBox.checked == true){
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
    if (checkBox.checked == true){
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