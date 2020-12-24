@extends('layouts.index')

@section('title')
X Pro - Clients Detail
@endsection

@section('content')

<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Clients</h6>
                    <div class="main-body">    
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <h4>Business Name :</h4>
                                            <div class="mt-3">
                                                <h5>{{$show[0] -> business_name}}</h4><br>
                                                    <p class="text-secondary mb-1">{{$show[0] -> status}}</p>
                                                    <br>
                                                    <a href="/manage_suppliers/Edit/{{ $show[0]->id }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> first_name}} {{$show[0] -> last_name}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> email}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telephone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> telephone}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> mobile}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address 1</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> address1}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address 2</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> address2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Notes</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$show[0] -> notes}}
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
    </section>
</div>
@endsection
