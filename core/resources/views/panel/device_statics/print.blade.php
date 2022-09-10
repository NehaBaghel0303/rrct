@extends('backend.layouts.empty') 
@section('title', 'Device Statics')
@section('content')
@php
/**
 * Device Static 
 *
 * @category  zStarter
 *
 * @ref  zCURD
 * @author    Defenzelite <hq@defenzelite.com>
 * @license  https://www.defenzelite.com Defenzelite Private Limited
 * @version  <zStarter: 1.1.0>
 * @link        https://www.defenzelite.com
 */
@endphp
   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                     
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>                                      
                                    <th>Device Id</th>
                                    <th>Status</th>
                                    <th>Last Active At</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($device_statics->count() > 0)
                                    @foreach($device_statics as  $device_static)
                                        <tr>
                                            <td>{{$device_static['device_id'] }}</td>
                                             <td>{{$device_static['status'] }}</td>
                                             <td>{{$device_static['last_active_at'] }}</td>
                                                 
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="8">No Data Found...</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
