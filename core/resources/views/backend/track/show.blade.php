@extends('backend.layouts.track') 
@section('title', 'Track')
@section('content')


    @push('head')
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                width: 100%;
            }
            #map {
                margin: 0;
                padding: 0;
                height: 90vh !important;
            }
            #directions-form {
                margin: 0;
                padding: 0;
                width: 20%;
                height: 100%;
            }
        </style>
    @endpush


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
    			
var now_lat_lng = "25.805378,80.145512";
/* off track */ 
/* var now = new google.maps.LatLng(22.119815578084737, 79.572674470289); */
/* on track */ 
var now = new google.maps.LatLng(25.805378,80.145512);
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var points_arr = [];
var points_distance_arr = [];
var points_pair_arr = [];
var polyline = null;
var gmarkers = [];
var infowindow = new google.maps.InfoWindow();
function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {
      lat: 22.11147836138513,
      lng: 79.54720604396957
    }
  });
  polyline = new google.maps.Polyline({
    path: [],
    strokeColor: '#FF0000',
    strokeWeight: 3
  });


  directionsDisplay.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsDisplay);
  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('btn').addEventListener('click', onChangeHandler);
}

  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.

  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  const image = {
    url: "{{asset('backend/img/trucks/green-truck-01.png')}}",
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32),
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  const shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: "poly",
  };


function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	
     	var now_marker = new google.maps.Marker({
           map: map,
           icon: image,
           shape: shape,
           position: now,
         });

   var waypts = [];
  var checkboxArray = document.getElementsByClassName('waypoints');
  for (var i = 0; i < checkboxArray.length; i++) {
    var address = checkboxArray[i].value;
    if (address != '') {
      waypts.push({
        location: checkboxArray[i].value,
        stopover: true
      });
    }
  } 




//   directionsService.route({
//     origin: document.getElementById('start').value,
//     waypoints: waypts,
//     destination: document.getElementById('end').value,
//     travelMode: 'DRIVING'
//   }, function(response, status) {
//     if (status == google.maps.DirectionsStatus.OK) {
//       polyline.setPath([]);
//       var bounds = new google.maps.LatLngBounds();
//       startLocation = new Object();
//       endLocation = new Object();
//       directionsDisplay.setDirections(response);
//       var route = response.routes[0];
//       // For each route, display summary information.
//       var path = response.routes[0].overview_path;
//       var legs = response.routes[0].legs;
//       for (i = 0; i < legs.length; i++) {
//         if (i == 0) {
//           startLocation.latlng = legs[i].start_location;
//           startLocation.address = legs[i].start_address;
//           // marker = google.maps.Marker({map:map,position: startLocation.latlng});
//           marker = createMarker(legs[i].start_location, "start", legs[i].start_address, "green");
//         }
//         endLocation.latlng = legs[i].end_location;
//         endLocation.address = legs[i].end_address;
//         var steps = legs[i].steps;
//         for (j = 0; j < steps.length; j++) {
//           var nextSegment = steps[j].path;
//           for (k = 0; k < nextSegment.length; k++) {
//             polyline.getPath().push(nextSegment[k]);
//             bounds.extend(nextSegment[k]);
//           }
//         }
//       }
  
//       polyline.setMap(map);
//       for (var i=0; i<gmarkers.length; i++) {
//         gmarkers[i].setMap(null);
//       }
//       gmarkers = [];
//       var points = polyline.GetPointsAtDistance(1000);
      
      
      
//       for (var i=0; i<points.length; i++) {
//          var marker = new google.maps.Marker({
//            map: map,
//            icon:  "{{ asset('backend/img/location_dot_blue.png') }}",
//            position: points[i],
//            title: i+1+" mile"
//          });
//          marker.addListener('click', openInfoWindow); 
         
//          gmarkers.push(marker);
//          points_arr.push(marker.getPosition().toUrlValue(6));
         
//         var temp_distance = haversine_distance(marker, now_marker);
//          points_distance_arr.push(temp_distance);
//         var temp_arr= { pair: marker.getPosition().toUrlValue(6), distance: temp_distance }; 
//         points_pair_arr.push(temp_arr);
//       }
//          routeDiviator(points_pair_arr, points_distance_arr);
         
//     } else {
//       alert("directions response " + status);
//     }
//   }); 
}
google.maps.event.addDomListener(window, 'load', initMap);

function routeDiviator(points, distance){

  
	var nearest = points.keySort('distance')[0];
  console.log(nearest);
  if(nearest.distance < 1){
  	console.log('On Track');
  }else{
  	console.log('Off Track');
  }

}

/*! FUNCTION: ARRAY.KEYSORT(); **/
Array.prototype.keySort = function(key, desc){
  this.sort(function(a, b) {
    var result = desc ? (a[key] < b[key]) : (a[key] > b[key]);
    return result ? 1 : -1;
  });
  return this;
}

function createMarker(latlng, label, html, color) {
  // alert("createMarker("+latlng+","+label+","+html+","+color+")");
  var contentString = '<b>' + label + '</b><br>' + html;
  var marker = new google.maps.Marker({
    position: latlng,
    // draggable: true, 
    map: map,
    icon: getMarkerImage(color),
    title: label,
    zIndex: Math.round(latlng.lat() * -100000) << 5
  });
  marker.myname = label;
  gmarkers.push(marker);

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map, marker);
  });
  return marker;
}
function openInfoWindow() {
    var contentString = this.getTitle()+"<br>"+this.getPosition().toUrlValue(6);
    infowindow.setContent(contentString);
    infowindow.open(map, this);
}
var icons = new Array();
icons["red"] = {url: "http://maps.google.com/mapfiles/ms/micons/red.png"};

function getMarkerImage(iconColor) {
   if ((typeof(iconColor)=="undefined") || (iconColor==null)) { 
      iconColor = "red"; 
   }
   if (!icons[iconColor]) {
      icons[iconColor] = {url:"http://maps.google.com/mapfiles/ms/micons/"+ iconColor +".png"};
   } 
   return icons[iconColor];

}


function haversine_distance(mk1, mk2) {
      var R = 3958.8; // Radius of the Earth in miles
      var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
      var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d.toFixed(2);
    }

</script>
@endpush