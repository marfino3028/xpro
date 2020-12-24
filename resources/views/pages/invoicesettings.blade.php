@extends('layouts.index')

@section('title')
X Pro - Invoice Settings
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Invoices Settings</h6>
                </div>

                <div class="card-body" id="cardMoreOptions">
                    <!-- Nav tabs -->
                    @if (session('add'))
                    <div class="alert alert-success">
                        {{ session('add') }}
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                    @endif
                    @if (session('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                    @endif
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu1">General Invoice / Estimate
                                Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Invoice / Estimate Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Tax Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Invoice Template</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="menu1" class=" tab-pane active ml-3"><br>
                            <form action="/invoice_setting/general-update" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}" />
                                <div class="form-group">
                                    <div class="row" style="justify-content: space-between">
                                        <div class="col-md-6 mb-2">
                                            <p style="font-weight: bold">Number Prefix</p>
                                            <div class="input-group input-group-merge ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-font"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Number prefix"
                                                       name="number_prefix" value="{{ $data->number_prefix }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <p style="font-weight: bold">Number Digit</p>
                                            <div class="input-group input-group-merge ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-text-width"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Number Digit"
                                                       name="number_digit" value="{{ $data->number_digit }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row" style="justify-content: space-between">
                                        <div class="col-md-6 mb-2">
                                            <p style="font-weight: bold">Next Number</p>
                                            <div class="input-group input-group-merge ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Number prefix"
                                                       name="next_number" value="{{ $data->next_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 ml-2">
                                    <label for="disabledTextInput">Next Invoice Number</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="INV-" disabled>
                                </div>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                    <label class="form-check-label" for="exampleCheck1">Enable changing invoice number for
                                        each invoice</label>
                                </div>
                                <br>
                                <div class="col-auto">
                                    <label for="">Invoicing Method </label><br>
                                    <select class="custom-select" style="width: 400px;">
                                        <option value="1">Print (Hard Copy)</option>
                                        <option value="2">Electronically via Email</option>
                                        <option selected value="3">Both</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-auto">
                                    <label for="">Zero Fraction Appearing </label><br>
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected value="1">Auto</option>
                                        <option value="2">Show Always</option>
                                        <option value="3">Hide Always</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Disable Invoice Items edit</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck1">Disable Estimates Module</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                    <label class="form-check-label" for="exampleCheck1">Enable Invoice Manual
                                        Statuses</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                    <label class="form-check-label" for="exampleCheck1">Enable Estimate Manual
                                        Statuses</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                    <label class="form-check-label" for="exampleCheck1">Disable shipping options</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                    <label class="form-check-label" for="exampleCheck1">Enable Maximum Discount</label>
                                </div>
                                <br>
                                <div class="form-check col-auto ml-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck" name="disable_footer"
                                           value="1" @if ($data->disable_footer) checked
                                           @endif>
                                           <label class="form-check-label" for="exampleCheck1">Disable Footer</label>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-success btn-icon-split col-auto ml-3">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="text">Save</span>
                                </button>
                            </form>
                        </div>

                        <div id="menu2" class=" tab-pane fade"><br>
                            <a href="#" class="btn btn-success btn-icon-split col-auto ml-3">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">New Layout</span>
                            </a>
                            <br>
                            <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3" role="alert">
                                <i class="fas fa-question-circle"></i>
                                <strong>Information!</strong>
                                <br>
                                <p>No invoice or estimate layouts found <a href="">Click here to create a new layout</a></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                        <div id="menu3" class=" tab-pane fade"><br>
                            <a href="#" class="btn btn-success btn-icon-split col-auto ml-3" data-toggle="modal"
                               data-target="#tax_settings">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tax settings</span>
                            </a>
                            <br>
                            <div class="card-body">
                                <div class="row clearfix">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                            <thead>
                                                <tr>

                                                    <th class="text-center">
                                                        Tax Name
                                                    </th>
                                                    <th class="text-center">
                                                        Tax Value
                                                    </th>
                                                    <th class="text-center">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tax as $value)
                                                <tr id='addr0' data-id="0" class="hidden">
                                                    <td data-name="desc" class="text-center">
                                                        {{ $value->name }}
                                                    </td>
                                                    <td data-name="unitprice" class="text-center">
                                                        {{ $value->value }}
                                                    </td>
                                                    <td data-name="del" class="text-center">
                                                        <a name="del0" href="/settings/tax/delete?tax_id={{ $value->id }}" class='btn btn-danger glyphicon glyphicon-remove row-remove'>
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="menu4" class=" tab-pane fade"><br>
                            <a href="#" class="btn btn-success btn-icon-split col-auto ml-3">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Invoice Template</span>
                            </a>
                            <br>
                            <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3" role="alert">
                                <i class="fas fa-question-circle"></i>
                                <strong>Information!</strong>
                                <br>
                                <p>No invoice or estimate layouts found <a href="">Click here to create a new layout</a></p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tax_settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form method="POST" action="/settings/tax">
                            @csrf
                            <div class="modal-body">
                                <div class="row" style="justify-content: space-between">
                                    <div class="col-md-6 mb-2">
                                        <p style="font-weight: bold">Name <span style="color: red">*</span></p>
                                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="tax_name" required />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <p style="font-weight: bold">Tax Value <span style="color: red">*</span></p>
                                        <input type="number" class="form-control mb-2" placeholder="Enter value" name="tax_value" required />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            theme: "bootstrap",
            tags: true
        });
    });

</script>
@endsection
