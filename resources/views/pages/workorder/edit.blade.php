@extends('layouts.index')

@section('title')
X Pro - Add Work Orders
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit Work Orders</span></h4>
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
                    <a href="/work_order" class="breadcrumb-item">Work Orders</a>
                    <span class="breadcrumb-item active">Edit</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                    <div class="breadcrumb-elements-item dropdown p-0">
                        <div class="dropdown-menu dropdown-menu-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Edit Work Orders</h5>
                        <div class="header-elements">
                        </div>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('updateworkorder', ['id' => $data->id ]) }}" method="POST" enctype="multipart/form-data">
                                @csrf  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p style="font-weight: bold">Order Number</p>
                                            <input required type="text" class="font-weight-semibold form-control @error('work_number') is-invalid @enderror" id="work_number" name="work_number" readonly value="{{ $data->order_number }}">
                                            @error('work_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">Client <span style="color: red">*</span></p>
                                            <select required class="text-capitalize js-example-basic-single form-control" name="client_id" id="client_id">
                                                <option disabled>Select Clients</option>
                                                @foreach($showClient as $o)
                                                <option value="{{ $o->id }}" @if($o->id == $data->id_clients) selected @endif>{{ $o->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">Start Date</p>
                                            <input required type="datetime-local" class="font-weight-semibold form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate" @if($data->start_date != null) value="{{ date('Y-m-d\TH:i', strtotime($data->start_date)) }}" @endif>
                                            @error('startDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <p style="font-weight: bold">Hourly Rate <span style="color: red">*</span></p>
                                            <input required type="number" class="font-weight-semibold form-control @error('hourly_rate') is-invalid @enderror" id="hourly_rate" name="hourly_rate" value="{{ $data->hourly_rate }}">
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">Work Order Type <span style="color: red">*</span></p>
                                            <input required type="text" class="font-weight-semibold form-control @error('workorder_type') is-invalid @enderror" id="workorder_type" name="workorder_type" value="{{ $data->workorder_type }}">
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">Status <span style="color: red">*</span></p>
                                            <select name="status" class="form-control form-control-select2" id="status" data-placeholder="Select status">
                                                <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Draft</option>
                                                <option value="2" {{$data->status == '2' ? 'selected' : ''}}>Finish</option>
                                                <option value="3" {{$data->status == '3' ? 'selected' : ''}}>Pending</option>
                                                <option value="4" {{$data->status == '4' ? 'selected' : ''}}>Cancled</option>
                                                <option value="5" {{$data->status == '5' ? 'selected' : ''}}>On Going</option>
                                                <option value="6" {{$data->status == '6' ? 'selected' : ''}}>Waiting Approval</option>
                                            </select>
                                        </div>
                                    </div>                                   

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p style="font-weight: bold">Title <span style="color: red">*</span></p>
                                            <input required type="text" class="font-weight-semibold form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $data->title }}">
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <p style="font-weight: bold">Asign Staff <span style="color: red">*</span></p>
                                            <select required class="text-capitalize js-example-basic-single form-control select-fixed-multiple" multiple="multiple" data-fouc id="id_staff">
                                                @foreach($showStaff as $o)
                                                <option value="{{ $o->id }}" @if(in_array($o->id,$data->id_staff))  {{--@if($data->id_staff == $o->id)--}} selected  @endif>{{ $o->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">End Date <span style="color: red">*</span></p>
                                            <input required type="datetime-local" class="font-weight-semibold form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate" @if($data->end_date != null) value="{{ date('Y-m-d\TH:i', strtotime($data->end_date)) }}" @endif>
                                            {{-- <input type="time" class="form-control" name="timeendDate"> --}}
                                            @error('endDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <p style="font-weight: bold">Budget <span style="color: red">*</span></p>
                                            <input required type="number" class="font-weight-semibold form-control @error('budget') is-invalid @enderror" id="budget" name="budget" value="{{ $data->budget }}">
                                        </div>
                                        <div class="form-group">
                                            <p style="font-weight: bold">Service Type <span style="color: red">*</span></p>
                                            <input required type="text" class="font-weight-semibold form-control @error('service_type') is-invalid @enderror" id="service_type" name="service_type" value="{{ $data->service_type }}">
                                        </div>

                                        <div class="form-group" id="2" @if($data->status <> '2' ) style="display:none;" @endif>
                                            <p style="font-weight: bold">Work Completed  <span style="color: red">*</span></p>
                                            <input type="text" class="font-weight-semibold form-control @error('description_work_completed') is-invalid @enderror" id="description_work_completed" name="description_work_completed" value="{{ $data->description_work_completed }}">
                                        </div>

                                        <div class="form-group" id="3" @if($data->status <> '3' ) style="display:none;" @endif>
                                            <p style="font-weight: bold">Explanation of Pending Work  <span style="color: red">*</span></p>
                                            <input type="text" class="font-weight-semibold form-control @error('explanation_pending_work') is-invalid @enderror" id="explanation_pending_work" name="explanation_pending_work" value="{{ $data->explanation_pending_work }}">
                                        </div>

                                        <div class="form-group" id="4" @if($data->status <> '4' ) style="display:none;" @endif>
                                            <p style="font-weight: bold">Explanation of Cancelation Work  <span style="color: red">*</span></p>
                                            <input type="text" class="font-weight-semibold form-control @error('explanation_incomplete_work') is-invalid @enderror" id="explanation_incomplete_work" name="explanation_incomplete_work" value="{{ $data->explanation_incomplete_work }}">
                                        </div> 
                                        
                                        <div class="form-group" id="5" @if($data->status <> '5' ) style="display:none;" @endif>
                                            <p style="font-weight: bold">Work On Going  <span style="color: red">*</span></p>
                                            <input type="text" class="font-weight-semibold form-control @error('description_on_going') is-invalid @enderror" id="description_on_going" name="description_on_going" value="{{ $data->description_on_going }}">
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p style="font-weight: bold">Tags <span style="color: red">*</span></p>
                                        {{--<input type="text" @if($data->tagging != null )value="{{ implode(',', $data->tagging) }}" @endif class="form-control" style="width: 100%" data-role="tagsinput" placeholder="Add tags" id="tagging" />--}}
                                            <select required class="text-capitalize js-example-basic-single form-control select-fixed-multiple" multiple="multiple" data-fouc id="tagging">
                                                @foreach($showProject as $Project)
                                                <option value="{{ $Project->project_name }}" @if(in_array($Project->project_name,$data->tagging))  {{--@if($data->id_staff == $o->id)--}} selected  @endif>{{ $Project->project_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <p style="font-weight: bold">Priority Level <span style="color: red">*</span></p>
                                            <select required class="text-capitalize js-example-basic-single form-control" name="priority_level" id="priority_level">
                                                <option value="" disabled>Select Priority Level</option>
                                                <option value="Urgent" {{$data->priority_level == 'Urgent' ? 'selected' : ''}}>Urgent</option>
                                                <option value="High" {{$data->priority_level == 'High' ? 'selected' : ''}}>High</option>
                                                <option value="Medium" {{$data->priority_level == 'Medium' ? 'selected' : ''}}>Medium</option>
                                                <option value="Low" {{$data->priority_level == 'Low' ? 'selected' : ''}}>Low</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold"> Received Work Order Date<span style="color: red">*</span></p>
                                            <input required type="datetime-local" class="font-weight-semibold form-control @error('delivered_date') is-invalid @enderror" id="delivered_date" name="delivered_date" value="{{ date('Y-m-d\TH:i', strtotime($data->delivered_date)) }}">
                                            @error('delivered_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <p style="font-weight: bold">Client Preference <span style="color: red">*</span></p>
                                            <input required type="text" class="font-weight-semibold form-control @error('client_preference') is-invalid @enderror" id="client_preference" name="client_preference" value="{{ $data->client_preference }}">
                                        </div>

                                        <div class="form-group">
                                        <p style="font-weight: bold"> Attachment <span style="color: red">*</span></p>
                                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_document">
                                                <i class="fa fa-file"></i> <b>Document</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover">
                                            <thead style="background-color: #293a50; color: #FFF;">
                                                <tr>
                                                    <td>Notes</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <textarea class="text-capitalize font-weight-semibold form-control" name="notes" id="notes" rows="2">{{ $data->notes }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover">
                                            <thead style="background-color: #293a50; color: #FFF;">
                                                <tr>
                                                    <td>Description</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <textarea required class="text-capitalize font-weight-semibold form-control" name="description" id="description" rows="2">{{ $data->description }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead style="background-color: #293a50; color: #FFF;">
                                                <tr>
                                                    <td>Action</td>
                                                    <td>Item</td>
                                                    <td>Quantity</td>
                                                </tr>
                                            </thead>
                                            <tbody id="element_table">
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary mt-2 mb-2" style="color: white" id="add_row"/><i class="icon-plus-circle2 mr-2"></i> Add New Item </button>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white d-sm-flex justify-content-sm-between align-items-sm-center">
                                            <div class="btn-group">
                                            {{--<div class="form-group">
                                                    <p style="font-weight: bold">Total Hourly Work</p>
                                                    <input required type="text" readonly class="font-weight-semibold form-control" name="total_hourtl_work" value="{{ $data->hourly_rate }} Hrs">
                                                </div>--}}
                                            </div>
            
                                            <div class="mt-2 mt-sm-0">
                                                <a href="/work_orders" class="btn btn-light ml-3">Close</a>
                                                <button type="button" class="btn bg-primary-400" id="save" form="form"><i class="icon-checkmark3 mr-2"></i> Save</button>
                                                <button type="button" class="btn bg-info-400" id="save_draft" form="form"> Save Draft</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <br/>
                                <div class="row">
                                @if (session('successUpdateTime'))
                                <div class="card-body">
                                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                        <span class="font-weight-semibold">{{ session('successUpdateTime') }}</span>
                                    </div>
                                </div>
                                @endif
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead style="background-color: #293a50; color: #FFF;">
                                                <tr>
                                                    <td align="center" width="5%">No</td>
                                                    <td width="55%" colspan='5'>Staff Name</td>
                                                {{--<td width="40%">Total Hourly Work</td>--}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $totall = 0;
                                                    $no     = 1;
                                                    foreach ($data->id_staff as $value){
                                                        $showStaff      = \App\Models\Staff::where('id',$value)->first();
                                                        echo"<tr class='text-capitalize font-weight-bold'>
                                                                <td align='center'>".$no ++.".</td>
                                                                <td colspan='5'>".$showStaff->name."</td>
                                                            </tr>";
                                                        

                                                        $showTimesheet  = \App\Models\TimeSheet::where('workorder_id',$data->id)->where('user_id', $value)->where('status', '1')->get();
                                                        foreach($showTimesheet as $value_timesheet){
                                                            echo"<tr class='font-weight-semibold'>
                                                                    <td></td>

                                                                    <td width='10%'>
                                                                    ".\Carbon\Carbon::parse($value_timesheet->time_start)->format('d M Y') ."
                                                                    </td>

                                                                    <td width='15%' align='center'>
                                                                    ".\Carbon\Carbon::parse($value_timesheet->time_start)->format('h:i A') ."
                                                                    -
                                                                    ".\Carbon\Carbon::parse($value_timesheet->time_end)->format('h:i A') ."
                                                                    </td>

                                                                    <td width='3%' align='center'>
                                                                    ".round(((((\Carbon\Carbon::parse($value_timesheet->time_end)->timestamp) - (\Carbon\Carbon::parse($value_timesheet->time_start)->timestamp))/60)/60),2)."
                                                                    </td>

                                                                    <td width='3%' align='center'>
                                                                    Hrs
                                                                    </td>

                                                                    <td>
                                                                        <a href='/time_sheet/update/{$value_timesheet->id}' > <i class='icon-pencil3'></i> Update </a> &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                        <a href='/time_sheet/delete/{$value_timesheet->id}' > <i class='icon-trash'></i> Delete </a>
                                                                    </td>
                                                                </tr>";
                                                        }
                                                        
                                                    }
                                                ?>
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </div>  
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Document -->
<div class="modal fade" id="modal_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Document Work Orders</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="upload_form" action="/upload/documents-workorders">
                @csrf
                <input type="hidden" name="work_number" value="{{ $data->order_number }}">
                <input type="hidden" name="work_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row" id="row">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="file" class="form-control-file" name="document">
                    <button class="btn btn-primary form-control" id="submit_document" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> uploading..." type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

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
                url: '{{url('')}}/upload/documents-workorders',
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
    });
    getProjectDocument();
    function getProjectDocument() {
        $('#row').html('');
        $.ajax({
          url: '{{url('')}}/work_orders/documents?work_id={{$data->id}}',
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
    $(function() {
        $('#status').change(function(){
            if($('#status').val() == '2') {
                $('#2').show(); 
            } else {
                $('#2').hide(); 
            } 

            if($('#status').val() == '3') {
                $('#3').show(); 
            } else {
                $('#3').hide(); 
            } 

            if($('#status').val() == '4') {
                $('#4').show(); 
            } else {
                $('#4').hide(); 
            } 

            if($('#status').val() == '5') {
                $('#5').show(); 
            } else {
                $('#5').hide(); 
            } 
        });
    });
  $(document).ready(function() {
        //console.log($("#tagging").tagsinput('items'))
        let i = 1;
        var select_item = function() {
            var sudah = $('#combination').val(
                $("#element_table .js-example-basic-single").map(function(index, element) {
                    return $(element).val();
                }).get().join("+")
            );
        };
        var add_row = function(value) {
            var new_row = $(`<tr class="tr_input">
                                            <td data-name="del" class="text-center">
                                                    <button name="del0" class='btn btn-sm btn-danger icon-trash' id="delete_row"></button>
                                                </td>
                                                <td onload="passVariable()">
                                                    <select class="js-example-basic-single selectproduct form-control" name="selectproduct" style="width: 100%" id="selectproduct_${value.id}">
                                                        <option>Select Product</option>
                                                        </select>
                                                </td>
                                                <td data-name="qty">
                                                    <input type="hidden" name="productid"  id="productid_${value.id}" value="${value.product_id}">

                                                    <input type="hidden" name="stock" id="stock_${value.id}" />
                                                    <input type="number" name='quantity' class="input quantity form-control" id="qty_${value.id}" value="${value.qty}" />
                                                    <small style="display: none; color: red; margin-left: 5px; margin-right: 5px; font-size: 12px; margin-top: 2px" id="reminder_${value.id}">stock level after: 1</small>
                                                </td>
                                        </tr>`).appendTo("#element_table");
            let product = JSON.parse({!!json_encode($showProduct)!!});

            product.forEach(element => {
                if (element.id == value.product_id) {
                    $(`#selectproduct_${value.id}`).append(`<option value="${element.id}|${element.name}|${element.price}|${element.stock}" selected>${element.name}</option>`);
                } else {
                    $(`#selectproduct_${value.id}`).append(`<option value="${element.id}|${element.name}|${element.price}|${element.stock}">${element.name}</option>`);
                }
            });

            select_item();
            
            new_row.find('.js-example-basic-single').select2({
                theme: "bootstrap",
                tags: true
            });
            new_row.find('.js-example-basic-single').on('change', select_item);
            new_row.find("#delete_row").click(function() {
                i--
                $(this).parents("tr").remove();
                select_item();
                totalprice();
            });
        };
        
        let data = JSON.parse({!!json_encode($workorder_items)!!});            
        data.forEach(element => {
            add_row(element);
        });
        
        let quantity = function() {
            $('.quantity').each(function (index, obj) {
                index++
                let get_id = obj['id'];
                let split_id = get_id.split('_')[1];
                $(`#${get_id}`).keyup(function(){
                    let qty = $(`#qty_${split_id}`).val();
                });
            });
        }


        let selectproduct = function() {
            $('.selectproduct').each(function (index, obj) {
                let get_id = obj['id'];
                let split_id = get_id.split('_')[1];
                $(`#selectproduct_${split_id}`).on('change', function() {
                    var str = this.value;
                    var tes = str.split("|");
                    var id = tes[0];
                    var description = tes[1];
                    var price = tes[2];
                    var stock = tes[3];
                    console.log(tes)
                    //$(`#description`).val(description);
                    $(`#unitprice_${split_id}`).val(price);
                    $(`#productid_${split_id}`).val(id);
                    $(`#stock_${split_id}`).val(stock);
                });
            });
        }
        selectproduct();
        quantity();

        $("#add_row").click(function() {
            i++
            add_row(i)
            selectproduct()
            quantity()
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "bootstrap",
            tags: true
        });
    });

    $('#qty').keyup(function() {
        var reminder = document.getElementById("reminder");
        let value = $('#qty').val();
        if (value == false) {
            reminder.style.display = 'none';
        } else {
            let stock_after = $('#stock').val() - value
            $('#reminder').text(`stock after level: ${stock_after}`);
            reminder.style.display = 'block';
        }
        console.log(value);
    });

    $(document).on('click', '#save', function() {
        swalInit.fire({
            title: 'Are you sure?',
            text: "Do you want to edit!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save it!'
        }).then((result) => {
            if (result.dismiss == "cancel") {
                return false 
            }
            if (result) {
                let product = [];
                let data = {
                    id_clients: $(`#client_id`).find(":selected").val(),
                    work_number: $(`#work_number`).val(),
                    startDate: $(`#startDate`).val(),
                    hourly_rate: $(`#hourly_rate`).val(),
                    title: $(`#title`).val(),
                    //id_staff: $(`#id_staff`).find(":selected").val(),
                    endDate: $(`#endDate`).val(),
                    budget: $(`#budget`).val(),
                    //tagging: $("#tagging").tagsinput('items'),
                    tagging: $("#tagging").val(),
                    id_staff: $("#id_staff").val(),
                    priority_level: $(`#priority_level`).find(":selected").val(),
                    delivered_date: $(`#delivered_date`).val(),
                    description: $(`#description`).val(),
                    status: $(`#status`).val(),
                    notes: $(`#notes`).val(),
                    description_work_completed: $(`#description_work_completed`).val(),
                    explanation_pending_work: $(`#explanation_pending_work`).val(),
                    explanation_incomplete_work: $(`#explanation_incomplete_work`).val(),
                    description_on_going: $(`#description_on_going`).val(),
                    workorder_type: $(`#workorder_type`).val(),
                    service_type: $(`#service_type`).val(),
                    client_preference: $(`#client_preference`).val(),
                }

                $('.selectproduct').each(function (index, obj) {
                        let get_id = obj['id'];
                        let split_id = get_id.split('_')[1];
                        product.push({
                            item_id: split_id,
                            product_id: $(`#productid_${split_id}`).val(),
                            qty: $(`#qty_${split_id}`).val(),
                        });
                    });
                data = {
                    ...data,
                    product
                }
                $.ajax({
                    url: "",
                    type: "post",
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: JSON.stringify(data)
                    },
                    success: function(res) {
                        if(res.success) {
                            return window.location = res.data.redirect_uri
                        }
                        return alert('failed added data');
                    }
                });
            }
        })
    });
</script>
@endpush