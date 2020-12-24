@extends('layouts.index')

@section('title')
X Pro - SMS Settings
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Invoices Settings</h6>

                    <div class="card-body" id="cardMoreOptions">
                        <div class="alert alert-warning alert-dismissible fade show mt-3 ml-3" role="alert">
                            <i class="fas fa-question-circle"></i>
                            <strong>Information!</strong>
                            <br>
                            <p>You can send SMS via the system using one of the following Online SMS providers, the steps are simple, just open an account on any of the following SMS providers, configure your account and buy SMS credits, select it, and enter your account credentials here</a></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  
                        <div class="row">
                            <div class="card ml-5 mb-4 mt-5" style="width: 18rem;">
                                <img src="{{ asset('img/plivo.png') }}" class="card-img-top" style="height: 15rem;">
                                <div class="card-body" style="background-color: gainsboro;">
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <button class="dropbtn">Plivo</button>
                                            <div class="dropdown-content">
                                                <a href="#">Open Website</a>
                                                <a href="#">Configure</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card ml-5 mb-4 mt-5" style="width: 18rem;">
                                <img src="{{ asset('img/twilio.png') }}" class="card-img-top mb-5" style="height: 11rem;">
                                <div class="card-body mt-3" style="background-color: gainsboro; height: 5rem;">
                                    <div class="dropdown">
                                        <button class="dropbtn">Plivo</button>
                                        <div class="dropdown-content">
                                            <a href="#">Open Website</a>
                                            <a href="#">Configure</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection