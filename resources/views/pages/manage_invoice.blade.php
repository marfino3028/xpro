@extends('masters/index_1')

@section('title')
X Pro - Manage Inovice
@endsection

@section('css')
<!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">

@endsection

@section('content')
@if (session('add'))
<div class="alert alert-success">
  {{ session('add') }}
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger">
  {{ session('delete') }}
</div>
@endif
<br>
<!-- Circle Buttons -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Invoices</h6>
  </div>
  <div class="card-body">
    <form>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-chart-pie"></i></button>
        <button type="submit" class="btn btn-primary mb-2">Appointments</button>
        <a href="/create_invoice" class="btn btn-success mb-2"><i class="fas fa-plus"></i> New Invoices</a>

      </div>
    </form>
  </div>
</div>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fas fa-question-circle"></i>
  <strong>Information!</strong>
  <br>
  <p>The invoices page lists all invoices issued by the system, whether manually or through the automated functions for subscription renewals. You can search by Client (or use the advanced options selectable through the More Options link at the top right) or order by date, status etc simply by clicking on the column heading, which will then list the invoices accordingly.For any invoice, you can edit the contents is required, export/print as pdf, or access other functions via the 'More' icon  - to view, delete, send to the client, or open to manage payment if the client has paid outside the invoicing system. Any invoice sent to the client will include any attachments, etc added to the invoice when originally created (unless edited and updated since then).</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Search  </h6>
  </div>
  <div class="card-body">
    <form>
      <div class="form-row align-items-center">
        <div class="col-auto">
          <select class="select-dropdown custom-select" id="select1" name="clients">
            <option value="">Select Clients</option>
            @foreach($showClient as $field)
            <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-auto">
          <label class="sr-only" for="inlineFormInputGroup">Invoice Number</label>
          <input type="Text" class="form-control" id="inlineFormInputGroup" placeholder="Invoice Number">
        </div>
        <div class="col-auto">
          <select class="custom-select">
            <option selected>Any Status</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </div>
    </form>
    <br>
    Filter: 
    <a href="#" class="badge badge-primary">All</a>
    <a href="#" class="badge badge-primary">Overdue</a>
    <a href="#" class="badge badge-primary">Due</a>
    <a href="#" class="badge badge-primary">Unpaid</a>
    <a href="#" class="badge badge-primary">Draft</a>
    <a href="#" class="badge badge-primary">Overpaid</a>


  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List Invoices</h6>
  </div>

  <div class="card-body">
    <div class="row justify-content-start">
      <div class="col-auto">
        <form
          onsubmit="return confirm('Are you sure deleted invoice?')"
          class="d-inline"
          action="{{ route('deleteinvoices', ['id' => $field->id ]) }}"
          method="POST">
          @csrf
          @method('DELETE')
          <a class="btn btn-sm btn-danger mb-2" href="#" data-toggle="modal" data-target="#delete">
            <i class="fas fa-trash"></i>
            Delete
          </a>
        </form>
        <button type="submit" class="btn btn-sm btn-primary mb-2 "><i class="fas fa-envelope"> </i> Send to Client</button>
        <button type="submit" class="btn btn-sm btn-primary mb-2 "><i class="fas fa-check"> </i> Mark as Paid</button>
        <button type="submit" class="btn btn-sm btn-primary mb-2 "><i class="fas fa-file-pdf"> </i> Print PDF</button>
        <button type="submit" class="btn btn-sm btn-primary mb-2 "><i class="fas fa-file-export"> </i> Export</button>
        <button type="submit" class="btn btn-sm btn-primary mb-2 "><i class="fas fa-sms "> </i> SMS</button>
      </div>
    </div>
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure deleted invoice?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">If the Delete button is pressed, your data will be permanently deleted in the database.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('deleteinvoices', ['id' => $field->id ]) }}">Delete</a>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="table-responsive">
      <table class="table" id="dataTableMulti" width="100%" cellspacing="0">
        <thead>
          <tr>
          </tr>
        </thead>
        <tbody>
          @foreach($showData as $field)
          <tr>
            <td></td>
            <td>
              <!-- Dropdown Card Example -->
              <div class="card border-left-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{ route('invoicedetail', $field->id) }}" target="_blank">
                  <div class="row">
                    <h6 class="m-0 font-weight-bold text-info">#</h6>
                    <h6 class="m-0 font-weight-bold text-info">{{$field->inv_number}}</h6>
                  </div>
                  </a>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-caret-down fa-lg fa-fw text-black-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-search"> </i>  View</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/manage_invoice/edit/{{ $field->id }}"> <i class="fas fa-edit"> </i>  Edit</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-file-pdf"> </i>  PDF</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-print"> </i>  Print</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-envelope"> </i>  Email to Client</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-credit-card"> </i>  Add Payment</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> <i class="fas fa-trash"> </i>  Delete</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fas fa-clone"> </i>  Clone</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <ul style="list-style-type:none">
                        <li><i class="fas fa-user"></i> PM: {{ $field->client->full_name}}</li>
                        <li><i class="fas fa-clock"></i> Due Date: {{ $field->invoice_date}} |  {{ $field->issue_date}}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{ $field ->client-> street}}, {{ $field ->client-> city}}, {{ $field->client-> province}}</li>
                        <li><i class="fas fa-globe-asia"></i> {{ $field ->client-> country}}</li>
                        <li><i class="fas fa-info-circle"></i> Status: <span class="badge badge-success">Open</span></li>
                      </ul>


                      <span class="badge badge-info">#BigProject</span>
                      <span class="badge badge-info">#TeamProject</span>
                    </div>

                    <div>
                      <ul style="list-style-type:none">
                        <li><h2>${{ $field-> total}}</h2><li>
                          <li class="badge badge-danger">Unpaid</li>
                        </ul>


                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection

  @section('js')
  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/dataTables-select.min.js') }}"></script>
  <script src="{{ asset('js/dropdown-search.js') }}"></script>


  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <script>

    $('.select-dropdown').select2();
  </script>
  @endsection