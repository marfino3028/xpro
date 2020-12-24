@extends('layouts.index')

@section('title')
X Pro - Purchase Order Settings
@endsection

@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Purchase Order Settings</h6>
                    <div class="card-body" id="cardMoreOptions">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu1">Purchase Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Purchase Order / Refund Layouts</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Content Purchase Orders -->
                            <div id="menu1" class=" tab-pane active"><br>
                                <div class="form-group">
                                    <label for="disabledTextInput" class="mr-5">Next P.O Number</label>
                                    <a  href="" class="far fa-edit ml-5" style="font-size: 12px;"> Auto Number Settings</a><br>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="0005" disabled  style="width: 350px;">
                                </div>
                                <div class="form-check col-auto">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked="checked">
                                    <label class="form-check-label" for="exampleCheck1">Update product prices after purchase order</label>
                                </div>
                                <a href="#" class="btn btn-success btn-icon-split">
                                    <span class="text">Save</span>
                                </a>
                            </div>
                            <!-- Content Purchase Order / Refund Layouts -->
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
                                    <p>No Purchase Order layouts found <a href="">Click here to create a new layout</a></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
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
