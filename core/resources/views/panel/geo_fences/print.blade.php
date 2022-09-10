@extends('backend.layouts.empty') 
@section('title', 'Geo Fences')
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
@endphp
   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                     
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>                                      
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Cordinates</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($geo_fences->count() > 0)
                                    @foreach($geo_fences as  $geo_fence)
                                        <tr>
                                            <td>{{$geo_fence['name'] }}</td>
                                             <td>{{$geo_fence['location'] }}</td>
                                             <td>{{$geo_fence['type'] }}</td>
                                             <td>{{$geo_fence['cordinates'] }}</td>
                                                 
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
