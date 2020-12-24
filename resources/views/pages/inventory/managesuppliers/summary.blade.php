@extends('layouts.index')

@section('title')
X Pro - Project Detail
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/projects" class="breadcrumb-item">Project</a>
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
                <h5 class="card-title">Summary Supplier</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>
            <div class="main-body"> 
                <div class="col-xs-12 col-sm-4 col-md-5 align-items-center">
                    <h2 class="d-inline-flex mb-0 long-texts">{{ $data->project_name }}</h2>
                </div>
                <br/>
                <div class="row ml-1 mr-1">
                    <div class="col-xl-3">
                        <ul class="list-group mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Invoices <span class="badge badge-primary badge-pill">{{ $summary->count_invoices }}</span>
                            </li> 
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Work Order <span class="badge badge-primary badge-pill">{{ $summary->count_workorders }}</span>
                            </li>
                        </ul>

                        <ul class="list-group mb-4">
                            <li class="list-group-item">
                                {{--<div>Client</div>--}} 
                                <div>
                                    <table>
                                        <tr>
                                            <td><small title="email" class="long-texts h6"><b>Name</b></small></td>
                                            <td>:</td>
                                            <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><small title="email" class="long-texts h6"><b>Email</b></small></td>
                                            <td>:</td>
                                            <td>{{ $data->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><small title="email" class="long-texts h6"><b>Phone</b></small></td>
                                            <td>:</td>
                                            <td>{{ $data->telephone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </li> 
                            <div class="dropdown-divider"></div>
                            <li class="list-group-item">
                                <div></div> 
                                <div class="row">
                                    <div class="col-md-9">
                                        <select class="select2 form-control"name="site_contact" id="site_contact">
                                        </select>
                                    </div>
                                    <div class="col-md-2"><button type="button" data-toggle="modal" data-target="#modal_add_site_contact" class="btn btn-outline-primary">
                                            <i class="icon-file-plus2" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </li> 
                            <div class="dropdown-divider"></div>
                            <li class="list-group-item">
                                <div>Website</div> 
                                <div>
                                    <small title="" class="long-texts h6"><b>{{ $data->website != null ? $data->website : "-" }}</b></small>
                                </div>
                            </li> 
                            <div class="dropdown-divider"></div>
                            <li class="list-group-item">
                                <div>Address</div> 
                                <div>
                                    <small class=" h6"><b>{{ $data->address != null ? $data->address : "-" }}<br></b></small>
                                </div>
                            </li>
                        </ul> 

                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_document">
                            <i class="fa fa-file"></i> <b>Document</b>
                        </a>
                        <a href="/projects/update/{{ $data->id }}" class="btn btn-primary btn-block">
                            <i class="fa fa-edit"></i><b>Edit</b>
                        </a><br/><br/>
                    </div>

                    <div class="col-xl-9">
                        <div class="row mb-3">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow">
                                    <div class="card-body" style="cursor: pointer">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase" style="font-size: 14pt">PAID</div>
                                                <div class="dropdown-divider"></div>
                                                <div class="mb-0 font-weight-bold" style="font-size: 14pt">
                                                    ${{ $summary->paid_invoices }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow">
                                    <div class="card-body" style="cursor: pointer">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase" style="font-size: 14pt; color:#FFC300">OPEN INVOICES</div>
                                                <div class="dropdown-divider"></div>
                                                <div class="mb-0 font-weight-bold" style="font-size: 14pt">
                                                    ${{ $summary->open_invoices }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-danger shadow">
                                    <div class="card-body" style="cursor: pointer">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase" style="font-size: 14pt">OVERDUE INVOICES</div>
                                                <div class="dropdown-divider"></div>
                                                <div class="mb-0 font-weight-bold" style="font-size: 14pt">
                                                    ${{ $summary->overdue_invoices }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12">
                                <div class="nav-wrapper">
                                    <ul id="tabs-icons-text" role="tablist" class="nav nav-pills nav-fill flex-column flex-md-row">
                                        <li class="nav-item">
                                            <a id="invoices-tab" data-toggle="tab" href="#invoices-content" 
                                               role="tab" aria-controls="invoices-content" aria-selected="false" 
                                               class="nav-link mb-sm-3 mb-md-0 active">
                                                <i class="fa fa-money-bill mr-2"></i>Purchase Invoices
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="transactions-tab" data-toggle="tab" href="#transactions-content" 
                                               role="tab" aria-controls="transactions-content" aria-selected="true" 
                                               class="nav-link mb-sm-3 mb-md-0">
                                                <i class="fas fa-hand-holding-usd mr-2"></i>Refund Invoices
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <br/> 

                                <div class="card">
                                    <div id="myTabContent" class="tab-content">
                                        <div id="invoices-content" role="tabpanel" aria-labelledby="invoices-tab" class="tab-pane fade show active">
                                            <div class="table-responsive">
                                                <table id="tbl-invoices" class="table table-flush table-hover">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th>Number</th> 
                                                            <th class="text-center">Amount</th> 
                                                            <th class="text-left">Invoice Date</th> 
                                                            <th class="text-left">Due Date</th> 
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        @foreach($invoices as $value)
                                                        <tr>
                                                            <td>
                                                                <a href="/manage_invoice/detail/{{ $value->id }}">{{ $value->inv_number }}</a>
                                                            </td> 
                                                            <td class="text-center">${{ $value->total }}</td> 
                                                            <td class="text-left">{{ $value->invoice_date }}</td> 
                                                            <td class="text-left">{{ $value->issue_data }}</td> 
                                                            <td>

                                                                <span class="badge badge-pill badge-primary my--2">Draft</span>
                                                            </td>
                                                        </tr> 
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                        <div id="transactions-content" role="tabpanel" aria-labelledby="transactions-tab" class="tab-pane fade show">
                                            <div class="table-responsive">
                                                <table id="tbl-transactions" class="table table-hover">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <td>No</td>
                                                            <td>Date</td> 
                                                            <td>Amount</td> 
                                                            <td>Status</td> 
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        @foreach($workorders as $value)
                                                        <tr>
                                                            <td>{{ $value->order_number }}</td> 
                                                            <td>{{ $value->start_date }}</td> 
                                                            <td>${{ $value->budget }}</td> 
                                                            <td>{{ $value->status_wo }}</td> 
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_site_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Site Contact</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form method="POST" action="/settings/tax">
                @csrf
                <div class="modal-body" id="site_contact_data">

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_add_site_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Site Contact</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form method="POST" action="/settings/tax">
                @csrf
                <div class="modal-body">
                    <div class="row" style="justify-content: space-between">
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Name <span style="color: red">*</span></p>
                            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" id="site_contact_name"
                                   required />
                        </div>
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Email <span style="color: red">*</span></p>
                            <input type="email" class="form-control mb-2" placeholder="Enter email" name="email" id="site_contact_email"
                                   required />
                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between">
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Phone <span style="color: red">*</span></p>
                            <input type="text" class="form-control mb-2" placeholder="Enter phone" name="phone" id="site_contact_phone"
                                   />
                        </div>
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Address <span style="color: red">*</span></p>
                            <input type="text" class="form-control mb-2" placeholder="Enter address" name="address" id="site_contact_address"
                                   required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button"
                                                  data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" id="save_sitecontact">Save
                    </button></div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Document -->
<div class="modal fade" id="modal_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Document Projects</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form method="POST" id="upload_form" action="/upload/documents">
                @csrf
                <input type="hidden" name="project_name" value="{{ $data->project_name }}">
                <input type="hidden" name="project_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row" id="row">
                    </div>
                </div>
                <div class="modal-footer"><input type="file" class="form-control-file" name="document"><button class="btn btn-primary form-control" id="submit_document" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> uploading..." type="submit">Upload</button></div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $('.select-dropdown').select2();
      $('#site_contact').on('change', function() {
        var str = this.value;
        var tes = str.split("|");
        var name = tes[0];
        var email = tes[1];
        var phone = tes[2];
        var address = tes[3];
        $('#site_contact_data').html('');
        $('#site_contact_data').append(`
              <table>
                <tr>
                  <td><small title="email" class="long-texts h6"><b>Name</b></small></td>
                  <td>:</td>
                  <td>${name}</td>
                </tr>
                <tr>
                  <td><small title="email" class="long-texts h6"><b>Email</b></small></td>
                  <td>:</td>
                  <td>${email}</td>
                </tr>
                <tr>
                  <td><small title="email" class="long-texts h6"><b>Phone</b></small></td>
                  <td>:</td>
                  <td>${phone}</td>
                </tr>
                <tr>
                  <td><small title="email" class="long-texts h6"><b>Address</b></small></td>
                  <td>:</td>
                  <td>${address}</td>
                </tr>
              </table>`)
        $("#modal_site_contact").modal("toggle")
      });
    </script>
    <script>
      let site_contact = {!!json_encode($data->site_contact)!!} == null ? [] : {!!json_encode($data->site_contact)!!} ;
      getSiteContactData();
      function getSiteContactData()
      {
        $(`#site_contact`).empty().append('<option selected>Site Contact</option>')
        site_contact.forEach((element) => {
          $(`#site_contact`).append(`<option value="${element.name}|${element.email}|${element.phone}|${element.address}">${element.name}</option>`);
        });
      }
      
      toastr.options.toastClass = 'toastr';
      getProjectDocument();
      function deleteProjectDocument(document_id) {
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
                      url: '{{ url('/')}}/projects/documents/delete',
                        type: "post",
                        data: {
                          "_token": "{{ csrf_token() }}",
                          data: document_id
                        },
                        dataType: 'json',
                        success: function(res){
                          if (res.success) {
                            Swal.fire('Deleted!', '', 'success');
                            getProjectDocument()
                          }
                        }
                    })
                  }
              })
      }
      function getProjectDocument() {
        $('#row').html('');
        $.ajax({
          url: '{{url('')}}/projects/documents?project_id={{$data->id}}',
              dataType: "json",
              type: "GET",
              processData: false,
              contentType: false,
              success: function (response) {
                  response.forEach(element => {
                      $('#row').append(`
                        <div class="col-md-6 mb-2">
                          <input type="hidden" id="share_file_${element.id}" value="${element.url_file}" />
                            <div class="card border-left-primary shadow">
                                <div class="card-body" >
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase">${element.name}</div>
                                        </div>
                                        <div class="col-auto">
                                          <a href="${element.url_file}" tab="new_tab">
                                            <i style="" class="icon-download text-success" style="cursor: pointer" title="Download"></i>
                                          </a>
                                          <a href="javascript:deleteProjectDocument([${element.id}])">
                                            <i class="fa fa-trash text-danger" title="Delete"></i>
                                          </a>
                                          <a href="javascript:onCopy(${element.id})">
                                            <i class="fa fa-share text-primary" title="share"></i>
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      `)
                  });
              },
              error: function (response) {
              }
        });
      }
      $(document).ready(function () {
        $('#submit_document').on('click', function(e) {
            e.preventDefault(); 
            var formData = new FormData(document.querySelector('#upload_form'))
            var $this = $(this);
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> uploading...';
            if ($(this).html() !== loadingText) {
              $this.data('original-text', $(this).html());
              $this.html(loadingText);
            }
            $.ajax({
                url: '{{url('')}}/upload/documents',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                dataType: "json",
                enctype: 'multipart/form-data',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $this.html($this.data('original-text'));
                    if(response.success){
                      getProjectDocument();
                      toastr.success('Uploaded success')
                    }else{
                      toastr.error('Uploaded failed')
                    }
                },
                error: function (response) {
                    $this.html($this.data('original-text'));
                    toastr.error('Uploaded failed')
                }
            });
        });

        $('#save_sitecontact').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> process...';
            if ($(this).html() !== loadingText) {
              $this.data('original-text', $(this).html());
              $this.html(loadingText);
            }
            site_contact.push({
              name: $('#site_contact_name').val(),
              email: $('#site_contact_email').val(),
              phone: $('#site_contact_phone').val(),
              address: $('#site_contact_address').val(),
            });
            $.ajax({
                url: '{{url('')}}/projects/update-sitecontact',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                dataType: "json",
                type: "POST",
                data: {
                  project_id: "{{ $data->id }}", 
                  site_contact: site_contact                 
                },
                success: function (response) {
                    $this.html($this.data('original-text'));
                    if(response.success){
                      toastr.success('Added site contact success')
                      $("#modal_add_site_contact").modal("toggle")
                      getSiteContactData()
                    }else{
                      toastr.error('Added site contact failed')
                    }
                },
                error: function (response) {
                    $this.html($this.data('original-text'));
                    toastr.error('Uploaded failed')
                }
            });
        });
      });

      function onCopy(id) {
          var copyText = document.getElementById(`share_file_${id}`);
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
          toastr.success('Shared')     
        }
    </script>
@endpush