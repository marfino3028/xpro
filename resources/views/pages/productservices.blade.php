@extends('layouts.index')

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
@if (session('update'))
<div class="alert alert-success">
    {{ session('update') }}
</div>
@endif 
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Product & Service</span></h4>
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
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="#" class="breadcrumb-item">Product & Service</a>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                  <a href="/add_product_&_services" class="breadcrumb-elements-item">
                    <i class="icon-add mr-2"></i>
                    Create Product & Invoices
                </a>

                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear mr-2"></i>
                    More Actions
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" onclick="deleteProductService()"><i class="icon-trash"></i>Delete</button>
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
                <h6 class="card-title">Product & Service</h6>
                <div class="header-elements ">
                    <div class="list-icons">
                        <div class="form-row align-items-center" style="margin-left: -25px;">
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTableMultii" class="table table-lg invoice-archive">
                    <thead>
                        <tr>
                            <td style="width:2%;">#</td>
                            <td>Product Name</td>
                            <td>Stock</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
  $('.select-dropdown').select2();
  $(function() {
  let params = (new URL(document.location)).searchParams;
  let filter = params.get("filter");
  var table = $('#dataTableMultii').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/products_&_services/ajax',
              'data': {
                  ...data
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#dataTableMultii > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="6" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
                console.log(res);
              callback(res);
              }
          })
      },
      columns: [
        { data: null, mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        
        { data: null, mRender: function(data, type, full) {
            return `<a href="/products_&_services/detail/${data.id}">${data.name}</a>`
        }},
        { data: 'stock'},
        { data: 'description'},
        { data: 'price', className: "mb-0 font-weight-bold", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
        { data: null, mRender: function(data, type, full) {
          return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/products_&_services/delete/${data.id}" class="dropdown-item"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
                        <a href="/products_&_services/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/products_&_services/edit_product_services/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                      </div>
                  </form>`;
      }}
      ],
      language: {
                loadingRecords: "&nbsp;",
                processing: 'Loading...'},
        })
        setFilter = function (filter) {
            $('#filter').val(filter);
            table.draw()
        }
        
    });

  function deleteProductService(id) {
    var product_and_service = []
    if (id != null) {
      product_and_service.push(id)
    } else {
      $("input:checkbox[class=checkbox]:checked").each(function () {
        product_and_service.push($(this).val());
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
            url: '{{ url('/')}}/products_&_services/delete',
              type: "post",
              data: {
                "_token": "{{ csrf_token() }}",
                data: product_and_service
              },
              dataType: 'json',
              success: function(res){
                if (res.success) {
                  Swal.fire('Deleted!', '', 'success');
                  $('#dataTableMultii').DataTable().ajax.reload();
                }
              }
          })
        }
    })
  }
  </script>
@endpush