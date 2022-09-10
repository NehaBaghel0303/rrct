<div id="mapDashboard"></div>

@push('head')
    <style>
        html, body {
            height: 100%;
          }
        
          #mapDashboard {
          width: 100%;
          height: 88vh;
          max-height: 88vh;
          position: relative !important;
          display: block;
        }
    </style>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg"
    async defer
  ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>
@endpush

@push('script')
  <script>

    
      
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
            
            map = new google.maps.Map(document.getElementById('mapDashboard'), {
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
        $(document).ready(function(){
          initMap();
        });
    
    </script>
@endpush