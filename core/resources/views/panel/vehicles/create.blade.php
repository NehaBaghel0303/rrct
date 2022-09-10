@extends('backend.layouts.main') 
@section('title', 'Vehicle')
@section('content')
@php
/**
 * Vehicle 
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
    ['name'=>'Add Vehicle', 'url'=> "javascript:void(0);", 'class' => '']
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
                            <h5>Add Vehicle</h5>
                            <span>Create a record for Vehicle</span>
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
                        <h3>Create Vehicle</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.vehicles.store') }}" method="post" enctype="multipart/form-data" id="VehicleForm">
                            @csrf
                            <div class="row">
                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('vehicle_no') ? 'has-error' : ''}}">
                                        <label for="vehicle_no" class="control-label">Vehicle No<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="vehicle_no" type="number" id="vehicle_no" value="{{old('vehicle_no')}}" placeholder="Enter Vehicle No" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                        <label for="image" class="control-label">Image<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="image_file" type="file" id="image" value="{{old('image')}}" >
                                        <img id="image_file" class="d-none mt-2" style="border-radius: 10px;width:100px;height:80px;"/>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select required name="status" id="status" class="form-control select2">
                                            <option value="" readonly>Select Status</option>
                                            @foreach (getVehicleCurrentStatus() as $status)
                                                <option value="{{ $status['id'] }}" @if(old('status') == $status['id']) selected @endif>{{ $status['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                                            
                                <div class="col-md-12 ml-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create</button>
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
        $('#VehicleForm').validate();
                                        
            document.getElementById('image').onchange = function () {
                var src = URL.createObjectURL(this.files[0])
                $('#image_file').removeClass('d-none');
                document.getElementById('image_file').src = src
            }
                                                            
    </script>
    @endpush
@endsection
