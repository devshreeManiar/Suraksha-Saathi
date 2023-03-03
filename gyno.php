<?php
$us=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gynecologists</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
  #map {
      height: 900px;
      margin: 10px auto;
      width: 100%;
  }  

</style>
</head>
<body>
 
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h1 class="w3-padding-64"><b>Suraksha <br>Saathi</b></h1>
  </div>
  <div class="w3-bar-block">
    <a href="upload.php?username=<?php 
                            echo $us;                        
                            ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
  </div>
</nav>
 
<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-blue w3-margin-right" onclick="w3_open()">☰</a>
  <span>Suraksha Sathi</span>
</header>
 
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

   
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Gynecologists near you </b></h1>
    <hr style="width:50px;border:5px solid black" class="w3-round">
  </div>
 
  <div id="map"></div>
   

<script>
var map;
var x=document.getElementById("print");
var pyrmont = {
        lat: 23.8701334,
        lng: 90.2713944
    };
function initMap() {
    // Create the map.
   

    if (navigator.geolocation) {
        try {
            navigator.geolocation.getCurrentPosition(gps);
        } catch (err) {

        }
    }
}
    function gps(position)
    {
   
    pyrmont = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                //x.innerHTML=pyrmont.lat;
    map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 20
    });

    // Create the places service.
    var service = new google.maps.places.PlacesService(map);

    // Perform a nearby search.
    service.nearbySearch({
            location: pyrmont,
            radius: 2000,
            //rankby: disatance,
            type: 'hospital'
        },
        function(results, status, pagination) {
            if (status !== 'OK') return;

            createMarkers(results);
            getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
            };
        });
    }

function createMarkers(places) {
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
        var image = {
            url: places[0].icon,
            size: new google.maps.Size(100, 100),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
        };

        var marker = new google.maps.Marker({
            map: map,
            //icon: image,
            title: place.name,
            position: place.geometry.location

        });
        bounds.extend(place.geometry.location);
    }
    map.fitBounds(bounds);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB94jUkh-vz9mGiZsRaDvGOzbwAnxlKgaU&libraries=places&callback=initMap" async defer></script>

 
  <!-- Photo grid (modal) -->
 
 
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>
</div>
 

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
 

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>


</body>
</html>
