@extends('backend.layouts.main') 
@section('title', 'Track')
@section('content')

    <style>
 html, body {
    height: 100%;
  }

.map-container {
  width: 100%;
  height: 500px;
  max-height: 500px;
  position: relative !important;
  display: block;
}

    </style>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 pr-2">
                @include('backend.track.include.vehicle-details')
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card " style="background: none;box-shadow:none;">
                    <div class="card-body m-0 p-0">
                        @include('backend.track.include.vehicle-trip')
                        <div class="row">
                            <div class="col-lg-8 p-1">
                                @include('backend.track.include.map')
                            </div>
                            <div class="col-lg-4 p-1">
                                @include('backend.track.include.trip-details')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>

    var urlPath = "{{url('/')}}"+'/map/';
    var trucks = "{{route('panel.get.devices.json')}}";
    var device_types = [];
    device_types['trucks'] = trucks;
    device_types['trucks'] = trucks;
    
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg&callback=initMap&v=weekly" defer
></script>

    <script>
        var lat = "{{explode(',',$payload->originDetails->from_poi)[0] ?? 23.250719644536552}}";
        var lng = "{{explode(',',$payload->originDetails->from_poi)[1] ?? 77.75156271278716}}";
      /**
         * @license
         * Copyright 2019 Google LLC. All Rights Reserved.
         * SPDX-License-Identifier: Apache-2.0
         */
        function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("TrackMap"), {
            zoom: 6,
            center: { lat: lat, lng: lng },
        });

        directionsRenderer.setMap(map);
        document.getElementById("submitMap").addEventListener("click", () => {
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        const waypts = [];
        const checkboxArray = document.getElementById("waypointsMap");

        for (let i = 0; i < checkboxArray.length; i++) {
            if (checkboxArray.options[i].selected) {
            waypts.push({
                location: checkboxArray[i].value,
                stopover: true,
            });
            }
        }

        directionsService
            .route({
            origin: document.getElementById("startMap").value,
            destination: document.getElementById("endMap").value,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.TravelMode.DRIVING,
            })
            .then((response) => {
            directionsRenderer.setDirections(response);

            const route = response.routes[0];
            const summaryPanel = document.getElementById("directions-panelMap");

            summaryPanel.innerHTML = "";

            // For each route, display summary information.
            for (let i = 0; i < route.legs.length; i++) {
                const routeSegment = i + 1;

                summaryPanel.innerHTML +=
                "<b>Route Segment: " + routeSegment + "</b><br>";
                summaryPanel.innerHTML += route.legs[i].start_address + " to ";
                summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
                summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
            }
            })
            .catch((e) => window.alert("Directions request failed due to " + status));
        }

        window.initMap = initMap;

        setTimeout(() => {
            $('#submitMap').click();
        }, 1000);
    </script>
@endpush