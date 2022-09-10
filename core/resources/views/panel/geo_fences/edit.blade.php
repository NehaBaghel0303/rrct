@extends('backend.layouts.main') 
@section('title', 'Geo Fence')
@section('content')
@php
/**
* Geo Fence 
*
* @category  zStarter
*
* @ref  zCURD
* @author    Defenzelite <hq@defenzelite.com>
* @license  https://www.defenzelite.com Defenzelite Private Limited
* @version  <zStarter: 1.1.0>
* @link        https://www.defenzelite.com
*/
$breadcrumb_arr = [
    ['name'=>'Edit Geo Fence', 'url'=> "javascript:void(0);", 'class' => '']
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
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-grid bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Geo Fence</h5>
                            <span>Update a record for Geo Fence</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('backend.include.breadcrumb')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- start message area-->
               @include('backend.include.message')
                <!-- end message area-->
                <div class="card ">
                    <div class="card-header">
                        <h3>Update Geo Fence</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.geo_fences.update',$geo_fence->id) }}" method="post" enctype="multipart/form-data" id="GeoFenceForm">
                            @csrf
                            <div class="row">
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                        <label for="name" class="control-label">Name<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="name" type="text" id="name" value="{{$geo_fence->name }}">
                                    </div>
                                </div>
                                                                                                                            
                                {{-- <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                                        <label for="location" class="control-label">Location<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="location" type="text" id="location" value="{{$geo_fence->location }}">
                                    </div>
                                </div>
                                                                                             

                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}"><br>
                                        <label for="type" class="control-label">Type<span class="text-danger">*</span> </label>
                                        <input  required  class="js-single switch-input" @if($geo_fence->type) checked @endif name="type" type="radio" id="type" value="1">
                                    </div>
                                </div>
                                                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('cordinates') ? 'has-error' : ''}}">
                                        <label for="cordinates" class="control-label">Cordinates<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="cordinates" type="text" id="cordinates" value="{{$geo_fence->cordinates }}">
                                    </div>
                                </div> --}}
                                                            
                                <div class="col-md-12 mx-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
    <script>
        $('#GeoFenceForm').validate();
                                                                                        
    </script>
    @endpush
@endsection
