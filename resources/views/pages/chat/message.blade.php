@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Works Order</span></h4>
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
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Messages</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <div id="filters" style="display: none;">
                        <button type="button" class="dropdown-item" onclick="deleteWorkOrder()"><i class="icon-trash red-text"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->
    
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-body">
                    <form action="/add_message/chat" method="post">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <p style="font-weight: bold">Staff <span style="color: red">*</span></p>
                                    <select required class="text-capitalize js-example-basic-single form-control" name="id_staff" id="id_staff">
                                        <option value="">Select Staff</option>
                                        @foreach($showStaff as $field)
                                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right mt-4"><b><i class="icon-profile"></i></b> Chat Now</button>
                                </div>
                            </div>
                        </div>
                    @csrf 
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(function() {
    let params = (new URL(document.location)).searchParams;
    let filter = params.get("filter");
    var table = $('#Example1').DataTable({
        paging: true,
        processing: false,
        serverSide: false,
        select: true,
        autowidth: false,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="table-active table-border"><td colspan="5" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
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
        ajax: function (data, callback) {
            $.ajax({
                url: '{{ url('/')}}',
                'data': {
                    ...data,
                },
                dataType: 'json',
                beforeSend: function () {
                    // Here, manually add the loading message.
                    $('#Example1 > tbody').html(
                            '<tr class="odd">' +
                            '<td valign="top" colspan="5" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                            '</tr>'
                            );
                },
                success: function (res) {
                    callback(res);
                }
            })
        },
        columns: [
            /*{data: null, mRender: function (data, type, full) {
                    return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
                }},*/
            {data: null, name: 'Works Order Number', render: function (data, type, row) {
                return `
                    <div class="list-icons font-weight-semibold">
                        <input type="checkbox" class="checkbox" id="" value="${row.id}"> 
                        <a id="btn_edit" href="/work_orders/detail/${row.id}">#${row.order_number}</a>
                    </div>`
            }},
            {data: 'workorder_date', name: 'Period', render: function (data, type, row) {
                return moment(row.workorder_date).format('MMM Y');
            }},
            {data: 'full_name', name: 'Client Name'},
            {data: 'start_date', name: 'Start Date'},
            {data: 'end_date', name: 'End Date'},
            {data: null, name: 'Description', mRender: function (data, type, full) {
                return data.title+'<br/>'+data.description;
            }},
            { data: 'status', mRender: function(data, type, row) {
                    let badgee = null;
                    let bagde_status = null;
                    if(row.status == 1) {
                        badgee = 'badge-light';
                        bagde_status = 'Draft';
                    }
                    if(row.status == 2){
                        badgee = 'badge-success';
                        bagde_status = 'Finish';
                    }
                    if(row.status == 3){
                        badgee = 'badge-warning';
                        bagde_status = 'Pending';
                    }
                    if(row.status == 4){
                        badgee = 'badge-danger';
                        bagde_status = 'Cancled';
                    }
                    if(row.status == 5){
                        badgee = 'badge-info';
                        bagde_status = 'On Going';
                    }
                    if(row.status == 6){
                        badgee = 'badge-primary';
                        bagde_status = 'Waiting Approval';
                    }
                    return `<a href="/work_orders/edit_work_order/${row.id}" class="badge ${badgee} align-top" style="font-size: 9pt;">${bagde_status}</a>`;
                            /*<ul class="list list-unstyled mb-0">
                                <li class="dropdown">
                                    <a href="#" class="badge ${badgee} align-top dropdown-toggle" data-toggle="dropdown" style="font-size: 9pt;">${bagde_status}</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=1" class="dropdown-item ${row.status == 1 ? 'active': ''}">Draft</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=2" class="dropdown-item ${row.status == 2 ? 'active': ''}">Finish</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=3" class="dropdown-item ${row.status == 3 ? 'active': ''}">Pending</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=4" class="dropdown-item ${row.status == 4 ? 'active': ''}">Cancled</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=5" class="dropdown-item ${row.status == 5 ? 'active': ''}">On Going</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=6" class="dropdown-item ${row.status == 6 ? 'active': ''}">Waiting Approval</a>
                                    </div>
                                </li>
                            </ul>`;*/
            }},
            {data: null,  mRender: function (data, type, full) {
                    return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/work_orders/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/work_orders/edit_work_order/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="/work_orders/delete/${data.id}" class="dropdown-item"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
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
    
    function deleteWorkOrder(id) {
        var work_order_id = [];
        if (id != null) {
            work_order_id.push(id)
        } else {
            $("input:checkbox[class=checkbox]:checked").each(function () {
                work_order_id.push($(this).val());
            });
        }
        swalInit.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.dismiss == "cancel") {
                    return false 
                }
            if (result) {
                $.ajax({
                    url: '{{ url('/')}}//work_orders/delete',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: work_order_id
                    },
                    dataType: 'json',
                    success: function(res){
                        if (res.success) {
                        swalInit.fire('Deleted!', '', 'success');
                        $('#Example1').DataTable().ajax.reload();
                        }
                    }
                })
            }
        })
    }

    $("#Example1").on('change',"input[type='checkbox']",function(e){
        var x = [];
        var filter = document.getElementById("filters");
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


    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            theme: "bootstrap"
        });
        $("input[name$='status']").click(function () {
            var test = $(this).val();
            $("div.desc").hide(    );
            $("#" + test).show();
        });

        $('#project_name').on('change', function () {
            let company = $(this).find(':selected').data("company");
            $('#company').val(company);
        });
    });
</script>
@endpush