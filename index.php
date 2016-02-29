<?php
use geo\countries;

include("inc/headfirst.inc.php");
include("inc/header.inc.php");
?>
<div class="row">

    <div class="col-sm-6">

        <?php

        /*$villes = countries::selectAll();
        var_dump($villes);*/

        ?>

    </div>
    <div class="col-sm-6">

        <div id='map' style="position:relative; width:100%; height:500px;"></div>

    </div>

</div>

    <script type="text/javascript">
        var map = null;
        var pin;
        var lat = 47.381233;
        var lon = 1.076539;
        var zoom = 2;
        var defaultZoom = 17;
        var isFirstRezoom = true;
        var watchID;

        Microsoft.Maps.loadModule('Microsoft.Maps.Overlays.Style', { callback: drawMap });
        Microsoft.Maps.Events.addHandler(map, 'viewchange', viewChange);

        function viewChange() {
            if (navigator.geolocation) {
                navigator.geolocation.clearWatch(watchID);
            } else {
                alert('not supported');
            }

            getMapBounds();
        }


        function GEOprocess(position) {

            lat = position.coords.latitude;
            lon = position.coords.longitude;

            console.log(position);

            refreshMap();
            getMapBounds();
        }

        function GEOdeclined(error) {
            /*var s = document.querySelector('#status');
             s.innerHTML = typeof msg == 'string' ? msg : "failed";
             s.className = 'fail';*/
            var x = document.getElementById("map");
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred.";
                    break;
            }

            refreshMap();
            getMapBounds();
        }

        function drawMap() {
            map = new Microsoft.Maps.Map(document.getElementById("map"),
                {credentials: "<?php echo BingMaps_apiKey ?>",
                    center: new Microsoft.Maps.Location(lat, lon),
                    mapTypeId: Microsoft.Maps.MapTypeId.road,
                    zoom: zoom,
                    customizeOverlays: true,
                    showBreadcrumb: true});

            getMapBounds();
        }

        function refreshMap() {

            var newCenter = new Microsoft.Maps.Location(lat, lon);

            if (isFirstRezoom == true) {
                isFirstRezoom = false;
                zoom = defaultZoom;

                map.setView({
                    center: newCenter,
                    zoom: zoom
                });
            }
            else
            {
                map.setView({
                    center: newCenter
                });
            }

            if (!pin) {
                map.entities.clear();
                var pushpinOptions = {
                    /*width: null,
                    height: null,
                    htmlContent: "<span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span>"*/
                };
                pin = new Microsoft.Maps.Pushpin(newCenter, pushpinOptions);
                map.entities.push(pin);
            }
            else
            {
                pin.setLocation(newCenter);
            }
            //console.log(pin);
        }

        function getMapBounds()
        {
            var bounds=map.getBounds();
            //alert('Map bounds: ' +  bounds);
            console.log(bounds);

            var test = new Microsoft.Maps.Location(47.381233, 1.076539);
            console.log(bounds.contains(test));
        }

        if (navigator.geolocation) {
            watchID = navigator.geolocation.watchPosition(GEOprocess, GEOdeclined,
                {
                    enableHighAccuracy:true
                });
        } else {
            alert('not supported');
        }

    </script>

<?php
include("inc/footer.inc.php");
?>