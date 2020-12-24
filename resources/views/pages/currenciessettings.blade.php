@extends('layouts.index')

@section('title')
X Pro - Currencies Setings
@endsection

@section('content')
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
<br>

<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h2 class="d-inline-flex mb-0 long-texts" style="font-family: 'Open Sans', sans-serif">Currencies Settings</h2>
                    <div class="content-header d-flex justify-content-between">
                        <div>
                        </div>
                        <div class="col-auto justify-content-end">
                            <a href="/create_invoice" class="btn btn-sm btn-outline-success mb-2" id="btn_new_operator">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                            
                        </div>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-auto" id="filter" style="display: none">
                                <form>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-envelope"> </i> Send to
                                        Client</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-check"> </i> Mark as
                                        Paid</button>
                                    <button type="submit" class="btn btn-sm btn-outline-warning mb-2 "><i class="fas fa-file-pdf"> </i> Print
                                        PDF</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-file-export"> </i>
                                        Export</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mb-2 "><i class="fas fa-sms "> </i> SMS</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="Example1" class="table">
                                    <br>
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="text-left" style="width: 3.5%">#</th>
                                            <th class="text-left">Name</th>
                                            <th>Code</th>
                                            <th>Rate</th>
                                            <th class="text-center">Enabled</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <input type="checkbox">
                                            </td>
                                            <td>Indonesia</td>
                                            <td>IDR</td>
                                            <td>1.2</td>
                                            <td class="text-center">
                                                <input type="checkbox" data-size="small" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td class="text-center">
                                                <a href="#" title="Edit" class="btn btn-sm btn-outline-primary"  >
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" title="Delete" class="btn btn-sm btn-outline-danger"  >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="add_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" action="/settings/tax">
                @csrf
                <div class="modal-body">
                    <div class="row" style="justify-content: space-between">
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Date <span style="color: red">*</span></p>
                            <input type="text" class="form-control mb-2" placeholder="Enter date" name="date" required />
                        </div>
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Amount <span style="color: red">*</span></p>
                            <input type="number" class="form-control mb-2" placeholder="Enter amount" name="amount" required />
                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between">
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Account <span style="color: red">*</span></p>
                            <input type="text" class="form-control mb-2" placeholder="Enter account" name="account" required />
                        </div>
                        <div class="col-md-6 mb-2">
                            <p style="font-weight: bold">Currency</p>
                            <input type="text" class="form-control mb-2" placeholder="Enter currency" name="currency"/>
                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between">
                        <div class="col-md-12 mb-2">
                            <p style="font-weight: bold">Description</p>
                            <textarea class="form-control mb-2" rows="4" name="description" placeholder="Place description"></textarea>
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
@endsection

@section('js')
<script>
function deleteInvoice() {
    event.preventDefault();
    var form = event.target.form;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
}
var x = [];
$("input[type='checkbox']").change(function () {
    var filter = document.getElementById("filter");
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

</script>
@endsection
