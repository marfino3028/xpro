@extends('layouts.index')

@section('title')
X Pro - Cost Centers
@endsection


@section('content')
<br/>
<div class="content-wrapper">
    <section class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cost Centers</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-outline-primary mb-2 dropdown-toggle" data-toggle="dropdown"><i class="fas fa-chart-pie"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Cost Center Report</a>
                                <a class="dropdown-item" href="#">Accounts without Cost Center</a>
                                <a class="dropdown-item" href="#">Account with Cost Center</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2"><i class="fas fa-plus"></i> Add Cost Centers</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Cost Centers</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-outline-danger mb-2 "><i class="fas fa-trash"> </i> Delete</button>
                    </div>
                </div>

                <br>

                <div class="table-responsive">
                    <table class="table" id="dataTableMultii" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>1</td>
                                <td>Sahtia Murti</td>
                                <td>123</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary mb-2">Transaction</button>
                                    <button type="submit" class="btn btn-outline-info mb-2">Actions</button>
                                    <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>2</td>
                                <td>Saht</td>
                                <td>3</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary mb-2">Transaction</button>
                                    <button type="submit" class="btn btn-outline-info mb-2">Actions</button>
                                    <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger mb-2"><i class="fas fa-delete"></i> Delete</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
