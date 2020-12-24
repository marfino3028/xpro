@extends('layouts.index')

  @section('title')
  X Pro - Create Appointments
  @endsection

  @push('css')
    <style>
    .table-sortable tbody tr {
      cursor: move;
    }
      .table-responsive{
        z-index: 3;
      }
    </style>
  @endpush

    @section('content')
    @if (session('add'))
    <div class="alert alert-success">
      {{ session('add') }}
    </div>
    @endif
    <br>
    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Appointments</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <form action="{{ route('addappointments') }}" method="post">
            <label>Clients</label>
            <br>
            <!-- <label>Clients</label> -->
            <div class="mt-1">
              <select class="select-dropdown custom-select" id="select1" name="id_clients">
                <option selected="">Select Clients</option>
                @foreach($showClient as $field)
                <option value="{{ $field -> id}}">{{ $field -> full_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col">
            <label>Date</label>
            <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="date">
          </div>
          <div class="col">
            <label>Purpose</label>
            <input class="form-control" type="text" name="purpose">
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="description">Note</label>
          <textarea class="form-control" id="note" name="note" rows="3"></textarea>
        </div>
        <br>
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
              <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="end_date">
            </div>
          </div>
        </div>
        <br>
        <br>
        <input type="checkbox" id="myCheck2"  onclick="myFunction2()">
        <label for="Asign Staff"> Asign Staff</label>
        <div class="form-group" id="dropdown2" style="display:none">
          <label for="staff">Select Staff</label><br>
          <select id="select1" class="custom-select" name="staff">
            <option value="45">Select Staff</option>
            @foreach($showStaff as $field)
            <option value="{{ $field -> id}}">{{ $field -> name}}</option>
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

    @endsection

    @push('js')
    <script>
      $('#selectItem').on('change', function() {
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
      $(".input").on('input',function(){
        var x = document.getElementById('unitprice').value;
        x = parseFloat(x);
        var y = document.getElementById('qty').value;
        y = parseFloat(y);
        document.getElementById('subtotal').value = x*y;
      });
    </script> 
    <script>
      $(document).ready(function() {
        $("input[name$='radioInput']").click(function() {
          var test = $(this).val();
          $("div.desc").hide();
          $("#" + test).show();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#cardClientDetails").hide();
        $("#showClientDetails").click(function(e){
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
        if (checkBox.checked == true){
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
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
       text.style.display = "none";
     }
   }
 </script>
 <script>

  $(document).ready(function(){
    $("#cardMoreOptions").hide();
    $("#showMoreOptions").click(function(e){
      e.preventDefault();
      $("#cardMoreOptions").show();
      $(this).show();
    });
  });
</script>


<!-- More -->
<script>
  $(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
            newid = parseInt($(this).data("id"));
          }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
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
        
        $(tr).find("td button.row-remove").on("click", function() {
         $(this).closest("tr").remove();
       });
      });




    // Sortable Code
    var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
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
    if (checkBox.checked == true){
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
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
     text.style.display = "none";
   }
 }
</script>
@endpush