<html>
  <head>
      <link rel="stylesheet" href="css/style.css">

     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script>
   
 <script type="text/javascript">

		var map;
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(48.05, 8.2),
          zoom: 5
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);


<?php 
include_once("connector.php");
	$sql_command = "SELECT DISTINCT (c.id), lng, lat FROM  `projects` p, Cities c WHERE p.city = c.id";
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	
	// Results loop
	while($geo = mysqli_fetch_array($result))
	{
		echo ' new google.maps.Marker({
      position: new google.maps.LatLng('.$geo['lat'].', '.$geo['lng'].'),
      map: map,
	  title: \'Title\'
    });
		';
	}

?>
}
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

      
 



  </head>

  <body>
    <div id="map_canvas" class="map_canvas"></div>
  </body>
</html>