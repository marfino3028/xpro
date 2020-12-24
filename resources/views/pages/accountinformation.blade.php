@extends('layouts.index')

@section('title')
X Pro - Account Information
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h6>Account information (#2112452)</h6>
                        </div>

                        <div class="col-4">
                            <h6>Support PIN: 9782</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Account Information  </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3>Xpro</h3>
                            <h6>xprozekkef@onlineinvoices.com</h6>
                            <h6>unit g8 48 alexandria street, nsw 2015</h6>
                        </div>



                        <div class="col-4">
                            <h6><b>Default Currency: </b> AUD</h6>
                            <h6><b>Time Zone: </b> (UTC+10:00) Sydney</h6>
                            <h6><b>Date Format: </b> d/m/Y (27/03/2020)</h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Account Plan  </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="badge badge-success">Free</h1>
                            <br>
                            <button type="submit" class="btn btn-sm btn-success mb-2 "> Upgrade</button>
                            <button type="submit" class="btn btn-sm btn-success mb-2 "> Accounts Management Dashboard</button>

                        </div>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Account Data   </h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-8">

                            <label for="" class="">Invoices (Current Month): </label>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <br>

                            <label for="" class="">Clients: </label>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                            </div>
                            <br>

                            <label for="" class="">Estimates (Current Month): </label>
                            <div class="progress">
                                <div class="progress-bar bg-success " role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <br>

                            <label for="" class="">Documents: </label>
                            <div class="progress">
                                <div class="progress-bar bg-success " role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <br>

                            <label for="" class="">Staff: </label>
                            <div class="progress">
                                <div class="progress-bar bg-success " role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-success mb-2 "> <i class="fas fa-download"></i> Download Backup  </button>
            <button type="submit" class="btn btn-sm btn-danger mb-2 "> <i class="fas fa-window-close"></i> Cancel this Account  </button> 
        </div>
    </section>
</div>
@endsection
