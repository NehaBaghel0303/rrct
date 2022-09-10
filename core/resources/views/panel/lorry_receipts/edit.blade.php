@extends('backend.layouts.main') 
@section('title', 'Lorry Receipt')
@section('content')
@php

$breadcrumb_arr = [
    ['name'=>'Edit Lorry Receipt', 'url'=> "javascript:void(0);", 'class' => '']
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
                            <h5>Edit Lorry Receipt</h5>
                            <span>Update a record for Lorry Receipt</span>
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
                        <h3>Update Lorry Receipt</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Geofencing Mode</h6>
                        <form action="{{ route('panel.lorry_receipts.update',$lorry_receipt->id) }}" method="post" enctype="multipart/form-data" id="LorryReceiptForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-radio">
                                        <div class="radio radio-inline">
                                            <label>
                                                <input type="radio" @if($lorry_receipt->tracking_mode == 0) checked @endif name="tracking_mode" class="trackingMode" value="0">
                                                <i class="helper"></i>Standard
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-radio">
                                        <div class="radio radio-inline">
                                            <label>
                                                <input type="radio"  @if($lorry_receipt->tracking_mode == 1) checked @endif name="tracking_mode" class="trackingMode" value="1">
                                                <i class="helper"></i>Geofence
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2  @if($lorry_receipt->tracking_mode == 0) d-none  geofenceId @endif">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select name="src_geofence_id" id="" class="form-control select2 selectSource">
                                            <option value="" aria-readonly="true">Select Source</option>
                                            @foreach ($geofences as $geofence)
                                                <option @if($lorry_receipt->src_geofence_id == $geofence->id) selected @endif value="{{ $geofence->id }}" >{{ $geofence->name }} - #{{ $geofence->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select name="desti_geofence_id" id="destination" class="form-control select2">
                                            @if($lorry_receipt->desti_geofence_id != null)
                                                <option value="{{ $lorry_receipt->desti_geofence_id }}" selected>{{ fetchFirst('App\Models\GeoFence',$lorry_receipt->desti_geofence_id,'name') }} - #{{ $lorry_receipt->desti_geofence_id }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
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
        $('#LorryReceiptForm').validate();
          
        $('.trackingMode').on('click',function(){
            if($(this).val() == 1){
                $('.geofenceId').removeClass('d-none');
            }else{
                $('.geofenceId').addClass('d-none'); 
            }
        });

        $('.selectSource').on('change',function(){
            var source_id = $(this).val();
            url = "{{ route('panel.lorry_receipts.get.destination') }}";
            $.ajax({
                url: url,   
                method: 'get',
                datatype: "html",
                data: {source_id : source_id},
                success: function(res){
                    $('#destination').html(res);
                }   
            });
        })
    </script>
    @endpush
@endsection
