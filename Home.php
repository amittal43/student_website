<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";
$dbname = "website";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
	die("Database connection failed: " . 
		mysqli_connect_error() .
		"(" . mysqli_connect_errno() . ")"
	);
	
}

?>
<!DOCTYPE html>
<html>
	<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
	
	</head>
		
	<body>

		<ul class="nav nav-pills navbar-fixed-top">
		  <li role="presentation" class="active"><a href="home.php">Home</a></li>
		  <li role="presentation" class="active"><a href="collegeList.php">College Directory</a></li>
		  <li role="presentation" class="active"><a href="schoolList.php">School Directory</a></li>
		</ul>


		<div class="jumbotron">
		  <h1>Hello, world!</h1>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>


		<div id="map" style="width: 600px; height: 400px; margin-left:20px"></div>

		<!-- <div class="overlay" onClick="style.pointerEvents='none'"></div>
  		<iframe src="https://mapsengine.google.com/map/embed?mid=some_map_id" width="640" height="480"></iframe> -->

  <script type="text/javascript">
    var locations = [
      ['Georgia Tech', 33.778463, -84.398881, 4],
      
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: new google.maps.LatLng(41.492537, -99.901813),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

	
	</body>
</html>

