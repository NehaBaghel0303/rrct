@extends('backend.layouts.main') 
@section('title', 'Geo Fence')
@section('content')
@php

$breadcrumb_arr = [
    ['name'=>'Add Geo Fence', 'url'=> "javascript:void(0);", 'class' => '']
]
@endphp
    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('backend/plugins/mohithg-switchery/dist/switchery.min.css') }}">
    <style>
        .error{
            color:red;
        }
    </style>
    @endpush

    <div class="container-fluid">
    	{{-- <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-grid bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Geo Fence</h5>
                            <span>Create a record for Geo Fence</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('backend.include.breadcrumb')
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-10 mx-auto">
                <!-- start message area-->
               @include('backend.include.message')
                <!-- end message area-->
                <div class="card">
                    <div class="card-header">
                        <div class="d-none" id="color-palette"></div>
                        <h3>Add Geo Fence</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.geo_fences.store') }}" method="post" enctype="multipart/form-data" id="geofencesave" onkeydown="return event.key != 'Enter';">
                            @csrf
                            <input type="hidden" class="form-control" name="cordinates" id="geo_area">
                            <div class="row">
                                <div class="col-md-8 col-8">
                                    <div id="map" style="width: 100%; height: 500px"></div>
                                </div>
                                    <div class="col-4 col-md-4">
                                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                <label for="name" class="control-label">Geofence Name<span class="text-danger">*</span> </label>
                                                <input required  class="form-control" name="name" type="text" id="name" value="{{old('name')}}" placeholder="Enter Geofence Name" >
                                            </div>

                                            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                                                <label for="location" class="control-label">Location name /Lat,Long <span class="text-danger">*</span> </label>
                                                <input required  id="pac-input" class="form-control" name="location" type="text" value="{{old('location')}}" placeholder="Enter Location,Latitude,Longitude " >
                                            </div>  
                                            <div class="form-group d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary" id="geofenvaluesave">Create</button>
                                                <button type="button" id="delete-button" class="btn btn-outline-danger ml-2" id="">Clear Draw</button>
                                            </div>
                                    </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="{{asset('backend/plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
    <script src="{{asset('backend/js/form-advanced.js') }}"></script>

    {{-- GEOFENCE PLUGINS --}}
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDIH18koUlIQk9SHsQin0zZpJ1LsaZ8XvU&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>

    <script src="{{asset('backend/js/index-page.js')}}"></script>
    <script src="{{asset('backend/geofence/map.js')}}"></script>
    <script src="{{asset('backend/geofence/geofence.js')}}"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
        <script>
            var geo_area = $('#geo_area').val();

            $(document).on("keydown", "form", function(event) { 
                return event.key != "Enter";
            });
        </script>
    @endpush
@endsection
