@extends('masters/index_1')

@section('title')
X Pro - Add Werehouses
@endsection

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropdown-search.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add Werehouses</h6>
  </div>
  <div class="card-body">
    <div class="col-6">
    <form action="{{ route('postwarehouses')}}" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="address">Shipping Address</label>
        <textarea type="text-area" class="form-control @error('title') is-invalid @enderror" id="shipping_address" name="shipping_address"></textarea>
      </div>
      <div class="form-group">
      <input type="checkbox" value="Active" name="status">
      <label for="active"> Active</label>
      </div>
      <div class="form-group">
      <input type="checkbox" value="Primary" name="type">
      <label for="primary"> Primary</label>
      </div>
      <div class="col-6">
      <div class="form-group">
      <button type="submit" class="btn btn-success mb-2"><i class="fas fa-angle-right"></i>  Save</a>
      </div>
      @csrf
      </form>
      </div>
    </div>
  </div> 
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('js/dropdown-search.js') }}"></script>


<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/tail.select-full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('js/jquery.datetimepicker.min.js') }}"></script>
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
  $('#picker').datetimepicker({
    timepicker : false,
    datepicker : true,
    format : 'Y-m-d',
    value : '2020-08-14',
    weeks : true
  })
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
<script>
  tail.select('#select1', {
    search: true
  });
</script>
@endsection