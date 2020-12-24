@extends('layouts.index')

@section('title')
X Pro - Edit Appointments
@endsection

@section('content')
@if (session('add'))
<div class="alert alert-success">
    {{ session('add') }}
</div>
@endif
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/appointments" class="breadcrumb-item">Edit Appointments</a>
                    <span class="breadcrumb-item active">Archive</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit Appointments</h5>
                <div class="header-elements">
                    <div class="list-icons">
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('updateappointments', ['id' => $showData[0]->id ]) }}" method="post">
                            <label>Clients</label>
                                <select class="select-dropdown custom-select" id="select1" name="id_clients">
                                    <option value="">Select Clients</option>
                                    @foreach($showClient as $field)
                                    <option value="{{ $field -> id}}" {{$field ->id == $showData[0]->id_clients ? 'selected' : ''}}>{{ $field -> full_name}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col">
                        <label>Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="date" value="{{$showData[0]->getDate}}">
                    </div>
                    <div class="col">
                        <label>Purpose</label>
                        <input class="form-control" type="text" name="purpose" value="{{$showData[0]->purpose}}">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="3">{{$showData[0]->note}}</textarea>
                </div>
                <br>

                <!-- <label for="Asign Staff"> Asign Staff</label><br> -->
                <input type="checkbox" id="myCheck"  onclick="myFunction()">
                <label for="Recurring"> Recurring</label>
                <div class="form-group" id="dropdown1" style="display:none">
                    <div class="row">
                        <div class="col">
                            <label>Frequency</label>
                            <select class="custom-select" name="frequency">
                                <option value="Weekly">Weekly</option>
                                <option value="2 Weeks">2 Weeks</option>
                                <option value="4 Weeks">4 Weeks</option>
                                <option value="2 Months">2 Months</option>
                                <option value="4 Months">4 Months</option>
                                <option value="6 Months">6 Months</option>
                                <option value="Yearly">Yearly</option>
                                <option value="2 Year">2 Year</option>
                            </select>
                        </div>
                        <div class="col">
                            <label> End Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="end_date" value="{{$showData[0]->recurring_end_date}}">
                        </div>
                    </div>
                </div>
                <div class="form-group" id="dropdown2">
                    <label for="staff">Asign Staff</label><br>
                    <select id="select1" class="custom-select" name="staff">
                        <option value="">Select Staff</option>
                        @foreach($showStaff as $field)
                        <option value="{{ $field -> id}}" {{$field ->id == $showData[0]->id_staff ? 'selected' : ''}}>{{ $field -> name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3 mb-3">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            @csrf
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#selectItem').on('change', function () {
        // alert( this.value );
        // console.log(this.value)
        var str = this.value;
        var tes = str.split("|");
        console.log(tes);
        var id = tes[0];
        var description = tes[1];
        var price = tes[2];
        $('#description').val(description);
        $('#unitprice').val(price);
        $('#idProduct').val(id);
        // $('#subtotal').val(price);
    });
</script>
<script>
    $(".input").on('input', function () {
        var x = document.getElementById('unitprice').value;
        x = parseFloat(x);
        var y = document.getElementById('qty').value;
        y = parseFloat(y);
        document.getElementById('subtotal').value = x * y;
    });
</script> 
<script>
    $(document).ready(function () {
        $("input[name$='radioInput']").click(function () {
            var test = $(this).val();
            $("div.desc").hide();
            $("#" + test).show();
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#cardClientDetails").hide();
        $("#showClientDetails").click(function (e) {
            e.preventDefault();
            $("#cardClientDetails").show();
            $(this).show();
        });
    });
</script>
<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("dropdown1");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
<script>
    function myFunction2() {
        var checkBox = document.getElementById("myCheck2");
        var text = document.getElementById("dropdown2");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function () {
        $("#cardMoreOptions").hide();
        $("#showMoreOptions").click(function (e) {
            e.preventDefault();
            $("#cardMoreOptions").show();
            $(this).show();
        });
    });
</script>


<!-- More -->
<script>
    $(document).ready(function () {
        $("#add_row").on("click", function () {
            // Dynamic Rows Code

            // Get max row id and set new id
            var newid = 0;
            $.each($("#tab_logic tr"), function () {
                if (parseInt($(this).data("id")) > newid) {
                    newid = parseInt($(this).data("id"));
                }
            });
            newid++;

            var tr = $("<tr></tr>", {
                id: "addr" + newid,
                "data-id": newid
            });

            // loop through each td and create new elements with name of newid
            $.each($("#tab_logic tbody tr:nth(0) td"), function () {
                var td;
                var cur_td = $(this);
                var children = cur_td.children();

                // add new td and element if it has a nane
                if ($(this).data("name") !== undefined) {
                    td = $("<td></td>", {
                        "data-name": $(cur_td).data("name")
                    });
                    console.log($(children[0]))

                    var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                    c.attr("name", $(cur_td).data("name") + newid);
                    c.appendTo($(td));
                    td.appendTo($(tr));
                } else {
                    td = $("<td></td>", {
                        'text': $('#tab_logic tr').length
                    }).appendTo($(tr));
                }
            });

            // add delete button and td

            // $("<td></td>").append(
            //     $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
            //         .click(function() {
            //             $(this).closest("tr").remove();
            //         })
            // ).appendTo($(tr));


            // add the new row
            $(tr).appendTo($('#tab_logic'));

            $(tr).find("td button.row-remove").on("click", function () {
                $(this).closest("tr").remove();
            });
        });




        // Sortable Code
        var fixHelperModified = function (e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();

            $helper.children().each(function (index) {
                $(this).width($originals.eq(index).width())
            });

            return $helper;
        };

        $(".table-sortable tbody").sortable({
            helper: fixHelperModified
        }).disableSelection();

        $(".table-sortable thead").disableSelection();



        $("#add_row").trigger("click");

    });
</script>
<script>
    tail.select('#select1', {
        search: true
    });
    tail.select('#selectItem', {
        search: true
    });
</script>
<script>
    function myFunctionTwo() {
        var checkBox = document.getElementById("addShipping");
        var text = document.getElementById("Shipping");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
<script>
    function myFunctionThree() {
        var checkBox = document.getElementById("addShipping2");
        var text = document.getElementById("Shipping2");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
@endpush