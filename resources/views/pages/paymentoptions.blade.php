@extends('layouts.index')

@section('title')
X Pro - Payment Options
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payment Options</h6>
                    <div class="card-body" id="cardMoreOptions">
                        <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3" role="alert">
                            <i class="fas fa-question-circle"></i>
                            <strong>Information!</strong>
                            <br>
                            <p>There are various Payment Gateway integrations built into the Online Invoices system. To enable them to be used by clients to make payments to you, you will first need to have an account with that provider. You will then need to enter the relevant username and/or password, and then 'activate' that Gateway for your system. <br>	
                                You can choose at any time to disable any of the Gateways, without having to delete it from the system, and re-enable as required.</a></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection