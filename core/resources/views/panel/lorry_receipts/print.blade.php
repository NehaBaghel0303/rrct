@extends('backend.layouts.empty') 
@section('title', 'Lorry Receipts')
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
@endphp
   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                     
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>                                      
                                    <th>Lr No</th>
                                    <th>Payload</th>
                                    <th>Total Distance</th>
                                    <th>Estimated At</th>
                                    <th>Started At</th>
                                    <th>Completed At</th>
                                    <th>Est Duration</th>
                                    <th>Branch Id</th>
                                    <th>Consignor Id</th>
                                    <th>Consignee Id</th>
                                    <th>Devices</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($lorry_receipts->count() > 0)
                                    @foreach($lorry_receipts as  $lorry_receipt)
                                        <tr>
                                            <td>{{$lorry_receipt['lr_no'] }}</td>
                                             <td>{{$lorry_receipt['payload'] }}</td>
                                             <td>{{$lorry_receipt['total_distance'] }}</td>
                                             <td>{{$lorry_receipt['estimated_at'] }}</td>
                                             <td>{{$lorry_receipt['started_at'] }}</td>
                                             <td>{{$lorry_receipt['completed_at'] }}</td>
                                             <td>{{$lorry_receipt['est_duration'] }}</td>
                                             <td>{{$lorry_receipt['branch_id'] }}</td>
                                             <td>{{$lorry_receipt['consignor_id'] }}</td>
                                             <td>{{$lorry_receipt['consignee_id'] }}</td>
                                             <td>{{$lorry_receipt['devices'] }}</td>
                                                 
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
