@extends('masters/index_1')

@section('title')
    X Pro - Client Payment Add
@endsection

@section('css')
  <!-- perbaikan layout -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('custom/css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('custom/admin-lte/plugin/iCheck/square/blue.css') }}">  
@endsection

@section('content')
<div class="row">
  <div class="col-lg-6 mb-4">
    <div class="card shadow mb-4" id="cardClientDetails">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
      </div>
      <div class="table-responsive">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Invoice Number</label>
              <select class="js-example-basic-single form-control" name="invoice_number" id="invoice_number">
                <option selected value="">INV-0001</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="type_template" class="form-control-label text-primary font-weight-bold">Amount</label> 
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div> 
                <input data-name="received_by" placeholder="Received By" required="required" name="received_by" readonly type="text" value="1,230.00" id="received_by" class="form-control">
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4">
    <div class="card shadow mb-4" id="cardClientDetails">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Account</h6>
      </div>
      <div class="table-responsive">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-12 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Payment Method </label>
              <select class="form-control" name="payment_method" id="payment_method">
                <option selected>Choose Payment Method</option>
                <option value="Cash">Cash</option>
                <option value="Bank_Transfer">Bank Transfer</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CASH -->
  <div class="col-lg-12 mb-4 drop-down-show-hide" id="Cash">
    <div class="card shadow mb-4" id="cardClientDetails">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Invoice - Cash</h6>
      </div>
      <div class="table-responsive">
        <div class="card-body">
          <div class="row">
          <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Received By</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-font"></i>
                  </span>
                </div> 
                <input data-name="received_by" placeholder="Received By" required="required" name="received_by" type="text" value="" id="received_by" class="form-control">
              </div>
            </div>
            <div class="form-group col-md-6">
               {{-- empty --}}
            </div>
            <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Date Received</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div> 
                <input data-name="date_received" placeholder="Date Received" required="required" name="date_received" type="datetime-local" value="" id="date_received" class="form-control">
              </div>
            </div>
            <div class="form-group col-md-6">
            {{-- empty --}}
            </div>
            <div class="form-group col-md-3 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Total Amount</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-usd"></i>
                  </span>
                </div> 
                <input data-name="received_by" placeholder="Received By" required="required" name="received_by" readonly type="text" value="1,230.00" id="received_by" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="/client_payment" class="btn btn-icon btn-outline-danger header-button-top">
                <span class="btn-inner-icon"><i class="fas fa-times"></i></span>
                <span class="btn-inner-text"><b>Cancel</b></span>
            </a>
            <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                <i class="fas fa-check"></i>
                <span class="text"><b>Confirm</b></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BANK TRANSFER -->
  <div class="col-lg-12 mb-4 drop-down-show-hide" id="Bank_Transfer">
    <div class="card shadow mb-4" id="cardClientDetails">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Invoice - Bank Transfer</h6>
      </div>
      <div class="table-responsive">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6 required">
              <label for="type_template" class="form-control-label text-primary font-weight-bold">Category</label> 
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-credit-card"></i>
                  </span>
                </div> 
                <select class="js-example-basic-single form-control" name="category" id="category">
                  <option selected>Choose Category</option>
                  <option value="Master Card">Master Card</option>
                  <option value="Visa">Visa</option>
                  <option value="Poli">Poli</option>
                  <option value="Paypal">Paypal</option>
                </select> 
              </div>
            </div>
            <div class="form-group col-md-6">
               {{-- empty --}}
            </div>
            <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Card Number</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-credit-card"></i>
                  </span>
                </div> 
                <input data-name="card_number" placeholder="Card Number" required="required" name="card_number" type="number" value="" id="card_number" class="form-control">
              </div>
            </div>
            <div class="form-group col-md-6">
               {{-- empty --}}
            </div>
            <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Name on Card</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-font"></i>
                  </span>
                </div> 
                <input data-name="name_on_card" placeholder="Name on Card" required="required" name="name_on_card" type="text" value="" id="name_on_card" class="form-control">
              </div>
            </div>
            <div class="form-group col-md-6">
            {{-- empty --}}
            </div>
            <div class="form-group col-md-6 required">
              <label for="exampleFormControlInput1" class="text-primary font-weight-bold">Expiration Date</label>
              <div class="input-group input-group-merge ">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div> 
                <input class="form-control" type="month" value="" id="example-month-input"> &nbsp;
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-key"></i>
                  </span>
                </div> 
                <input class="form-control" type="number" placeholder="Enter CVV" value="" >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="/client_payment" class="btn btn-icon btn-outline-danger header-button-top">
                <span class="btn-inner-icon"><i class="fas fa-times"></i></span>
                <span class="btn-inner-text"><b>Cancel</b></span>
            </a>
            <button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
                <i class="fas fa-check"></i>
                <span class="text"><b>Confirm</b></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <!-- Page level plugins -->
  <script src="{{ asset('js/dropdown-search.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
  $('.drop-down-show-hide').hide();
  $('#payment_method').change(function(){
    $(this).find("option").each(function(){
      $('#' + this.value).hide();
      });
    $('#' + this.value).show();
  });
  </script>

@endsection