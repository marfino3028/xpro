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
  <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dropdown-search.css') }}">
  <link rel="stylesheet" href="{{ asset('custom/css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('custom/admin-lte/plugin/iCheck/square/blue.css') }}">
<style>
  .table-sortable tbody tr {
    cursor: move;
  }
/*    .select-product{
    z-index: 3;
    }*/
    .table-responsive{
      z-index: 3;
    }
  </style>




  @endsection

  @section('content')
  @if (session('add'))
  <div class="alert alert-success">
    {{ session('add') }}
  </div>
  @endif
  <br>
  <!-- Circle Buttons -->
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <i class="fas fa-question-circle"></i>
      <strong>Information!</strong>
      <br>
      <p>Create invoices using the many features on this page. Using the bottom tabs, you can customise many aspects of the invoice, and tailor many areas to create a virtual 'content' template for future invoices. If you save the completed - or partly completed invoice - as a 'pre-filled invoice template' you can use it again and again for any similar invoice requirement. You can save as many different versions as you wish, naming them as required, and they will be available (see the dropdown top right) when you create any future invoices. The 'Invoice notes' section allows you to add further explanation or description, or special payment details and so on, and is shown on the invoice sent to the client.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  
  <div class="content-wrapper">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Estimasi</h6>
            </div>
            <div class="card-body">
                <section class="content">
                    <div class="box box-default">
                        <div class="box-body pad">
                            @if ($message = Session::get('add'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
        
                            <form action="{{ route('postEstimate') }}" method="post">
                                @csrf
                                <div class="row box-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Estimates Details</label>
                                          <label for="exampleFormControlInput1">Estimate Date</label>
                                          <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="estimates_date">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Issue Date</label>
                                          <input type="date" class="form-control" id="exampleFormControlInput3" placeholder="" name="issue_date">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Payment Terms</label>
                                          <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="payment_terms">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Client</label>
                                          <select class="custom-select">
                                              <option selected>Method</option>
                                              <option value="1">Send via Email</option>
                                              <option value="2">Print (Offline)</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <select class="select-dropdown custom-select" id="select1" name="id_clients">
                                              <option selected="">Select Clients</option>
                                              @foreach($showClient as $field)
                                              <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                          <button id="showClientDetails" class="btn btn-sm btn-outline-success mr-2">New</button>
                                          <button id="showClientDetails" class="btn btn-sm btn-outline-danger">Cancel</button>
                                    </div>
                                </div>
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
                                          <label for="exampleFormControlInput1">Full Name</label>
                                          <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Your name" name="full_name">
                                          @error('full_name')
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
                                            <label for="exampleFormControlInput1">Country</label>
                                            <select class="select-dropdown custom-select" name="country">
                                              <option selected value="Indonesia">Indonesia</option>
                                              <option value="Australia">Australia </option>
                                            </select>
                                          </div>
                                          <br>
                                          <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="addShipping" onclick="myFunctionTwo()">
                                            <label class="form-check-label" for="exampleCheck1">Add Secondary Address</label>
                                          </div>
                                          <!-- Add Secondary Address -->
                                          <br>
                                          <div id="Shipping" class="desc" style="display:none" >
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
                                            <br>
                                          </div>
                                          <br>
                                          <div class="col-auto">
                                            <input type="submit" class="btn btn-sm btn-outline-success" value="Save In dividual" name="save">
                                          </div>
                                        </div>
                                        <!-- Business -->
                                        <div class="col-auto">
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
                                            <input type="submit" class="btn btn-sm btn-outline-success" value="SaveBusiness" name="save">
                                          </div>
                                          <!-- Add Secondary Address -->
                                          <br>
                                          <!-- akhir business -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">More Options</h6>
                                    </div>
                                    <div class="card-body">
                                        <button id="showMoreOptions" class="btn btn-sm btn-outline-success">More Options</button>
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
                                                        <label class="sr-only" for="inlineFormInputGroup">Discount</label>
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Invoice Number">
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
                                                        <label class="sr-only" for="inlineFormInputGroup">Deposit</label>
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Invoice Number">
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
                                                        <label class="sr-only" for="inlineFormInputGroup">Discount</label>
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Invoice Number">
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

                                <section class="content" style="margin-top: 20px">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped " id="tab_logic">
                                          <thead class="bg-primary text-white">
                                              <tr>
                                                  <th class="text-center">Action</th>
                                                  <th class="text-center">Item</th>
                                                  <th class="text-center">Description</th>
                                                  <th class="text-center">Unit Price</th>
                                                  <th class="text-center">Quantity</th>
                                                  <th class="text-center">Tax</th>
                                                  <th class="text-center">Total</th>
                                              </tr>
                                          </thead>
                                          <tbody id="element_table">
                                            <tr id='addr0' data-id="0" class="hidden">
                                              <td data-name="del">
                                                  <button name="del0" class='btn btn-sm btn-outline-danger fa fa-trash-o row-remove'><span aria-hidden="true"></span></button>
                                              </td>
                                              <td data-name="tes" class="select-product">
                                                <!-- <input type="text" name='name0' placeholder="Name" class="form-control"> -->
                                                  {{-- <select class="" id="sel                                        ect-dropdown" name='tes'>
                                                                              <option selected>Client Name</option>
                                                  <option value="1">Invoice Number</option>
                                                  </select> --}}
                                                  <select class="select-dropdown custom-select" id="selectItem">
                                                      <option selected="">Select Product</option>
                                                      @foreach($showProduct as $field)
                                                      <option value="{{ $field -> id}}|{{ $field-> description}}|{{ $field-> price}}">{{ $field -> name}}</option>
                                                      @endforeach
                                                  </select>
                                              </td> 
                                              <input type="text" name="id_product" style="display: none;" id="idProduct">
                                              <td data-name="desc">
                                                  <textarea name="desc0" placeholder="Description" class="form-control" id="description" readonly="readonly"></textarea>
                                              </td>

                                              <td data-name="unitprice">
                                                  <input type="number" name='unitprice'  placeholder='0' class="form-control" id="unitprice" readonly="readonly" />
                                              </td>

                                              <td data-name="qty">
                                                  <input type="number" name='quantity' placeholder='Quantity' class="form-control"/>
                                              </td>

                                              <td data-name="sel">
                                                  <select name="sel0" class="form-control">
                                                      <option value="">Tax</option>
                                                      <option value="1">GST</option>
                                                      <option value="2">Tax Settings</option>
                                                  </select>
                                              </td>
                                              <td data-name="subtotal">
                                                  <input type="number" placeholder="$0.00" name='subtotal' class="form-control" id="subtotal" readonly="readonly"/>
                                              </td>
                                            </tr>
                                          </tbody>
                                      </table>
                                      <a id="add_row" class="btn btn-sm btn-primary float-left" style="color: white">Add Row</a>
                                    </div>
                                </section>
                                <br>
                                <section class="card shadow mb-4">
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
                                                  <button type="submit" class="btn btn-sm btn-outline-success dropdown-toggle" data-toggle="dropdown"><i class="fas fa-eye"></i> Preview</button>
                                                  <div class="dropdown-menu">
                                                      <a class="dropdown-item" href="#">Web Preview</a>
                                                      <a class="dropdown-item" href="#">PDF Preview</a>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-auto">
                                              <button type="submit" class="btn btn-sm btn-outline-secondary">Save as Draft</button>
                                          </div>
                                          <div class="col-auto">
                                              <div class="dropdown">
                                                  <button type="submit" class="btn btn-sm btn-outline-success" value="SaveInvoice" name="save"><i class="fas fa-checklist"></i> Save & Don't email</button>
                                                  @csrf
                                                  </form>
                                                  <!-- <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Save and Send Email</a>
                                                    <a class="dropdown-item" href="#">Send With Revised Email</a>
                                                  </div> -->
                                              </div>
                                          </div>
                                      </div>
                                </section>                                
                            </form>
                        </div>
                    </div>
                </section>
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
    console.log(editor_content);
  </script>


  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/dataTables-select.min.js') }}"></script>
  {{-- <script src="{{ asset('js/dropdown-search.js') }}"></script> --}}
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>
  <!-- Ajax bootsnip -->
  {{-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> --}}
  <!-- Latest compiled and minified CSS -->
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> --}}

  <!-- Latest compiled and minified JavaScript -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> --}}

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}



  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <!-- Tab w3s -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/tail.select-full.min.js') }}"></script>
  <script>
    // $('.selectpickerdata').selectpicker(); 
  </script>

  <script>
    $('#selectItem').on('change', function() {
      // alert( this.value );
      // console.log(this.value)
      var str = this.value;
      var tes = str.split("|");
      console.log(tes);
      var id = tes[0];
      var description = tes[1];
      var price = tes[2];
      $('#description').val(description);
      $('#unitprice').val(price);
      $('#idProduct').val(id);
      $('#subtotal').val(price);
    });

  </script>
  <script>
    $(document).ready(function() {
      $("input[name$='radioInput']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
      });
    });
  </script>

  <script>
    $(document).ready(function(){
      $("#cardClientDetails").hide();
      $("#showClientDetails").click(function(e){
        e.preventDefault();
        $("#cardClientDetails").show();
        $(this).show();
      });
    });
  </script>

  <script>

    $(document).ready(function(){
      $("#cardMoreOptions").hide();
      $("#showMoreOptions").click(function(e){
        e.preventDefault();
        $("#cardMoreOptions").show();
        $(this).show();
      });
    });
  </script>


  <!-- More -->
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
            console.log($(children[0]))

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
      
      // add delete button and td
      
      // $("<td></td>").append(
      //     $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
      //         .click(function() {
      //             $(this).closest("tr").remove();
      //         })
      // ).appendTo($(tr));
      

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

  $(".table-sortable tbody").sortable({
    helper: fixHelperModified      
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row").trigger("click");

});
</script>
<script>
tail.select('#select1', {
  search: true
});
tail.select('#selectItem', {
  search: true
});
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
@endsection