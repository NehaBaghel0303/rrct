@extends('backend.layouts.empty') 
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
                                    <th>Device Id</th>
                                    <th>Type</th>
                                    <th>Vht Type</th>
                                    <th>Distance Covered</th>
                                    <th>Distance Remain</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($l_r_progress->count() > 0)
                                    @foreach($l_r_progress as  $l_r_progress)
                                        <tr>
                                            <td>{{$l_r_progress['lr_id'] }}</td>
                                             <td>{{$l_r_progress['device_id'] }}</td>
                                             <td>{{$l_r_progress['type'] }}</td>
                                             <td>{{$l_r_progress['vht_type'] }}</td>
                                             <td>{{$l_r_progress['distance_covered'] }}</td>
                                             <td>{{$l_r_progress['distance_remain'] }}</td>
                                                 
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
