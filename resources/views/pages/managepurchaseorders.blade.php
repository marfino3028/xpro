@extends('layouts.index')
@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/project_asset_list" class="breadcrumb-item">Project Asset List</a>
                    <span class="breadcrumb-item active">Archive</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

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
                <h6 class="card-title">Manage Purchase Order</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="/add_manage_purchase_orders" class="btn btn-sm btn-outline-success">
                            Add New
                        </a>
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteManagePurchaseOrders()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="Example1" class="table table-lg">
                    <thead>
                        <tr>
                            <td style="width:2%;">#</td>
                            <td>Number</td>
                            <td>Suplier</td>
                            <td>Amount</td>
                            <td>Bill Date</td>
                            <td>Due Date</td>
                            <td>Status</td>
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
  $('.select-dropdown').select2();
  $(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");
    var table = $('#Example1').DataTable({
      paging: true,
      processing: false,
      serverSide: false,
      select: true,
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(4, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="table-active table-border"><td colspan="8" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
                    );

                    last = group;
                }
            });

            // Initializw Select2
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }
            $('.form-control-select2').select2({
                width: 150,
                minimumResultsForSearch: Infinity
            });
        },
      ajax: function(data, callback){
          $.ajax({
              url: '{{ url('/')}}/manage_purchase_orders/ajax',
              'data': {
                  ...data,
              },
              dataType: 'json',
              beforeSend: function(){
              // Here, manually add the loading message.
              $('#Example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="8" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
              );
              },
              success: function(res){
              callback(res);
              }
          })
      },
      columns: [
        { data: null,  mRender: function(data, type, full) {
            return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
        }},
        { data: 'bill_number', name: 'Bill Number'},
        { data: 'suplier', name: 'Suplier'},
        { data: 'amount', name: 'Amount', render: $.fn.dataTable.render.number( ',', '.', 2, '$' ) },
        {data: 'bil_date', name: 'Bill Date', render: function (data, type, row) {
            return moment(row.bil_date).format('D MMM Y hh:mm A');
        }},
        {data: 'due_date', name: 'Due Date', render: function (data, type, row) {
            return moment(row.due_date).format('D MMM Y hh:mm A');
        }},
        { data: null, mRender: function(data, type, full) {
            return `<select name="status" class="js-example-basic-single form-control" data-placeholder="Select status">
                      <option value="" ${data.status == '' ? 'selected': ''}></option>
                      <option value="Draft" ${data.status == 'Draft' ? 'selected': ''}>Draft</option>
                    </select>`;
        }},
        { data: null, mRender: function(data, type, full) {
          return `<a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                    <a href="" class="dropdown-item" id="btn_new_operator"><i class="icon-info22" aria-hidden="true"></i> Information</a>
                  </div>`;
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
            url: '{{ url('/')}}/manage_purchase_orders/delete',
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

  $("#Example1").on('change',"input[type='checkbox']",function(e){
      var x = [];
      var filter = document.getElementById("filter");
      if (this.checked) {
          x.push(this.value);
      } else {
          var index = x.indexOf(this.value);
          x.splice(index, 1);
      }
      filter.style.display = "block";
      if (x < 1) {
          filter.style.display = "none";
      }
  }); 

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