@extends('backend.layouts.main') 
@section('title', 'Geofence')
@section('content')
    @php
    $breadcrumb_arr = [
        ['name'=>'Geofence', 'url'=> "javascript:void(0);", 'class' => 'active']
    ]
    @endphp

    <style>
        .table thead {
            background-color: #fff;
        }
        div.side-slide {
        background-color: #fff;
        top: 0;
        right: -100%; 
        height: 100%;
        position: fixed;
        width: 285px;
        z-index: 99999;
    }
    #map > div > div > div:nth-child(11) > div:nth-child(2) > div,#map > div > div > div:nth-child(11) > div:nth-child(3) > div,#map > div > div > div:nth-child(11) > div:nth-child(4) > div,#map > div > div > div:nth-child(11) > div:nth-child(5) > div 
    {
        display: none;
    }
    #map > div > div > div:nth-child(10) > div:nth-child(2) > div,#map > div > div > div:nth-child(10) > div:nth-child(3) > div,#map > div > div > div:nth-child(10) > div:nth-child(4) > div,#map > div > div > div:nth-child(10) > div:nth-child(5) > div 
    {
        display: none;
    }
    </style>

    <div class="container-fluid">
            <div class="card-header">
                <div style="display: none" id="color-palette"></div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <h3 class="card-title">
                                <div class="form-group row">
                                <label for="geo_description" class="col-sm-5 col-form-label">Choose Address </label>
                                <div class="form-group col-sm-7">
                                    <input id="pac-input" class="form-control" type="text" placeholder="Enter Address">
                                </div>
                                </div>
                            </h3>
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-sm-4 col-md-3">
                            <button class="btn btn-block btn-outline-danger btn-sm" id="delete-button">Delete Selected Geofence</button>
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-sm-4 col-md-3">
                            <button class="btn btn-block btn-outline-success btn-sm" id="showgeofencemodel">Save Geofence</button>
                        </div>
                    </div>
            </div>
            <div id="map" style="width: 100%; height: 600px"></div>
                <div class="modal fade show" id="modal-geofence" aria-modal="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Save Selected Geofence</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div> 
                        <div class="modal-body"> 
                          <form id="geofencesave" method="post" action="{{route('panel.geo_fences.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="geo_name" class="col-sm-4 col-form-label">Name</label>
                                    <div class="form-group col-sm-8">
                                    <input type="text" class="form-control" name="geo_name" id="geo_name" required="true" placeholder="Geofence Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="geo_description" class="col-sm-4 col-form-label">Description</label>
                                    <div class="form-group col-sm-8">
                                    <input type="text" class="form-control" name="geo_description" id="geo_description" required="true" placeholder="Geofence Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Cateogry" class="col-sm-4 col-form-label">Vehicle</label>
                                    <div class="form-group col-sm-8">
                                    <input type="text" name="vehicle" class="form-control">
                                    </div>
                                </div>
                               <input type="hidden" class="form-control" name="geo_area" id="geo_area">
                            </div>
                        </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="geofenvaluesave" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
    </div>
    <!-- push external js -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
    <script src="{{asset('backend/js/index-page.js')}}"></script>
    <script src="{{asset('backend/geofence/map.js')}}"></script>
    <script src="{{asset('backend/geofence/geofence.js')}}"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDIH18koUlIQk9SHsQin0zZpJ1LsaZ8XvU&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>
    @push('script')
        <script>
            $('#showgeofencemodel').on('click', function(e){
                $('#modal-geofence').modal('show');
                var geo_area = $('#geo_area').val();
                alert(geo_area);
                if (geo_area == "") {
                    alertmessage('Please select area in map',2);
                } else {
                    $('#modal-geofence').modal('show');
                }
            });
        </script>
    @endpush
@endsection
