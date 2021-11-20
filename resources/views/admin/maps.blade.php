<!DOCTYPE html>
<html>
  <head>
    <title>COTEL</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      let map;
navigator.geolocation.getCurrentPosition( fn_ok, fn_mal);
function fn_mal(){}
function fn_ok(rta){
 var lat=rta.coords.latitude;
 var lon=rta.coords.longitude;
 
}
      function initMap() {

        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -16.4740967, lng: -68.14786269999999 },
          zoom: 8,
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV26PPDhdl36mOjDKQJ8a_Bm7XX3b8spI&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>