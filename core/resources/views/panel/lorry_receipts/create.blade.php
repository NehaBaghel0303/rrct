@extends('backend.layouts.main') 
@section('title', 'Lorry Receipt')
@section('content')
@php
/**
 * Lorry Receipt 
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
    ['name'=>'Add Lorry Receipt', 'url'=> "javascript:void(0);", 'class' => '']
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
                            <h5>Add Lorry Receipt</h5>
                            <span>Create a record for Lorry Receipt</span>
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
                        <h3>Create Lorry Receipt</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('panel.lorry_receipts.store') }}" method="post" enctype="multipart/form-data" id="LorryReceiptForm">
                            @csrf
                            <div class="row">
                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('lr_no') ? 'has-error' : ''}}">
                                        <label for="lr_no" class="control-label">Lr No<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="lr_no" type="text" id="lr_no" value="{{old('lr_no')}}" placeholder="Enter Lr No" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('payload') ? 'has-error' : ''}}">
                                        <label for="payload" class="control-label">Payload<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="payload" type="text" id="payload" value="{{old('payload')}}" placeholder="Enter Payload" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('total_distance') ? 'has-error' : ''}}">
                                        <label for="total_distance" class="control-label">Total Distance<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="total_distance" type="number" id="total_distance" value="{{old('total_distance')}}" placeholder="Enter Total Distance" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('estimated_at') ? 'has-error' : ''}}">
                                        <label for="estimated_at" class="control-label">Estimated At<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="estimated_at" type="text" id="estimated_at" value="{{old('estimated_at')}}" placeholder="Enter Estimated At" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
                                        <label for="started_at" class="control-label">Started At<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="started_at" type="date" id="started_at" value="{{old('started_at')}}" placeholder="Enter Started At" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('completed_at') ? 'has-error' : ''}}">
                                        <label for="completed_at" class="control-label">Completed At<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="completed_at" type="date" id="completed_at" value="{{old('completed_at')}}" placeholder="Enter Completed At" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('est_duration') ? 'has-error' : ''}}">
                                        <label for="est_duration" class="control-label">Est Duration<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="est_duration" type="text" id="est_duration" value="{{old('est_duration')}}" placeholder="Enter Est Duration" >
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="branch_id">Branch Id</label>
                                        <select required name="branch_id" id="branch_id" class="form-control select2">
                                            <option value="" readonly>Select Branch Id</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="consignor_id">Consignor Id</label>
                                        <select required name="consignor_id" id="consignor_id" class="form-control select2">
                                            <option value="" readonly>Select Consignor Id</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group">
                                        <label for="consignee_id">Consignee Id</label>
                                        <select required name="consignee_id" id="consignee_id" class="form-control select2">
                                            <option value="" readonly>Select Consignee Id</option>
                                                                                    </select>
                                    </div>
                                </div>
                                                                                            
                                <div class="col-md-6 col-12"> 
                                    <div class="form-group {{ $errors->has('devices') ? 'has-error' : ''}}">
                                        <label for="devices" class="control-label">Devices<span class="text-danger">*</span> </label>
                                        <input required  class="form-control" name="devices" type="text" id="devices" value="{{old('devices')}}" placeholder="Enter Devices" >
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
        $('#LorryReceiptForm').validate();
                                                                                                                                                                                                                                    
    </script>
    @endpush
@endsection
