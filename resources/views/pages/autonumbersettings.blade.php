@extends('layouts.index')

@section('title')
X Pro - Auto Number Settings
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Numbering Sequence</h6>
                </div>
                <div class="card-body" id="cardMoreOptions">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu1">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu3">Estimate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu4">Refund Receipt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu5">Credit Note</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Content Categories -->
                        <div id="menu1" class=" tab-pane active"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu2" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu3" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu4" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu5" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card-2 -->

        <div class="content-wrapper">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Numbering Sequence</h6>
                </div>
                <div class="card-body" id="cardMoreOptions">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu6">Purchase Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu7">Purchase Refund</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu8">Work Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu9">Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#menu10">Journal</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Content Categories -->
                        <!-- Content Categories -->
                        <div id="menu6" class=" tab-pane active"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu7" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu8" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu9" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                        <div id="menu10" class=" tab-pane fade"><br>
                            <form action="" class="ml-3">
                                <label for="">Current Number</label>
                                <div class="row">
                                    <input type="number" class="form-control ml-3" style="width: 300px;">
                                    <select class="custom-select" style="width: 400px;">
                                        <option selected>Numeric Digits</option>
                                        <option value="1">Lowercase hex numbers</option>
                                        <option value="2">Uppercase hex numbers</option>
                                        <option value="3">Lowercase letters</option>
                                        <option value="4">Uppercase letters</option>
                                        <option value="5">Lowercase letters followed by numeric digits</option>
                                        <option value="6">Uppercase letters followed by numeric digits</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="">Number of digit: </label>
                                    <input type="number" class="form-control" style="width: 700px;">
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Add Prefix</label>
                                </div>
                                <br>
                                <button class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection