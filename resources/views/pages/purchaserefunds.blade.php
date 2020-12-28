@extends('layouts.index')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Manage Purchase Order</span></h4>
          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      <div class="header-elements d-none">
          <div class="d-flex justify-content-center">
              
          </div>
      </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
          <div class="breadcrumb">
              <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <span class="breadcrumb-item active">Purchase Refunds</span>
              <span class="breadcrumb-item active">Archive</span>
          </div>

          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      <div class="header-elements d-none">
          <div class="breadcrumb justify-content-center">
              <a href="/add_purchase_refunds" class="breadcrumb-elements-item">
                  <i class="icon-add mr-2"></i>
                  Create Purchase Refunds
              </a>
              <div id="filters" style="display: none;">
                  &nbsp;<button type="button" onclick="deletePurchaseRefunds()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
              </div>
          </div>
      </div>
  </div>
</div>
<!-- /page header -->
  <!-- Circle Buttons -->
  <div class="content">
    <!-- Invoice archive -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Purchase Refunds</h6>
            <div class="header-elements">
              <div class="list-icons">
                  <a href="/" type="submit" class="btn btn-sm btn-primary" title="Config">
                    <i class="icon-cogs"></i>
                </a>
                <a href="" type="submit" class="btn btn-sm btn-primary" title="Logs">
                    <i class="icon-info3"></i>
                  </a>
                  <a class="list-icons-item" data-action="collapse"></a>
                  <a class="list-icons-item reload_table" data-action="reload" id="reload_table"></a>
                  <a class="list-icons-item" data-action="remove"></a>
                </div>
              </div>
            </div> 
            <form class="ml-3">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <select class="custom-select">
                    <option selected>Any Supplier</option>
                    <option value="1">Test</option>
                  </select>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">P.O. Number</label>
                  <input type="Text" class="form-control" id="inlineFormInputGroup" placeholder="Purchase Number">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-outline-primary">Filter</button>
                </div>
              </div>
            </form>
        <div class="table-responsive">
            <table id="Example1" class="table table-lg">
                <thead>
                    <tr>
                      <th style="width:2%;">#</th>
                      <th>Customer Name</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Body 2</th>
                      <th>Created</th>
                      <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
  function deleteManagePurchaseOrders(id) {
    var projects_name_id = []
    if (id != null) {
      projects_name_id.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        projects_name_id.push($(this).val());
      });
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url('/')}}/purchase_refunds/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: projects_name_id
              },
              dataType: 'json',
              success: function(res){
                if (res.success) {
                  Swal.fire('Deleted!', '', 'success');
                  $('#Example1').DataTable().ajax.reload();
                }
              }
          })
        }
    })
  }
</script>
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