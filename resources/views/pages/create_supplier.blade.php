@extends('layouts.index')

@section('title')
X Pro - Add Supplier
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <form action="{{ route('postsupplier') }}" method="post">
                    <div class="card shadow mb-4" id="cardClientDetails">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Supplier Details</h6>
                        </div>
                        <div class="card-body">
                            <div id="show-me">
                                <label for="exampleFormControlInput1">Business Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" name="business_name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class = "row">
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">First Name</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="first_name"> 
                                    </div>
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">Last Name</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="last_name"> 
                                    </div>
                                </div>
                                <br>
                                <div class = "row">
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">Telephone</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="telephone"> 
                                    </div>
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">Mobile</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="mobile_phone"> 
                                    </div>
                                </div>
                                <br>
                                <div class = "row">
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">Street Addres 1</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="address1"> 
                                    </div>
                                    <div class = "col-6">
                                        <label for="exampleFormControlInput1">Street Adress 2</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="address2"> 
                                    </div>
                                </div>
                                <br>
                                <div class = "row">
                                    <div class = "col-4">
                                        <label for="exampleFormControlInput1">City</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="city"> 
                                    </div>
                                    <div class = "col-4">
                                        <label for="exampleFormControlInput1">State</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="state"> 
                                    </div>
                                    <div class = "col-4">
                                        <label for="exampleFormControlInput1">Postal Code</label>
                                        <input type="text" class="form-control @error(' home_phone') is-invalid @enderror" id="exampleFormControlInput4" placeholder="" name="postal_code"> 
                                    </div>
                                </div>
                                <br>
                                <div class="form-row align-items-center mb-4">
                                    <label for="exampleFormControlInput1">Country</label>
                                    <select class="js-example-basic-single" name="country">
                                        <option selected>Select Country</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Malaysia">Malaysia </option>
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
                        <h6 class="m-0 font-weight-bold text-primary">Account Detail</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <div class="form-row align-items-center mb-4">
                                    <label for="exampleFormControlInput1">Currency</label>
                                    <select class="js-example-basic-single" name="currency">
                                        <option selected>Select currency</option>
                                        <option value="AUD">AUD</option>
                                    </select>
                                </div>
                                <div class="form-row align-items-center">
                                    <label for="exampleFormControlInput1">Opening balance</label>
                                    <input type="number" min="0" class="form-control" id="exampleFormControlInput11" name="opening_balance">
                                </div>
                                <br>
                                <div class="form-row align-items-center">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput11" name="email">
                                </div>
                                <br>
                                <div class="form-row align-items-center">
                                    <label for="exampleFormControlInput1">Notes</label>
                                    <textarea type="text-area" min="0" class="form-control" id="exampleFormControlInput11" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </div>
        @csrf
        </form>
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
@endpush