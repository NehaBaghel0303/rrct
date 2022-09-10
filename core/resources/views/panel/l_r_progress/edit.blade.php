@extends('backend.layouts.main') 
@section('title', 'L R Progress')
@section('content')
@php
/**
* L R Progress 
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
    ['name'=>'Edit L R Progress', 'url'=> "javascript:void(0);", 'class' => '']
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
                            <h5>Edit L R Progress</h5>
                            <span>Update a record for L R Progress</span>
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
                        <h3>Update L R Progress</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.l_r_progress.update',$l_r_progress->id) }}" method="post" enctype="multipart/form-data" id="LRProgresForm">
                            @csrf
                            <div class="row">
                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="lr_id">Lr Id</label>
                                        <select required name="lr_id" id="lr_id" class="form-control select2">
                                            <option value="" readonly>Select Lr Id</option>
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
                                    <div class="form-group {{ $errors->has('distance_covered') ? 'has-error' : ''}}">
                                        <label for="distance_covered" class="control-label">Distance Covered<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="distance_covered" type="text" id="distance_covered" value="{{$l_r_progress->distance_covered }}">
                                    </div>
                                </div>
                                                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('distance_remain') ? 'has-error' : ''}}">
                                        <label for="distance_remain" class="control-label">Distance Remain<span class="text-danger">*</span> </label>
                                        <input required   class="form-control" name="distance_remain" type="text" id="distance_remain" value="{{$l_r_progress->distance_remain }}">
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
        $('#LRProgresForm').validate();
                                                                                                                                
    </script>
    @endpush
@endsection
