@extends('layouts.index')

@section('title')
X Pro - Staff Detail
@endsection


@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Staff Profile</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="" class="breadcrumb-item">Staff Profile</a>
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

        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">
            <!-- Left sidebar component -->
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">
                <!-- Sidebar content -->
                <div class="sidebar-content">
                @foreach($show as $data)
                    <!-- Navigation -->
                    <div class="card">
                        <div class="card-body bg-indigo-400 text-center card-img-top" style="background-color: #263238; background-size: contain;">
                            <div class="card-img-actions d-inline-block mb-3">
                                <img class="img-fluid rounded-circle" src="/assets/images/photo_profile/{{ $data->photo }}" width="170" alt="">
                            {{--<div class="card-img-actions-overlay rounded-circle">
                                    <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-plus3"></i>
                                    </a>
                                    <a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                        <i class="icon-link"></i>
                                    </a>
                                </div>--}}
                            </div>
                            
                            <h6 class="font-weight-semibold mb-0">{{ $data->name }}</h6>
                            <span class="d-block opacity-75">{{ $data->city}}, {{ $data->state }}</span>
                            
                        {{--<div class="list-icons list-icons-extended mt-3">
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
                            </div>--}}
                        </div>
                    
                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar mb-2">
                                <li class="nav-item-header">Navigation</li>
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link active" data-toggle="tab">
                                        <i class="icon-user"></i>
                                        My profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#schedule" class="nav-link" data-toggle="tab">
                                        <i class="icon-calendar3"></i>
                                        Schedule
                                        <span class="font-size-sm font-weight-normal opacity-75 ml-auto"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#inbox" class="nav-link" data-toggle="tab">
                                        <i class="icon-envelop2"></i>
                                        Inbox
                                        <span class="badge bg-danger badge-pill ml-auto"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#orders" class="nav-link" data-toggle="tab">
                                        <i class="icon-calendar"></i>
                                        Work Orders
                                        <span class="badge bg-success badge-pill ml-auto"></span>
                                    </a>
                                </li>
                            {{--<li class="nav-item-divider"></li>
                                <li class="nav-item">
                                    <a href="/logout" class="nav-link" data-toggle="tab">
                                        <i class="icon-switch2"></i>
                                        Logout
                                    </a>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- /navigation -->


                    <!-- Online users -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Online users</span>
                            <div class="header-elements">
                                <span class="badge bg-success badge-pill"></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="/assets/images/photo_profile/{{ $data->photo }}" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">{{ $data->name }}</a>
                                        <div class="font-size-sm text-muted">{{ $data->city }}, {{ $data->country }}</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-success"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    {{--<div class="card-footer d-flex justify-content-between align-items-center py-2">
                            <a href="#" class="text-grey">
                                All users
                            </a>

                            <div>
                                <a href="#" class="text-grey" data-popup="tooltip" title="Conference room"><i class="icon-comment"></i></a>
                                <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
                            </div>
                        </div>--}}
                    </div>
                    <!-- /online users -->
                    @endforeach

                    <!-- Latest updates -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Latest updates</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                            {{--<li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                            <i class="icon-git-pull-request"></i>
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                        <div class="text-muted font-size-sm">4 minutes ago</div>
                                    </div>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- /latest updates -->

                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /left sidebar component -->


            <!-- Right content -->
            <div class="tab-content w-100">
                <div class="tab-pane fade active show" id="profile">

                    <!-- Sales stats -->
                    <div class="card">
                        <div class="card-header header-elements-sm-inline">
                            <h6 class="card-title">Weekly statistics</h6>
                            <div class="header-elements">
                                <span><i class="icon-history mr-2 text-success"></i> </span>

                                <div class="list-icons ml-3">
                                    <a class="list-icons-item" data-action="reload"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="tornado_negative_stack"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /sales stats -->

                    
                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Profile information</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>
                        @foreach($show as $data)
                        <div class="card-body">
                            @if (session('updateDetail'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">{{ session('updateDetail') }}</span>
                            </div>
                            @endif 
                            @if (session('failedDetail'))
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">{{ session('failedDetail') }}</span>
                            </div>
                            @endif 
                            <form action="{{ route('updateDetailStaffMembers', ['id' => $user_id ]) }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Username</label>
                                            <input type="text" readonly value="{{ $data->email }}" class="font-weight-bold form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Full name</label>
                                            <input type="text" name="name" value="{{ $data->name }}" class="form-control form-control text-capitalize">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Address</label>
                                            <input type="text" name="full_address" value="{{ $data->full_address }}" class="form-control form-control text-capitalize">
                                        </div>
                                        <div class="col-md-3">
                                        <label>Hourly Rate</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-coin-dollar"></i>
                                                    </span>
                                                </span>
                                                <input type="number" name="rate_per_hour" value="{{ $data->rate_per_hour }}" class="form-control form-control text-capitalize">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Rate Currency</label>
                                            <input type="text" name="rate_currency" readonly value="{{ $data->rate_currency }}" class="form-control form-control text-capitalize">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>City</label>
                                            <input type="text" name="city" value="{{ $data->city }}" class="form-control form-control text-capitalize">
                                        </div>
                                        <div class="col-md-3">
                                            <label>State/Province</label>
                                            <input type="text" name="state" value="{{ $data->state }}" class="form-control form-control text-capitalize">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Your country</label>
                                            <input type="text" name="country" value="{{ $data->country }}" class="form-control form-control text-capitalize">
                                        </div>
                                        <div class="col-md-3">
                                            <label>ZIP code</label>
                                            <input type="number" name="postal_code" value="{{ $data->postal_code }}" class="form-control form-control text-capitalize">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Home Phone</label>
                                            <input type="number" name="home_phone" value="{{ $data->home_phone }}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mobile Phone</label>
                                            <input type="number" name="mobile_phone" value="{{ $data->mobile_phone }}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Upload profile image</label>
                                            <input type="file" name="photo" class="form-control h-auto">
                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <!-- /profile info -->


                    <!-- Account settings -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Account settings</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>
                        @foreach($show as $data)
                        <div class="card-body">
                            @if (session('updatePass'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">{{ session('updatePass') }}</span>
                            </div>
                            @endif 
                            @if (session('failedPass'))
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">{{ session('failedPass') }}</span>
                            </div>
                            @endif
                            <form action="{{ route('updatePassStaffMembers', ['email' => $data->email ]) }}" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Username</label>
                                            <input type="text" name="email" value="{{ $data->email }}" class="font-weight-bold form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>New password</label>
                                            <input required minLength="6" type="password" name="new_password" placeholder="Enter new password" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Repeat password</label>
                                            <input required minLength="6" type="password" name="repeat_password" placeholder="Repeat new password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <!-- /account settings -->

                </div>

                <div class="tab-pane fade" id="schedule">
                    <!-- Schedule -->
                    <div class="card">
                        <table id="Schedule" class="table table-lg" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>App&nbsp;Date</td>
                                    <td>Purpose</td>
                                    <td>Type</td>
                                    <td>Assign To</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /schedule -->
                </div>

                <div class="tab-pane fade" id="inbox">

                    <!-- My inbox -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <h6 class="card-title">My inbox</h6>

                            <div class="header-elements">
                                <span class="badge bg-blue">25 new today</span>
                            </div>
                        </div>

                        <!-- Action toolbar -->
                        <div class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2">
                            <div class="text-center d-lg-none w-100">
                                <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-multiple">
                                    <i class="icon-circle-down2"></i>
                                </button>
                            </div>

                            <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-multiple">
                                <div class="mt-3 mt-lg-0">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-icon btn-checkbox-all">
                                            <input type="checkbox" class="form-input-styled" data-fouc>
                                        </button>

                                        <button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown"></button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item">Select all</a>
                                            <a href="#" class="dropdown-item">Select read</a>
                                            <a href="#" class="dropdown-item">Select unread</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">Clear selection</a>
                                        </div>
                                    </div>

                                    <div class="btn-group ml-3 mr-lg-3">
                                        <button type="button" class="btn btn-light"><i class="icon-pencil7"></i> <span class="d-none d-lg-inline-block ml-2">Compose</span></button>
                                        <button type="button" class="btn btn-light"><i class="icon-bin"></i> <span class="d-none d-lg-inline-block ml-2">Delete</span></button>
                                        <button type="button" class="btn btn-light"><i class="icon-spam"></i> <span class="d-none d-lg-inline-block ml-2">Spam</span></button>
                                    </div>
                                </div>

                                <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span class="font-weight-semibold">528</span></div>

                                <div class="ml-lg-3 mb-3 mb-lg-0">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-icon disabled"><i class="icon-arrow-left12"></i></button>
                                        <button type="button" class="btn btn-light btn-icon"><i class="icon-arrow-right13"></i></button>
                                    </div>

                                    <div class="btn-group ml-3">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a href="#" class="dropdown-item">One more line</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /action toolbar -->


                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-inbox">
                                <tbody data-link="row" class="rowlink">
                                    <tr class="unread">
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="form-input-styled" data-fouc>
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">
                                            <a href="#">
                                                <i class="icon-star-empty3 text-muted"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="/assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-default">Spotify</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">On Tower-hill, as you go down &nbsp;-&nbsp;</div>
                                            <span class="text-muted font-weight-normal">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="icon-attachment text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            11:09 pm
                                        </td>
                                    </tr>

                                    <tr class="unread">
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="form-input-styled" data-fouc>
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">
                                            <a href="#">
                                                <i class="icon-star-empty3 text-muted"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <span class="btn bg-warning-400 rounded-circle btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-default">James Alexander</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject"><span class="badge bg-success mr-2">Promo</span> There are three whales and three boats &nbsp;-&nbsp;</div>
                                            <span class="text-muted font-weight-normal">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="icon-attachment text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            10:21 pm
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /table -->

                    </div>
                    <!-- /my inbox -->

                </div>

                <div class="tab-pane fade" id="orders">

                    <!-- Orders history -->
                    <div class="card">
                        <div class="table-responsive">
                            <table id="workorders" class="table table-lg" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Period</td>
                                        <td>Client&nbsp;Name</td>
                                        <td>Start&nbsp;Date</td>
                                        <td>End&nbsp;Date</td>
                                        <td>Description</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /orders history -->
                </div>
            </div>
            <!-- /right content -->
        </div>
        <!-- /inner container -->
    </div>
    <!-- /content area -->    
</div>
@endsection

@push('js')
<script>
    var table = $('#Schedule').DataTable({
        paging: true,
        processing: false,
        serverSide: false,
        select: true,
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        ajax: function(data, callback){
            $.ajax({
                url: '{{ url('/')}}/manage_staff_members/appointments/ajax/{{ $user_id }}',
                'data': {
                    ...data
                },
                dataType: 'json',
                beforeSend: function(){
                // Here, manually add the loading message.
                $('#Example1 > tbody').html(
                    '<tr class="odd">' +
                    '<td valign="top" colspan="" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                    '</tr>'
                );
                },
                success: function(res){
                    console.log(res);
                callback(res);
                }
            })
        },
        columns: [
            { data: null, mRender: function(data, type, full) {
            return '<div class="font-weight-light" style="font-size: 17px; color: black;"><!--img src="{{asset("uploads/")}}" alt="Logo" class="rounded-circle mr-3" width="30"-->'+data.client.full_name+'</div><div style="font-size: 14px;"> #'+data.id+'</div>';
            }},
            { data: null, mRender: function(data, type, full) {
            return '<div class="font-weight-light" style="font-size: 14px; color: black;">'+data.date+'</div>';
            }},
            { data: 'purpose' },
            { data: null, mRender: function(data, type, full) {
            return 'Staff';
            }},
            { data: 'client.full_name', className: "text-center" },
            { data: null, mRender: function(data, type, full) {
                if(data.status == 'Pending' ) {
                    return `<a href="" class="badge badge-danger align-top" style="font-size: 9pt;">Pending</a>`;
                }else{
                    return `<a href="" class="badge badge-danger align-top" style="font-size: 9pt;">Accept</a>`;
                }
            }},        
        ],
        language: {
            loadingRecords: "&nbsp;",
            processing: 'Loading...'},
    })
    var table = $('#workorders').DataTable({
        paging: true,
        processing: false,
        serverSide: false,
        select: true,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="table-active table-border-double"><td colspan="8" class="font-weight-semibold">'+moment(group).format('D MMM Y')+'</td></tr>'
                    );

                    last = group;
                }
            });

            // Initializw Select2
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }
            $('.form-control-select2').select2({
                width: 150,
                minimumResultsForSearch: Infinity
            });
        },
        ajax: function (data, callback) {
            $.ajax({
                url: '{{ url('/')}}/manage_staff_members/work_orders/ajax/{{ $user_id }}',
                'data': {
                    ...data,
                },
                dataType: 'json',
                beforeSend: function () {
                    // Here, manually add the loading message.
                    $('#workorders > tbody').html(
                            '<tr class="odd">' +
                            '<td valign="top" colspan="8" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                            '</tr>'
                            );
                },
                success: function (res) {
                    callback(res);
                }
            })
        },
        columns: [
            /*{data: null, mRender: function (data, type, full) {
                    return `<input type="checkbox" class="checkbox" id="" value="${data.id}">`
                }},*/
            {data: null, name: 'Works Order Number', render: function (data, type, row) {
                return `
                    <div class="list-icons font-weight-semibold">
                        <a id="btn_edit" href="/work_orders/detail/${row.id}">#${row.order_number}</a>
                    </div>`
            }},
            {data: 'workorder_date', name: 'Period', render: function (data, type, row) {
                return moment(row.workorder_date).format('MMM Y');
            }},
            {data: 'client.full_name', name: 'Client Name'},
            {data: 'start_date', name: 'Start Date'},
            {data: 'end_date', name: 'End Date'},
            {data: null, name: 'Description', mRender: function (data, type, full) {
                return data.title+'<br/>'+data.description;
            }},
            { data: 'status', mRender: function(data, type, row) {
                    let badgee = null;
                    let bagde_status = null;
                    if(row.status == 1) {
                        badgee = 'badge-light';
                        bagde_status = 'Draft';
                    }
                    if(row.status == 2){
                        badgee = 'badge-success';
                        bagde_status = 'Finish';
                    }
                    if(row.status == 3){
                        badgee = 'badge-warning';
                        bagde_status = 'Pending';
                    }
                    if(row.status == 4){
                        badgee = 'badge-danger';
                        bagde_status = 'Cancled';
                    }
                    if(row.status == 5){
                        badgee = 'badge-info';
                        bagde_status = 'On Going';
                    }
                    if(row.status == 6){
                        badgee = 'badge-primary';
                        bagde_status = 'Waiting Approval';
                    }
                    return `<a href="/work_orders/edit_work_order/${row.id}" class="badge ${badgee} align-top" style="font-size: 9pt;">${bagde_status}</a>`;
                            /*<ul class="list list-unstyled mb-0">
                                <li class="dropdown">
                                    <a href="#" class="badge ${badgee} align-top dropdown-toggle" data-toggle="dropdown" style="font-size: 9pt;">${bagde_status}</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=1" class="dropdown-item ${row.status == 1 ? 'active': ''}">Draft</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=2" class="dropdown-item ${row.status == 2 ? 'active': ''}">Finish</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=3" class="dropdown-item ${row.status == 3 ? 'active': ''}">Pending</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=4" class="dropdown-item ${row.status == 4 ? 'active': ''}">Cancled</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=5" class="dropdown-item ${row.status == 5 ? 'active': ''}">On Going</a>
                                        <a href="/work_orders/update-status?id_work_order=${row.id}&status=6" class="dropdown-item ${row.status == 6 ? 'active': ''}">Waiting Approval</a>
                                    </div>
                                </li>
                            </ul>`;*/
            }},
            {data: null,  mRender: function (data, type, full) {
                    return `<form class="d-inline" action="" method="POST">
                      @csrf
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="/work_orders/detail/${data.id}" class="dropdown-item"><i class="icon-eye" aria-hidden="true"></i> View Data</a>
                        <a href="/work_orders/edit_work_order/${data.id}" class="dropdown-item" id="btn_new_operator"><i class="icon-pencil4" aria-hidden="true"></i> Update Data</a>
                        <a href="/work_orders/delete/${data.id}" class="dropdown-item"><i class="icon-trash" aria-hidden="true"></i> Delete Data</a>
                      </div>
                  </form>`;
                }}
        ],
        language: {
            loadingRecords: "&nbsp;",
            processing: 'Loading...'},
    })
</script>
@endpush
