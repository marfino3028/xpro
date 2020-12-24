@extends('masters/index_1')

@section('title')
    X Pro - Tax Settings
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

      <!-- Custom styles for this page -->
      <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/select.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">

  <!-- Ajax bootsnip -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> 

  <!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <style>
  .table-sortable tbody tr {
    cursor: move;
}
</style>

@endsection

@section('content')
  <!-- Circle Buttons -->
  <div class="col-lg-12 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Taxes</h6>
    </div>

    <div class="card-body">
    <div class="row clearfix">
    	<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-hover table-sortable" id="tab_logic">
				<thead>
					<tr >

						<th class="text-center">
							Tax Name
						</th>

						<th class="text-center">
							Tax Value
						</th>

            <th class="text-center">
							Product Price
						</th>


        		<th class="text-center">
                Action
						</th>
					</tr>
				</thead>
				<tbody>
    			<tr id='addr0' data-id="0" class="hidden">


            <td data-name="desc">
						    <input type="text" name='desc'  placeholder='0' class="form-control"/>

						</td>

            <td data-name="unitprice">
						    <input type="number" name='unitprice'  placeholder='Tax Value at %' class="form-control"/>
						</td>
						
    				<td data-name="sel">
						    <select name="sel0" class="form-control">
        				        <option value="1">Exclusice</option>
    					        <option value="2">Inclusive</option>
						    </select>
						</td>

            <td data-name="del">
                <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
            </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-primary float-right" style="color: white">Add new tax</a>
    </div>
  </div>
</div>

<button class="btn btn-success " type="submit">Save</button>
  
@endsection

@section('js')
 <!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>


  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/dataTables-select.min.js') }}"></script>
  {{-- <script src="{{ asset('js/dropdown-search.js') }}"></script> --}}
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>

<!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> --}}

<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> --}}

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}
  


  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <!-- Tab w3s -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script>
  $('.selectpickerdata').selectpicker(); 
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
@endsection