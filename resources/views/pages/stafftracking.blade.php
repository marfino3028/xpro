@extends('layouts.index')

@section('content')

@push('js')
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2ozLF3XZg3QYHne0g_6rd4CZOcnceypE&callback=initMap"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      function initMap() {
        initMapTracking();
        initMapWorkOrder();
      }
      let data_tracking = JSON.parse({!!json_encode($data_json)!!});
        function initMapTracking() {
          var myOptions = {
            zoom: 4,
            center: new google.maps.LatLng(-25.363, 131.044),
          }
        let map = new google.maps.Map(document.getElementById("map"), myOptions);
        data_tracking.forEach(element => {
          new google.maps.Marker({
            position: { lat: parseInt(element.latitude), lng: parseInt(element.longtitude) },
            map,
            label: element.user ? element.user.name : 'unknown'
          });  
        });  
      }

      let data_workorder = JSON.parse({!!json_encode($workorder_json)!!});
      
      function initMapWorkOrder() {
          var myOptions = {
            zoom: 4,
            center: new google.maps.LatLng(-26.363, 131.044),
          }
        let map = new google.maps.Map(document.getElementById("map2"), myOptions);
        // data_tracking.forEach(element => {
        //   new google.maps.Marker({
        //     position: { lat: -26.363, lng: 131.044 },
        //     map,
        //     label: 'unknown'
        //   });  
        // });  
      }

    </script>

@endpush
@if (session('add'))
<div class="alert alert-success">
  {{ session('add') }}
</div>
@endif 
@if (session('update'))
<div class="alert alert-success">
  {{ session('update') }}
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger">
  {{ session('delete') }}
</div>
<br>
@endif 
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/projects" class="breadcrumb-item">Project</a>
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
                <h5 class="card-title">Project</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="/add_new_projects" class="btn btn-sm btn-outline-success">
                            Add New
                        </a>
                        <div style="display: none; float:right;" id="filter">
                            &nbsp;<button type="button" onclick="deleteProjects()" class="btn btn-sm btn-outline-danger deleteButton"><i class="fas fa-trash"> </i> Delete</button>                
                        </div>
                    </div>
                </div>
            </div>
            <!-- Circle Buttons -->
            <div class="card-header">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-map-tab" data-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map" aria-selected="true">
                    <i class="fa fa-globe"></i> Map
                  </a>
                  <a class="nav-item nav-link" id="nav-replays-tab" data-toggle="tab" href="#nav-replays" role="tab" aria-controls="nav-replays" aria-selected="false">
                    <i class="fa fa-play-circle"></i> Replays
                  </a>
                  <a class="nav-item nav-link" id="nav-messaging-tab" data-toggle="tab" href="#nav-messaging" role="tab" aria-controls="nav-messaging" aria-selected="false">
                    <i class="fa fa-envelope"></i> Messaging
                  </a>
                  <a class="nav-item nav-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-reports" aria-selected="false">
                    <i class="fa fa-file"></i> Reports
                  </a>
                </div>
              </nav>
                <div class="tab-pane fade show" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-header">
                          <nav>
                            <div class="card-body">
                              <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#basic-tab1" class="nav-link active" data-toggle="tab">Staff Tracking</a></li>
                                <li class="nav-item"><a href="#basic-tab2" class="nav-link" data-toggle="tab">WorkOrder Track</a></li>
                              </ul>
              
                              <div class="tab-content">
                                <div class="tab-pane fade show active" id="basic-tab1">
                                  <div class="col">
                                    <div class="input-group md-form form-sm form-2 pl-0">
                                      <input placeholder="Site, Address or Vehicles" class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
                                      <div class="input-group-append">
                                        <span class="input-group-text amber lighten-3" id="basic-text1">
                                          <i class="fas fa-search text-grey" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div> <br/>
                                    <div id="map"></div>
                                  </div>
                                </div>
              
                                <div class="tab-pane fade show"  id="basic-tab2">
                                    <div class="input-group md-form form-sm form-2 pl-0">
                                      <input placeholder="Site, Address or Vehicles" class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
                                      <div class="input-group-append">
                                        <span class="input-group-text amber lighten-3" id="basic-text1">
                                          <i class="fas fa-search text-grey" aria-hidden="true"></i>
                                        </span>
                                      </div>
                                    </div> <br />
                                    <div id="map2"></div>
                                </div>
                              </div>
                            </div>
                          </nav>                  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-replays" role="tabpanel" aria-labelledby="nav-replays-tab">
                  Replays
                </div>
                <div class="tab-pane fade" id="nav-messaging" role="tabpanel" aria-labelledby="nav-messaging-tab">
                  Messaging
                </div>
                <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                  Reports
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush