@extends('backend.layouts.main') 
@section('title', 'Lorry Receipt')
@section('content')
@php

$breadcrumb_arr = [
    ['name'=>'Add Lorry Receipt', 'url'=> "javascript:void(0);", 'class' => '']
]
@endphp
    @push('head')
        <link rel="stylesheet" href="{{ asset('backend/plugins/mohithg-switchery/dist/switchery.min.css') }}">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg&callback=initMap&v=weekly"
        async defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>
    <style>
         
        .error{
                color:red;
            }
            .table-bordered thead td, .table-bordered thead th {
                border-bottom-width: 1px;
            }   
            .table thead {
                background-color: #fff;
                }
                html, body {
                    height: 100%;
                }
                /* .ik{
                    font-weight: 600;
                } */
        </style>
    @endpush

    <div class="container-fluid">
    	<div class="page-header card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div>
                                <div class="header-icon bg-blue">
                                    <i class="ik ik-command text-white "></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $lorry_receipt->lr_no}}</h5>
                                <span class="text-muted">{{ getFormattedDate($lorry_receipt->created_at) }}</span>
                                <div class="mt-2">
                                    <span class="badge badge-{{ lorryReceiptStatus($lorry_receipt->status)['color'] }}">{{ lorryReceiptStatus($lorry_receipt->status)['name'] }}</span>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 ">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="">
                                    <div>
                                        <span><i class="ik ik-user text-success"></i> Consignor</span>
                                    </div>
                                    <div class="lr-details-wrapper">
                                        <span class="">{{ $payload->lr_details->originDetails->consignor}}</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <div>
                                        <span><i class="ik ik-user text-purple"></i> Consignee</span>
                                    </div>
                                    <div class="lr-details-wrapper">
                                        <span>{{ $payload->lr_details->destinationDetails->consignee }}</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <div>
                                        <span><i class="ik ik-server rama-green"></i> Branch Name</span>
                                    </div>
                                    <div class="lr-details-wrapper">
                                        <span class="">{{ $payload->branch }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                
                                <div class="d-flex">
                                    <div>
                                        <span><i class="ik ik-clipboard orange"></i> Invoice No.</span>
                                    </div>
                                    <div class="lr-details-wrapper">
                                        <span>{{ $lorry_receipt->invoice_no}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                               
                                <div class="d-flex">
                                    <div>
                                        <span><i class="ik ik-clipboard pink"></i> Shipment No.</span>
                                    </div>
                                    <div class="lr-details-wrapper">
                                        <span>{{ $lorry_receipt->shipment_no}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex">
                                    <div>
                                        <span><i class="ik ik-clipboard sky-blue"></i> EWB No</span>
                                    </div>
                                    <div class="pl-2 lr-details-wrapper">
                                        <span class="pl-2">{{ $payload->lr_details->ewb_no}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Overview</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row mb-3 bg-light">
                            <div class="col-lg-4 pt-3 text-center border-right">
                                <div>
                                    <i class="ik ik-truck" style="font-size: 40px;"></i>
                                </div>
                                <div class="mt-3">
                                    <span class="text-muted text-center">
                                        GPS Tracker 
                                    </span>
                                    <h6>---</h6>
                                    {{-- <h6>{{ $payload->tracking_details->gps ?? '---'}}</h6> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 pt-3 text-center border-right">
                                <div>
                                    <i class="ik ik-user" style="font-size: 40px;"></i>
                                </div>
                                <div class="mt-3">
                                    <span class="text-muted text-center">
                                       Sim Tracker 
                                    </span>
                                    <h6>--</h6>
                                    {{-- <h6>{{ $payload->tracking_details->sim_tracking }}</h6> --}}
                                </div>
                            </div>
                            {{-- @dd($payload) --}}
                            <div class="col-lg-4 pt-3 text-center border-right">
                                <div>
                                    <i class="ik ik-box" style="font-size: 40px;"></i>
                                </div>
                                <div class="mt-3">
                                    <span class="text-muted text-center">
                                        HVM Tracker 
                                    </span>
                                    <h6>---</h6>
                                    {{-- <h6>{{ $payload->tracking_details->asset_tracking }}</h6> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-4">Trip Details</h5>
                        <div class="timeline">
                            <div class="box">
                                <div class="container">
                                    <div class="lines">
                                        <div class="dot"></div>
                                        <div class="line"></div>
                                        <div class="dot"></div>
                                        <div class="line"></div>
                                        <div class="dot"></div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="cards">
                                        <div class="card mb-0" style="background:#e1fae3;margin-top: 46px;">
                                            <div class="d-flex justify-content-between">
                                                <h4>
                                                    <i class="ik ik-map-pin text-warning pr-1"></i>Origin
                                                </h4>
                                                <div class="mr-3">{{ getFormattedDate(now()) }}</div>
                                            </div>
                                            <p>{{ $payload->lr_details->originDetails->from_place }}</p>
                                        </div>
                                        <div class="card mid" style="background-color: #e4eafb;">
                                            <div class="d-flex justify-content-between">
                                                <h4><i class="ik ik-map-pin text-info pr-1"></i>Now</h4>
                                                <div class="mr-3"> {{ getFormattedDate(now()) }}</div>
                                            </div>
                                        <p>{{ '--' }}</p>
                                        <span></span>
                                        </div>
                                        <div class="card" style="background-color: #d3eef0;">
                                            <div class="d-flex justify-content-between">
                                                <h4><i class="ik ik-map-pin text-success pr-1"></i>Destination</h4>
                                                <div class="mr-3"> {{ getFormattedDate(now()) }}</div>
                                            </div>
                                            <p>{{ $payload->lr_details->destinationDetails->to_place }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div id="map" style=""></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body" style="background: #fffbce54;">
                            <div class=" mb-3">
                                <h5><i class="ik ik-clipboard pr-1"></i> Remarks</h5>
                            </div>
                            <div class="remark-card mb-2 @if($remarks->count() <= 0) d-flex justify-content-center align-items-center @endif" style="height: 300px;">
                                @forelse ($remarks as $remark)
                                @php
                                    $user = App\User::whereId($remark->user_id)->first() ?? '';
                                @endphp
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <img src="{{ ($user && $user->avatar) ?asset($user->avatar) : asset('backend/default/default-avatar.png') }}" class="remark-image"  alt="">
                                                <div class="ml-3" style="width: 26vw;">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-0">{{ NamebyId($remark->user_id) }}</h6> 
                                                        <div class="badge badge-primary ml-2 badge-sm" style="font-size:10px;background:#1a237e;">{{ $remark->type }}</div>
                                                    </div>
                                                    <span class="text-muted">{{ $remark->remarks }}</span>
                                                    <div class="text-muted">
                                                    <small><i class="fa fa-clock mr-1"></i>{{ $remark->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty   
                                    <div class="text-center">
                                        <img src="{{ asset('backend/img/boxes.png') }}" alt="">
                                        <p class="text-muted py-2">No Remarks!</p>
                                        {{-- <button class="btn btn-primary updateRemarkBtn">Update Remark</button> --}}
                                    </div>
                                @endforelse
                            </div>
                            <form action="{{ route('panel.report.remark.store') }}" method="post" id="remarkForm" class="">
                                @csrf
                                <input type="hidden" value="0" name="id" id="remarkId"> 
                                <input type="hidden" value="{{ $lorry_receipt->id }}" name="lorry_receipt_id"> 
                                <input type="hidden" value="lorry Receipt" name="type"> 
                                <textarea name="remark" id="remark" cols="30" rows="5" class="form-control" placeholder="Enter Remark"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- push external js -->
    @push('script')
        <script>
            $('.updateRemarkBtn').click(function(){
                $('#remarkForm').toggleClass('d-none');
            })
   function initMap() {
       const iconBase =
         "{{asset('backend/img/trucks')}}";
       const icons = {
         redTruck: {
           icon: iconBase + "/red-truck-01.png",
         },
         purpleTruck: {
           icon: iconBase + "/purple-truck-01.png",
         },
         greyTruck: {
           icon: iconBase + "/grey-truck-01.png",
         },
         blueTruck: {
           icon: iconBase + "/blue-01.png",
         },
         greenTruck: {
           icon: iconBase + "/green-truck-01.png",
         },
       };
       const features = [
         {
           position: new google.maps.LatLng(22.058399986990676, 75.9650850523904),
           type: "greyTruck",
         },
         {
           position: new google.maps.LatLng(28.065431584285005, 75.2180147963303),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(-33.91818154739766, 151.2346203981781),
           type: "redTruck",
         },
         {
           position: new google.maps.LatLng(26.542583401133225, 76.84399123599056),
           type: "purpleTruck",
         },
         {
           position: new google.maps.LatLng(14.08675913683424, 77.32738963697064),
           type: "blueTruck",
         },
       ];
            var randLatLng = function() {
            return new google.maps.LatLng(((Math.random() * 17000 - 8500) / 100), ((Math.random() * 36000 - 18000) / 100));
            },
            
            map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: {
                lat: 20.5937,
                lng: 78.9629
            }
            }),

            markers = [],
            markerCluster;
            for (let i = 0; i < features.length; i++) {
                (function() {
                var marker = new google.maps.Marker({
                    position: features[i].position,
                    icon: icons[features[i].type].icon,
                    map: map,
                    }),
                    circle = new google.maps.Circle({

                    radius: 30.48,
                    fillColor: '#FACC2E',
                    strokeColor: '#000000',
                    strokeOpacity: 0.75,
                    strokeWeight: 0
                    });
                circle.bindTo('center', marker, 'position');
                circle.bindTo('map', marker, 'map');
                markers.push(marker);
                })();


            }

            markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
            });
        }

        window.initMap = initMap;
      
          
        </script>
    @endpush
@endsection
