@extends('masters/index_1')

@section('title')
    X Pro - SMTP Settings
@endsection

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Email Settings</h6>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif
            <form action="/smtp_settings/update" method="POST" id="form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#newinvoice" class="d-block card-header py-3" data-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">New Invoice Template</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="newinvoice">
                                <div class="card-body">
                                    <p style="font-weight: bold">Subject <span style="color: red">*</span></p>
                                    <input type="text" class="form-control mb-4" name="subject_new_invoice" value="{{ $email_template->subject_new_invoice }}" required />
                                    <p style="font-weight: bold">Body <span style="color: red">*</span></p>
                                    <textarea name="body_new_invoice" form="form">{{ $email_template->body_new_invoice }}</textarea>
                                    <script>
                                        CKEDITOR.replace('body_new_invoice');

                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#paymentreceived" class="d-block card-header py-3" data-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Payment Received Template</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="paymentreceived">
                                <div class="card-body">
                                    <p style="font-weight: bold">Subject <span style="color: red">*</span></p>
                                    <input type="text" class="form-control mb-4" name="subject_payment_received"
                                        form="form" value="{{ $email_template->subject_payment_received }}" required />
                                    <p style="font-weight: bold">Body <span style="color: red">*</span></p>
                                    <textarea name="body_payment_received" form="form">{{ $email_template->body_payment_received }}</textarea>
                                    <script>
                                        CKEDITOR.replace('body_payment_received');

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#smtp" class="d-block card-header py-3" data-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">SMTP</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="smtp">
                                <div class="card-body">
                                    <label for="exampleFormControlInput1">Sender Email</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="sender_email" value="{{ $data->sender_email }}" placeholder="Sender email">
                                    <br>
                                    <label for="exampleFormControlInput1">SMTP Host</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput11" name="smtp_host"
                                        value="{{ $data->smtp_host }}" placeholder="Smtp host">
                                    <br>
                                    <label for="exampleFormControlInput1">SMTP Port</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput12" name="smtp_port"
                                        value="{{ $data->smtp_port }}" placeholder="Smtp port">
                                    <br>
                                    <label for="exampleFormControlInput1">SMTP Username</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput4"
                                        name="smtp_username" value="{{ $data->smtp_username }}" placeholder="Smtp username">
                                    <br>
                                    <label for="exampleFormControlInput1">SMTP Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput4"
                                        name="smtp_password" value="{{ $data->smtp_password }}" placeholder="Smtp Password">
                                    <br>
                                    <label for="exampleFormControlInput1">SMTP Security</label>
                                    <select class="custom-select" name="smtp_security">
                                        <option selected>Select Security</option>
                                        <option value="ssl" @if ($data->smtp_security == 'ssl') selected
                                            @endif>SSL</option>
                                        <option value="tls" @if ($data->smtp_security == 'tls') selected
                                            @endif>TLS </option>
                                    </select>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4 text-right">
                            <!-- Card Content - Collapse -->
                            <div class="card-body">
                                <a href="/settings" class="btn btn-icon btn-outline-secondary header-button-top">
                                    <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                    <span class="btn-inner--text">Cancel</span>
                                </a>
                                <button type="submit" class="btn btn-success btn-icon-split col-auto ml-3" form="form">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
