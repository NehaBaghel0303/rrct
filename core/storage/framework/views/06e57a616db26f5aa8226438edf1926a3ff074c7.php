<!DOCTYPE html>

<html>
  <head>
    <title>Custom Markers</title>
    <style>
        #map {
    height: 100%;
    position: revert !important;
  }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  </head>
  <body>
    <div id="map" style=""></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg&callback=initMap&v=weekly"
      defer
    ></script>

    <script>

let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(20.5937, 78.9629),
    zoom: 5,
  });

  const iconBase =
    "<?php echo e(asset('backend/img/trucks')); ?>";
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

  // Create markers.
  for (let i = 0; i < features.length; i++) {
    const marker = new google.maps.Marker({
      position: features[i].position,
      icon: icons[features[i].type].icon,
      map: map,
    });
  }
}

window.initMap = initMap;

    </script>
  </body>
</html>
<?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/frontend/map.blade.php ENDPATH**/ ?>