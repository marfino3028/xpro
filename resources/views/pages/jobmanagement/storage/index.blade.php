@extends('masters/index_1')

@section('title')
X Pro - Manage Client
@endsection

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
<!-- perbaikan layout -->
<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('custom/css/app.css') }}" />
<link rel="stylesheet" href="{{ asset('custom/admin-lte/plugin/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')
@if (session('add'))
<div class="alert alert-success">
  {{ session('add') }}
</div>
@endif
@if (session('update'))
<div class="alert alert-success">
  {{ session('update') }}
</div>
@endif 
@if (session('delete'))
<div class="alert alert-danger">
  {{ session('delete') }}
</div>
@endif

<div class="content-wrapper">
  <section class="content">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h6 class="m-0 font-weight-bold text-primary">List Document</h6>
            <div class="card-body">
              <div class="content-header d-flex justify-content-between">
                <div class="modal-body">
                    <div class="row" id="row">
                    </div>
                  </div>
              </div>
        </div>
    </div>
  </section>
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('js/dropdown-search.js') }}"></script>


<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options.toastClass = 'toastr';
    getProjectDocument();
    function getProjectDocument() {
        $('#row').html('');
        $.ajax({
          url: '{{url('')}}/projects/documents',
              dataType: "json",
              type: "GET",
              processData: false,
              contentType: false,
              success: function (response) {
                  response.forEach(element => {
                      $('#row').append(`
                        <div class="col-md-3 mb-2">
                          <input type="hidden" id="share_file_${element.id}" value="${element.url_file}" />
                            <div class="card border-left-primary shadow">
                                <div class="card-body" >
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase">${element.name}</div>
                                        </div>
                                        <div class="col-auto">
                                          <a href="${element.url_file}" tab="new_tab">
                                            <i style="" class="fas fa-download text-success" style="cursor: pointer" title="Download"></i>
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

      function onCopy(id) {
          var copyText = document.getElementById(`share_file_${id}`);
          copyText.type = 'text';
          copyText.select();
          document.execCommand("copy");
          copyText.type = 'hidden';
          toastr.success('Shared')     
        }
</script>
@endsection