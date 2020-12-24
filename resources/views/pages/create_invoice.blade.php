  @extends('masters/index_1')

  @section('title')
    X Pro - Create Inovice
  @endsection

  @section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
  @endsection

  @section('content')
    @if (session('add'))
    <div class="alert alert-success">
      {{ session('add') }}
    </div>
    @endif
    <br>
    <!-- Circle Buttons -->
    <!-- <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New Invoices</h6>
      </div>
      <div class="card-body">
        <div class="col-auto">
          <div class="dropdown">
            <button type="submit" class="btn btn-primary mb-2 dropdown-toggle" data-toggle="dropdown"><i class="fas fa-chart-pie"></i> Invoice Layout</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Default Invoice Layout</a>
              <a class="dropdown-item" href="#">Default Timesheet Layout</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="fas fa-question-circle"></i>
      <strong>Information!</strong>
      <br>
      <p>Create invoices using the many features on this page. Using the bottom tabs, you can customise many aspects of the invoice, and tailor many areas to create a virtual 'content' template for future invoices. If you save the completed - or partly completed invoice - as a 'pre-filled invoice template' you can use it again and again for any similar invoice requirement. You can save as many different versions as you wish, naming them as required, and they will be available (see the dropdown top right) when you create any future invoices. The 'Invoice notes' section allows you to add further explanation or description, or special payment details and so on, and is shown on the invoice sent to the client.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('postData') }}" method="post">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <select class="custom-select">
                    <option selected>Method</option>
                    <option value="1">Send via Email</option>
                    <option value="2">Print (Offline)</option>
                  </select>
                </div>
                <div class="col-auto mt-1">
                  <select class="select-dropdown custom-select" id="select1" name="id_clients">
                    <option selected="">Select Clients</option>
                    @foreach($showClient as $field)
                    <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-auto mt-3" style="margin-left: 10rem;">
                  <button id="showClientDetails" class="btn btn-success mr-2">New</button>
                  <button id="cancelClientDetails" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
              <br>
            </div>
          </div>
          <!-- card clients -->
          <div class="card shadow mb-4" id="cardClientDetails">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Client Details</h6>
            </div>
            <div class="card-body">

              <div class="form-row align-items-center">
                <div class="col-auto  ">
                  <label for="">Type</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioInput" id="inlineRadio1" value="individual" checked="checked">
                    <label class="form-check-label" for="inlineRadio1">Individual</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioInput" id="inlineRadio2" value="business">
                    <label class="form-check-label" for="inlineRadio2">Business</label>
                  </div>
                  <br>
                  <br>  
                  <!-- individual -->
                  <div id="individual" class="desc">
                    <label for="y_name">Full Name</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="y_name" placeholder="Your name" name="full_name">
                    @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <label for="y_email">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="y_email" placeholder="name@example.com" name="email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <label for="y_street">Street</label>
                    <textarea type="text" class="form-control @error('street') is-invalid @enderror" id="y_street" placeholder="Address" name="street"></textarea>
                    @error('street')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <label for="y_address">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="y_address" placeholder="Address" name="city">
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                    <br>
                    <!--  -->
                    <label for="y_province">Province</label>
                    <input type="text" class="form-control @error('province') is-invalid @enderror" id="y_province" placeholder="Province" name="province">
                    @error('province')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <label for="y_telephone">Telephone</label>
                    <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="y_telephone" placeholder="Telephone" name="telephone"> 
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <label for="y_mobile">Mobile</label>
                    <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="y_mobile" placeholder="Mobile" name="mobile"> 
                    @error('mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <!--  -->
                    <div class="form-row align-items-center">
                      <label for="y_country">Country</label>
                      <select class="select-dropdown custom-select" name="country" id="y_country">
                        <option selected value="Indonesia">Indonesia</option>
                        <option value="Australia">Australia </option>
                      </select>
                    </div>
                    <br>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="addShipping" onclick="secondaryAddress()">
                      <label class="form-check-label" for="exampleCheck1">Add Secondary Address</label>
                    </div>
                    <!-- Add Secondary Address -->
                    <br>
                    <div id="Shipping" class="desc" style="display:none" >
                      <label for="y_address1">Street address 1</label>
                      <input type="text" class="form-control" id="y_address1" placeholder="Address 1">
                      <br>
                      <label for="y_address2">Street address 2</label>
                      <input type="text" class="form-control" id="y_address2" placeholder="Address 2">
                      <br>
                      <label for="z_city">City</label>
                      <input type="text" class="form-control" id="z_city" placeholder="Your City">
                      <br>
                      <label for="z_state">State</label>
                      <input type="text" class="form-control" id="z_state" placeholder="Your State"> 
                      <br>
                      <label for="z_province">Postal/Zip Code</label>
                      <input type="text" class="form-control" id="z_province" placeholder="Province">
                      <br>
                      <div class="form-row align-items-center">
                        <label for="z_country">Country</label>
                        <select class="custom-select" name="country" id="z_country">
                          <option selected>Country</option>
                          <option value="1">Indonesia</option>
                          <option value="2">Malaysia </option>
                        </select>
                      </div>
                      <br>
                    </div>
                    <br>
                    <div class="col-auto">
                      <input type="submit" class="btn btn-success" value="SaveIndividual" name="save">
                    </div>
                  </div>
                  <!-- Business -->
                  <div class="col-auto">
                    <div id="business" class="desc" style="display:none" >
                      <label for="b_name">Business name</label>
                      <input type="text" class="form-control" id="b_name" placeholder="Business name" name="business_name">
                      <br>
                      <!--  -->
                      <label for="b_fullname">Full Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="b_fullname" placeholder="Your name" name="full_name">
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <label for="b_email">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="b_email" placeholder="name@example.com" name="email">
                      @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <label for="b_street">Street</label>
                      <textarea type="text" class="form-control @error('street') is-invalid @enderror" id="b_street" placeholder="Address" name="street"></textarea>
                      @error('street')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <label for="b_city">City</label>
                      <input type="text" class="form-control @error('city') is-invalid @enderror" id="b_city" placeholder="Address" name="city">
                      @error('city')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror 
                      <br>
                      <!--  -->
                      <label for="b_province">Province</label>
                      <input type="text" class="form-control @error('province') is-invalid @enderror" id="b_province" placeholder="Province" name="province">
                      @error('province')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <label for="b_telephone">Telephone</label>
                      <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="b_telephone" placeholder="Telephone" name="telephone"> 
                      @error('telephone')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <label for="b_mobile">Mobile</label>
                      <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="b_mobile" placeholder="Mobile" name="mobile"> 
                      @error('mobile')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <br>
                      <!--  -->
                      <div class="form-row align-items-center">
                        <label for="b_country">County</label>
                        <select class="custom-select" name="country" id="b_country">
                          <option selected>Country</option>
                          <option value="1">Indonesia</option>
                          <option value="2">Malaysia </option>
                        </select>
                      </div><br>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="addShipping2" onclick="shippingAddress()">
                        <label class="form-check-label" for="exampleCheck1">Add Shipping Address</label>
                      </div>
                      <div id="Shipping2" class="desc" style="display:none" >
                        <label for="c_address1">Street address 1</label>
                        <input type="email" class="form-control" id="c_address1" placeholder="Address 1">
                        <br>
                        <label for="c_address2">Street address 2</label>
                        <input type="text" class="form-control" id="c_address2" placeholder="Address 2">
                        <br>
                        <label for="c_citu">City</label>
                        <input type="text" class="form-control" id="c_citu" placeholder="Your City">
                        <br>
                        <label for="c_state">State</label>
                        <input type="text" class="form-control" id="c_state" placeholder="Your State"> 
                        <br>
                        <label for="c_province">Postal/Zip Code</label>
                        <input type="text" class="form-control" id="c_province" placeholder="Province">
                        <br>
                        <div class="form-row align-items-center">
                          <label for="cs_province">Country</label>
                          <select class="custom-select" name="country" id="cs_province">
                            <option selected>Country</option>
                            <option value="1">Indonesia</option>
                            <option value="2">Malaysia </option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <input type="submit" class="btn btn-success" value="SaveBusiness" name="save">
                    </div>
                    <!-- Add Secondary Address -->
                    <br>
                    <!-- akhir business -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- akhir card clients -->
        <div class="col-lg-6 mb-4">



          <!-- Illustrations -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invoice Details</h6>
            </div>
            <div class="card-body">

              <div class="form-row align-items-center">
                <div class="col-7">
                  <label for="exampleFormControlInput1">Invoice Date</label>
                  <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="invoice_date">
                  <br>
                  <label for="exampleFormControlInput1">Issue Date</label>
                  <input type="date" class="form-control" id="exampleFormControlInput3" placeholder="" name="issue_date">
                  <br>
                  <label for="exampleFormControlInput1">Payment Terms</label>
                <div class="input-group">
                  <input type="number" min="0" max="60" class="form-control" placeholder="" aria-label="" aria-describedby="" name="payment_terms">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Days</span>
                  </div>
                </div>
                <br>
              </div>
              <!-- akhir form clients -->
            </div>
          </div>


      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-12 mb-4" >
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">More Options</h6>
        </div>
        <div class="card-body">
          <button id="showMoreOptions" class="btn btn-success">More Options</button>
        </div>

        <div class="card-body" id="cardMoreOptions">
          <!-- Nav tabs -->

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#menu1">Discount Deposit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu2">Shipping Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#menu3">Attach Documents</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#menu4">Automatic Reminders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#menu5">Terms & Conditions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#menu6">Sales Person</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="menu1" class=" tab-pane active"><br>
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="x_discount">Discount</label>
                  <input type="number" class="form-control" id="x_discount" placeholder="Invoice Number">
                </div>
                <div class="col-auto">
                  <select class="custom-select">
                    <option selected>Any Status</option>
                    <option value="1">Percentage</option>
                    <option value="2">Amount</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="x_deposit">Deposit</label>
                  <input type="number" class="form-control" id="x_deposit" placeholder="Invoice Number">
                </div>
                <div class="col-auto">
                  <select class="custom-select">
                    <option selected>Amount</option>
                    <option value="1">Percentage</option>
                    <option value="2">Amount</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Already Paid</label>
              </div>
            </div>
            <div id="menu2" class=" tab-pane fade"><br>
              <div class="form-row align-items-center">

                <div class="col-auto">
                  <select class="custom-select">
                    <option selected>Any Status</option>
                    <option value="1">Percentage</option>
                    <option value="2">Amount</option>
                  </select>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="xs_discount">Discount</label>
                  <input type="number" class="form-control" id="xs_discount" placeholder="Invoice Number">
                </div>
              </div>
            </div>
            <div id="menu3" class=" tab-pane fade"><br>
              <h3>Menu 2</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu4" class=" tab-pane fade"><br>
              <h3>Menu 2</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu5" class=" tab-pane fade"><br>
              <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3" role="alert">
                <i class="fas fa-question-circle"></i>
                <strong>Information!</strong>
                <br>
                <p>No terms & conditions have been added. Please <a href="">add terms & conditions</a></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>  
            </div>
            <div id="menu6" class=" tab-pane fade"><br>
             <div class="form-row align-items-center">
               <div class="col-auto">
                <select class="custom-select">
                  <option selected>Staff</option>
                  <option value="1">Name Staff</option>
                  <option value="2">Name Staff #2</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="col-lg-12 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Table Price</h6>
    </div>

    <div class="card-body">
      <div class="row clearfix">
       <div class="col-md-12 table-responsive">
         <table class="table table-responsive table-bordered table-hover table-sortable" id="tab_logic">
          <thead>
           <tr >
            <th class="text-center">
             Item
           </th>

           <th class="text-center">
             Description
           </th>

           <th class="text-center" width="200">
             Unit Price
           </th>

           <th class="text-center">
             Quantity
           </th>

           <th class="text-center" width="200">
             Subtotal
           </th>

           <th class="text-center" width="150">
              Tax
            </th>

           <th class="text-center" width="200">
             Total
           </th>
           <th class="text-center">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
       <tr id='addr0' data-id="0" class="hidden">

        <td data-name="tes" class="select-product">
          <select class="select-dropdown custom-select" id="selectItem">
            <option selected="">Select Product</option>
            @foreach($showProduct as $field)
              <option value="{{ $field -> id}}|{{ $field-> description}}|{{ $field-> price}}">{{ $field -> name}}</option>
            @endforeach
          </select>
        </td>

        <input type="text" name="id_product" style="display: none;" id="idProduct">
        <td data-name="desc">
          <input type="text" name="desc0" placeholder="-" class="form-control" id="description" readonly="readonly">
        </td>

        <td data-name="unitprice">
          <input type="number" name='unitprice'  placeholder='0' class="input form-control" id="unitprice" readonly="readonly" />
        </td>

        <td data-name="qty">
          <input type="number" name='quantity' placeholder='Quantity' class="input form-control" id="qty" />
        </td>

        <td data-name="subtotal">
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" placeholder="0.00" name='subtotal' class="form-control" id="subtotal" readonly/>
          </div>
        </td>

        <td data-name="sel">
          <select name="tax" class="form-control" id="selecttax">
            @foreach($showTax as $field)
            <option value="{{ $field -> id}}|{{ $field-> name}}|{{ $field-> value}}" selected="">{{$field->name}}({{$field->value}}%)</option>
            @endforeach
            <input type="text" name="idTax" style="display: none;" id="idTax">
          </select>
        </td>

        <td data-name="total">
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" placeholder="0.00" name='Total' class="form-control" id="Total" readonly/>
          </div>
        </td>
        <td data-name="del">
          <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-6">
      <a id="add_row" class="btn btn-primary float-left" style="color: white">Add New Item</a>
    </div>
    <div class="col-md-6">
      <label for="Total">Total</label>
      <div class="input-group">
        <div class="input-group-append">
          <span class="input-group-text">$</span>
        </div>
        <input type="number" placeholder="0.00" name='lastTotal' class="form-control" id="lastTotal" readonly/>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-12 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Notes & Terms</h6>
    </div>

    <div class="card-body">
      <div id="editor">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
      </div>
      <input type="hidden" name="editorText">
      <br>



      <div class="form-row align-items-center">

        <div class="col-auto">
          <div class="dropdown">
            <button type="submit" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fas fa-eye"></i> Preview</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Web Preview</a>
              <a class="dropdown-item" href="#">PDF Preview</a>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <button type="submit" class="btn btn-secondary">Save as Draft</button>
        </div>

        <div class="col-auto">
          <div class="dropdown">
            <button type="submit" class="btn btn-success" value="SaveInvoice" name="save"><i class="fas fa-checklist"></i> Save & Don't email</button>
            @csrf
          </form>
            <!-- <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Save and Send Email</a>
              <a class="dropdown-item" href="#">Send With Revised Email</a>
            </div> -->
          </div>
        </div>

      </div>
    </div>



  @endsection

  @section('js')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
      var quill = new Quill('#editor', {
        theme: 'snow'
      });
      var editor_content = quill.container.innerHTML;
    </script>


    <!-- Page level plugins -->
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables-select.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!-- Tab w3s -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/tail.select-full.min.js') }}"></script>
    
    <script>
      $(function() {
        // var tax_id = parseFloat($('#idTax').val().split('|')[0]);
        var tax_values = parseFloat($('#selecttax').val().split('|')[2]);
        $('#selectItem').on('change', function() {
          var str           = this.value;
          var tes           = str.split("|");
          var id            = tes[0];
          var description   = tes[1];
          var price         = tes[2];
          
          $('#description').val(description);
          $('#unitprice').val(price);
          $('#idProduct').val(id);
          // console.log(tax_id);
          calculateData();
        });

        $('#selecttax').on('change',function() {
          var taxData   = this.value.split("|");
          var id        = taxData[0];
          var name      = taxData[1];
          tax_values    = taxData[2];

          $('#taxasli').val(`${name}(${tax_values}%)`);
          $('#idTax').val(id);
          calculateData();
        });

        $(".input").on('input',function(){
          calculateData();
        });

        $("input[name$='radioInput']").click(function() {
          var test = $(this).val();
          $("div.desc").hide();
          $("#" + test).show();
        });

        $("#cardClientDetails").hide();
        $("#showClientDetails").click(function(e){
          e.preventDefault();
          $("#cardClientDetails").show();
          $(this).show();
        });

        $("#cardMoreOptions").hide();
        $("#showMoreOptions").click(function(e){
          e.preventDefault();
          $("#cardMoreOptions").show();
          $(this).show();
        });

        function calculateData(){
          var unitPrice   = parseFloat($('#unitprice').val())
          var qty         = parseFloat($('#qty').val())
          var subTotal    = unitPrice * qty
          var total       = subTotal + ((subTotal * tax_values) / 100)

          $('#subtotal').val(subTotal)
          $('#Total').val(total)
          $('#lastTotal').val(total)

        }

        function secondaryAddress() {
          var checkBox = document.getElementById("addShipping");
          var text = document.getElementById("Shipping");
          
          if(checkBox.checked == true) text.style.display = "block";
          else text.style.display = "none";
        }

        function shippingAddress() {
          var checkBox = document.getElementById("addShipping2");
          var text = document.getElementById("Shipping2");
          
          if (checkBox.checked == true) text.style.display = "block";
          else text.style.display = "none";
        }
      });
</script>

<script>
  $(document).ready(function() {
          $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
            newid = parseInt($(this).data("id"));
          }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
          var td;
          var cur_td = $(this);
          var children = cur_td.children();

            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
              td = $("<td></td>", {
                "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name") + newid);
              c.appendTo($(td));
              td.appendTo($(tr));
            } else {
              td = $("<td></td>", {
                'text': $('#tab_logic tr').length
              }).appendTo($(tr));
            }
          });
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
         $(this).closest("tr").remove();
       });
      });




    // Sortable Code
    var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
        $(this).width($originals.eq(index).width())
      });

      return $helper;
    };
  });

  tail.select('#select1', {
    search: true
  });
  tail.select('#selectItem', {
    search: true
  });
  </script>
@endsection