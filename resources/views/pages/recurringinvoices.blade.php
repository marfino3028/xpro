@extends('layouts.index')
@section('content')
  
<div class="content-wrapper">
  <!-- Page header -->
  <div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Reccuring Invoices</span></h4>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      <div class="header-elements d-none">
        <div class="d-flex justify-content-center">
          <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
            <i class="icon-bars-alt text-pink-300"></i>
            <span>Statistics</span>
          </a>
          <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
            <i class="icon-calculator text-pink-300"></i>
            <span>Invoices</span>
          </a>
          <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
            <i class="icon-calendar5 text-pink-300"></i>
            <span>Schedule</span>
          </a>
        </div>
      </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
        <div class="breadcrumb">
          <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <span class="breadcrumb-item active">Reccuring Invoices</span>
        </div>

        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
          <a href="/refund_receipts" class="breadcrumb-elements-item">
            <i class="icon-add mr-2"></i>
            Reccuring Invoices
         </a>
          <a href="#" class="breadcrumb-elements-item">
            <i class="icon-comment-discussion mr-2"></i>
            Support
          </a>

          <div class="breadcrumb-elements-item dropdown p-0">
            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
              <i class="icon-gear mr-2"></i>
              Settings
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
              <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
              <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
            </div>
          </div>
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
          <h5 class="card-title">Recurring Invoices</h5>
          <div class="header-elements">
            <div class="list-icons">
                      <a class="list-icons-item" data-action="collapse"></a>
                      <a class="list-icons-item" data-action="reload"></a>
                      <a class="list-icons-item" data-action="remove"></a>
                    </div>
                  </div>
        </div>

        <table id="Example1" class="table table-lg invoice-archive">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Client Name</th>
              <th>Next Date</th>
              <th>Generated</th>
              <th>Total</th>
              <th>Every</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $('#Example1').DataTable({
            autoWidth: false,
            order: [[ 1, 'desc' ]],
            dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
            lengthMenu: [ 25, 50, 75, 100 ],
            displayLength: 25,
        });
    $('.select-dropdown').select2();
  </script>
@endpush