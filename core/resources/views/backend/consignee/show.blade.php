@extends('backend.layouts.main') 
@section('title', 'Client')
@section('content')
@php
    $breadcrumb_arr = [
        ['name'=>'Client', 'url'=> "javascript:void(0);", 'class' => 'active']
    ];
    @endphp
    @push('head')
    <style>
        .nav-link{
            padding: 0.1rem 1rem;
            font-size: 15px;
        }
    </style>
    @endpush

    <div class="container-fluid">
        <div class="page-header card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div>
                                <div class="header-icon bg-blue">
                                    <i class="ik ik-command text-white "></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $client->name }}</h5>
                                <span class="text-muted">{{ $client->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-type="overview" id="pills-overview-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-overview" aria-selected="false">{{ __('Overview')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-type="lr" id="pills-lorry-receipt-tab" data-toggle="pill" href="#lorry-receipt" role="tab" aria-controls="pills-lorry-receipt" aria-selected="true">{{ __('Lorry Receipts')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-type="vehicles" id="pills-vehicles-tab" data-toggle="pill" href="#vehicles" role="tab" aria-controls="pills-vehicles" aria-selected="true">{{ __('Vehicles')}}</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <td>{{ $client->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consignee</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>EWB No.</th>
                                            <td>{{ $payload->lr_details->ewb_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Invoice No.</th>
                                            <td>{{ $payload->lr_details->invoice_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipment No.</th>
                                            <td>{{ $payload->lr_details->shipment_no}}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lorry-receipt" role="tabpanel" aria-labelledby="pills-lorry-receipt-tab">
                      <div class="table-responsive">
                        <table id="lorryRecieptTable" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th class="text-center no-export"># 
                                    </th>
                                    <th class="">
                                     Lorry Receipt No 
                                    </th>
                                    <th class="">
                                        Vehicle No. 
                                    </th>
                                    <th class="">
                                        Branch 
                                    </th>
                                    <th class="">
                                       EWB
                                    </th>
                                    <th class="">
                                       Invoice No.
                                    </th>
                                    <th class="">
                                        Source
                                    </th>
                                    <th class="">
                                        Destination 
                                    </th>
                                    <th class="">
                                        Consignor
                                    </th>
                                    <th class="">
                                        Consignee
                                    </th>
                                    <th class="">
                                       Status 
                                    </th>
                                    <th class="">
                                      Created At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                             
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="vehicles" role="tabpanel" aria-labelledby="pills-vehicles-tab">
                      <div class="table-responsive">
                        <table class="table table-striped " id="vehiclesTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Actions</th>
                                    <th>#</th>
                                    <th>Vehicle</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehicles as $vehicle)
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action<i
                                                    class="ik ik-chevron-right"></i></button>
                                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">    
                                                <a href="" title="Edit Lorry Receipt" class="dropdown-item">
                                                    <li class="p-0">Edit</li>
                                                </a>
                                                <a href="" title="Show Lorry Receipt" class="dropdown-item">
                                                    <li class="p-0">Show</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>#VEH{{ $vehicle->id }}</td>
                                    <td>{{ $payload->lr_details->lrno }}</td>
                                    <td>{{ $vehicle->vehicle_no }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center">No Records!</td></tr>    
                            @endforelse
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @push('script')

    <script>
        $(document).ready(function() {

            var table = $('#lorryRecieptTable').DataTable({
                responsive: true,
                fixedColumns: true,
                fixedHeader: true,
                scrollX: false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-success',
                        header: true,
                        footer: true,
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis',
                    {
                        extend: 'print',
                        className: 'btn-sm btn-primary',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible',
                            stripHtml: false
                        }
                    }
                ]

            });
            var table = $('#vehiclesTable').DataTable({
                responsive: true,
                fixedColumns: true,
                fixedHeader: true,
                scrollX: false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-success',
                        header: true,
                        footer: true,
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis',
                    {
                        extend: 'print',
                        className: 'btn-sm btn-primary',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible',
                            stripHtml: false
                        }
                    }
                ]

            });
        });
    </script>
      
    @endpush
@endsection
