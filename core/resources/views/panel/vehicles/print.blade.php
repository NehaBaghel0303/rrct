@extends('backend.layouts.empty') 
@section('title', 'Vehicles')
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
@endphp
   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                     
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>                                      
                                    <th>Vehicle No</th>
                                    <th>Image</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($vehicles->count() > 0)
                                    @foreach($vehicles as  $vehicle)
                                        <tr>
                                            <td>{{$vehicle['vehicle_no'] }}</td>
                                             <td><a href="{{ asset($vehicle['image']) }}" target="_blank" class="btn-link">{{$vehicle['image'] }}</a></td>
                                             <td>{{$vehicle['details'] }}</td>
                                             <td>{{$vehicle['status'] }}</td>
                                                 
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
