@extends('backend.layouts.empty') 
@section('title', 'Device Logs')
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
@endphp
   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                     
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>                                      
                                    <th>Lr Id</th>
                                    <th>Lat</th>
                                    <th>Lon</th>
                                    <th>Vehicle No</th>
                                    <th>Type</th>
                                    <th>Vht Type</th>
                                    <th>Device Id</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($device_logs->count() > 0)
                                    @foreach($device_logs as  $device_log)
                                        <tr>
                                            <td>{{$device_log['lr_id'] }}</td>
                                             <td>{{$device_log['lat'] }}</td>
                                             <td>{{$device_log['lon'] }}</td>
                                             <td>{{$device_log['vehicle_no'] }}</td>
                                             <td>{{$device_log['type'] }}</td>
                                             <td>{{$device_log['vht_type'] }}</td>
                                             <td>{{$device_log['device_id'] }}</td>
                                                 
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
