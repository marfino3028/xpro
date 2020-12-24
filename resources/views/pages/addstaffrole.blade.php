@extends('layouts.index')

@section('title')
    X Pro - Manage Staff Role
@endsection

@section('content')
@error('list_menu')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Required</strong>, You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/manage_staff_roles" class="breadcrumb-item">Add Staff Roles</a>
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
                <h5 class="card-title">Add Staff Roles</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>

            <div class="card-body">
                <div id="show-me">
                    <form action="{{ route('poststaffroles') }}" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="nameRole">Name</label>
                                <input type="text" class="form-control @error('name_role') is-invalid @enderror" name="name_role" id="nameRole" value="{{ old('name_role') }}" required>
                                @error('name_role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" style="margin-top: 32px;"><i class="fas fa-plus"></i> Save</button>
                            </div>
                        </div>
                        <label for="isAdminCheckBox">
                            <input class="mt-5" type="checkbox" id="isAdminCheckBox" name="admin" onclick="isAdmin()"> Is Admin?
                        </label>
                        <div id="cardAdmin">
                            @foreach ($menus as $menu)
                            @if (count($menu['sub_menu']) > 0)
                            <div class="card mb-2" id="{{ $menu['parent_code'] }}">
                                <div class="card-header py-3">
                                    <label class="m-0 font-weight-bold text-primary">
                                        <input class="mr-2 item" type="checkbox" id="check_{{ $menu['parent_code'] }}" name="list_menu[{{ $menu['parent_code'] }}]" value="{{ $menu['parent_id'] }}">{{ $menu['parent_name'] }}
                                    </label>
                                </div>
                                @foreach ($menu['sub_menu'] as $sub)
                                <div class="card-body">
                                    <div class="col-4">
                                        <label>
                                            <input class="mr-4 item_{{ $sub['sub_code'] }}" type="checkbox" name="list_menu[{{ $sub['sub_code'] }}]" value="{{ $sub['sub_id'] }}">
                                            {{ $sub['sub_name'] }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="card mb-2" id="{{ $menu['parent_code'] }}">
                                <div class="card-header py-3">
                                    <label class="m-0 font-weight-bold text-primary">
                                        <input class="mr-2 item" type="checkbox" id="check_{{ $menu['parent_code'] }}" name="list_menu[{{ $menu['parent_code'] }}]" value="{{ $menu['parent_id'] }}">{{ $menu['parent_name'] }}
                                    </label>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
  <script>
    $(document).ready(function() {
        $("input[name$='radioInput']").click(function() {
            var test = $(this).val();
            $("div.desc").hide();
            $("#" + test).show();
        });

        $("#checksales").change(function(){
          $(".itemsales").prop("checked", $(this).prop("checked"))
        })
        $(".itemsales").change(function(){
          if($(this).prop("checked")==false){
            $("#checksales").prop("checked", false)
          }
          if($(".itemsales:checked").length == $(".itemsales").length){
            $("#checksales").prop("checked", true)
          }
        })
    });

    function isAdmin(){
      if($('#isAdminCheckBox').is(':checked')) $('input:checkbox').prop('checked', true);
      else $('input:checkbox').prop('checked', false);
    }
  </script>

  {{-- <script>
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
    tail.select('#select1', {
      search: true
    });
  </script>

<script>
  $("#checksales").change(function(){
    $(".itemsales").prop("checked", $(this).prop("checked"))
  })
  $(".itemsales").change(function(){
    if($(this).prop("checked")==false){
      $("#checksales").prop("checked", false)
    }
    if($(".itemsales:checked").length == $(".itemsales").length){
      $("#checksales").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkwo").change(function(){
    $(".itemwo").prop("checked", $(this).prop("checked"))
  })
  $(".itemwo").change(function(){
    if($(this).prop("checked")==false){
      $("#checkwo").prop("checked", false)
    }
    if($(".itemwo:checked").length == $(".itemwo").length){
      $("#checkwo").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkclient").change(function(){
    $(".itemclient").prop("checked", $(this).prop("checked"))
  })
  $(".itemclient").change(function(){
    if($(this).prop("checked")==false){
      $("#checkclient").prop("checked", false)
    }
    if($(".itemclient:checked").length == $(".itemclient").length){
      $("#checkclient").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkinventory").change(function(){
    $(".iteminventory").prop("checked", $(this).prop("checked"))
  })
  $(".iteminventory").change(function(){
    if($(this).prop("checked")==false){
      $("#checkinventory").prop("checked", false)
    }
    if($(".iteminventory:checked").length == $(".iteminventory").length){
      $("#checkinventory").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkjm").change(function(){
    $(".itemjm").prop("checked", $(this).prop("checked"))
  })
  $(".itemjm").change(function(){
    if($(this).prop("checked")==false){
      $("#checkjm").prop("checked", false)
    }
    if($(".itemjm:checked").length == $(".itemjm").length){
      $("#checkjm").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkfinance").change(function(){
    $(".itemfinance").prop("checked", $(this).prop("checked"))
  })
  $(".itemfinance").change(function(){
    if($(this).prop("checked")==false){
      $("#checkfinance").prop("checked", false)
    }
    if($(".itemfinance:checked").length == $(".itemfinance").length){
      $("#checkfinance").prop("checked", true)
    }
  })
</script>

<script>
  $("#checkstaff").change(function(){
    $(".itemstaff").prop("checked", $(this).prop("checked"))
  })
  $(".itemstaff").change(function(){
    if($(this).prop("checked")==false){
      $("#checkstaff").prop("checked", false)
    }
    if($(".itemstaff:checked").length == $(".itemstaff").length){
      $("#checkstaff").prop("checked", true)
    }
  })
</script>

<script>
  $("#checksettings").change(function(){
    $(".itemsettings").prop("checked", $(this).prop("checked"))
  })
  $(".itemsettings").change(function(){
    if($(this).prop("checked")==false){
      $("#checksettings").prop("checked", false)
    }
    if($(".itemsettings:checked").length == $(".itemsettings").length){
      $("#checksettings").prop("checked", true)
    }
  })
</script> --}}
@endsection