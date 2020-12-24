@extends('layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Messages</span></h4>
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
                    <span class="breadcrumb-item active">Messages</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <div id="filters" style="display: none;">
                        <button type="button" class="dropdown-item" onclick="deleteWorkOrder()"><i class="icon-trash red-text"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->
    
    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <div class="card">
            <div class="card-body">
                <ul class="media-list media-chat media-chat-scrollable mb-3">
                    <li class="media content-divider justify-content-left font-weight-bold mx-0">Chat With : {{ $dataStaff->name }} </li><hr/>

                @foreach($dataTo as $data)
                    <li class="media media-chat-item-reverse">
                        <div class="media-body">
                            <div class="media-chat-item">{{ $data->message }}</div>
                            <div class="font-size-sm text-muted mt-2">{{ $data->created_at }} {{--<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>--}}</div>
                        </div>

                        <div class="ml-3">
                            <a href="#">
                                <img src="/assets/images/photo_profile/{{ $data->staff->photo }}" class="rounded-circle" width="40" height="40" alt="">
                            </a>
                        </div>
                    </li>
                @endforeach

                @foreach($dataFrom as $data)
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <img src="/assets/images/photo_profile/{{ $data->staff->photo }}"class="rounded-circle" width="40" height="40" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-chat-item">{{ $data->message }}</div>
                            <div class="font-size-sm text-muted mt-2">{{ $data->created_at }} {{--<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a>--}}</div>
                        </div>
                    </li>
                @endforeach
                </ul>

            <form action="{{ route ('postMessage') }}" method="post">
                <input type="text" hidden name="to_user" value="{{ $dataStaff->id }}">
                <textarea name="message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Send</button>
                </div>
            @csrf 
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush