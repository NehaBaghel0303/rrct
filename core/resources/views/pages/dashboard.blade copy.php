@extends('backend.layouts.main') 
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="{{asset('map/src/style/css/pluginStyle.css')}}">
    <div class="container-fluid">
        @if(auth()->check())    
            @if(auth()->user()->roles[0]->name == 'Super Admin')
                @include('backend.dashboard.developer')
            @elseif(auth()->user()->roles[0]->name == 'Admin')
               @include('backend.dashboard.admin')
            @else
                @include('backend.dashboard.user')
            @endif  
        @endif
    </div>
	
    
   
@endsection

@push('script')
    <script>
        $('#searchVehicle').on('keyup',function(){
            var search_value = $(this).val().toLowerCase();
            $(".vehicle-boxes").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_value) > -1)
            });
        });

        var urlPath = "{{url('/')}}"+'/map/';
        var trucks = "{{route('panel.get.devices.json')}}";
        var device_types = [];
        device_types['trucks'] = trucks;
        console.log(trucks);
    </script>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&key="></script>
    <script src="{{asset('map/src/shop-locator.js')}}"></script>

    <script>

        $('.vehicleStatus').on('click',function(){
            var statusId = $(this).val();
            if(statusId != 0){
                $('.vehicle-boxes').hide();
                $('.vehcile-no-'+statusId).show();
            }else{
                $('.vehicle-boxes').show();
            }
        });

        $('#searchVeichleBtn').on('click',function(){
          var formData = $('#vehicleFilterForm').serialize();
          console.log(formData);
          url = "{{ route('panel.get.vehicle.record') }}";
            $.ajax({
                url: url,   
                method: 'get',
                data: formData,
                success: function(data){
                    console.log(data);
                }   
            });
        })
        
       (function ($) {
        "use strict";

        $(document).ready(function () {

            $(".mainMap").ShopLocator({
            pluginStyle: "cosmic",
            pathToJSONDirectory: '',
            difFiles: device_types,
            infoBubble: {
                visible: true,
                arrowPosition: 50,
                minHeight: 112,
                maxHeight: null,
                minWidth: 170,
                maxWidth: 250
            },
            markersIcon: urlPath+"src/style/cosmic/images/marker.png",
            cluster:{
                enable: true,
                gridSize: 50,
                maxZoom: 11,
                minZoom: 2,
                style:{
                    textColor: '#4757a3',
                    textSize: 18,
                    heightSM: 42,
                    widthSM: 42,
                    heightMD: 56,
                    widthMD: 56,
                    heightBIG: 75,
                    widthBIG: 75,
                    iconSmall: urlPath+"src/style/cosmic/images/clusterSmall.png",
                    iconMedium: urlPath+"src/style/cosmic/images/clusterMedium.png",
                    iconBig: urlPath+"src/style/cosmic/images/clusterBig.png"
                }
            }
        });


            });



    }(jQuery));


    </script>
@endpush