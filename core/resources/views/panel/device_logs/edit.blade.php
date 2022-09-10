@extends('backend.layouts.main') 
@section('title', 'Device Log')
@section('content')
@php
/**
* Device Log 
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
    ['name'=>'Edit Device Log', 'url'=> "javascript:void(0);", 'class' => '']
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
                            <h5>Edit Device Log</h5>
                            <span>Update a record for Device Log</span>
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
                        <h3>Update Device Log</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.device_logs.update',$device_log->id) }}" method="post" enctype="multipart/form-data" id="DeviceLogForm">
                            @csrf
                            <div class="row">
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('lr_id') ? 'has-error' : ''}}">
                                        <label for="lr_id" class="control-label">Lr Id<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="lr_id" type="text" id="lr_id" value="{{$device_log->lr_id }}">
                                    </div>
                                </div>
                                                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                                        <label for="lat" class="control-label">Lat<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="lat" type="date" id="lat" value="{{$device_log->lat }}">
                                    </div>
                                </div>
                                                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('lon') ? 'has-error' : ''}}">
                                        <label for="lon" class="control-label">Lon<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="lon" type="date" id="lon" value="{{$device_log->lon }}">
                                    </div>
                                </div>
                                                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('vehicle_no') ? 'has-error' : ''}}">
                                        <label for="vehicle_no" class="control-label">Vehicle No<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="vehicle_no" type="number" id="vehicle_no" value="{{$device_log->vehicle_no }}">
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select required name="type" id="type" class="form-control select2">
                                            <option value="" readonly>Select Type</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="vht_type">Vht Type</label>
                                        <select required name="vht_type" id="vht_type" class="form-control select2">
                                            <option value="" readonly>Select Vht Type</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="device_id">Device Id</label>
                                        <select required name="device_id" id="device_id" class="form-control select2">
                                            <option value="" readonly>Select Device Id</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                            
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
        $('#DeviceLogForm').validate();
                                                                                                                                                    
    </script>
    @endpush
@endsection
