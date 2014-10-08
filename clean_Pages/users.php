<!DOCTYPE html>
<html style="height:100%">
<!-- Mirrored from envato.megadrupal.com/html/kickstars/single.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:25 GMT -->
<head>

    <title>Single | <?php echo Article;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/jquery.sidr.light.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="css/ie7.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->
    <link rel="stylesheet" href="css/responsive.css"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/twitter.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="/js/mytweets.js"></script>


    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsueOO45xoTZ68rJw4QaXkXFBRGEl6Z5U">
    </script>

    <script type="text/javascript">

    var marker;
    var map;
    var myLatlng;

      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(45, 25.4),
          zoom: 1
        };

        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

        


        google.maps.event.addListener(map, 'click', function(e) {
          //get_location();
          placeMarker(e.latLng, map);
          //placeMarker(myLatlng, map);
          //get_location();
        //placeMarker(myLatlng,map);
        });
      
      }


      function placeMarker(location, map) {

        if ( marker ) {
          marker.setPosition(location);

          get_location();

        
        } else {
          marker = new google.maps.Marker({
            position: location,
            map: map
          });
        }

        // Otherwise, simply update its location on the map.
            
        map.panTo(position);

        }

        function getlatlng(pos) {
          var latitude = pos.coords.latitude;
          var longitude = pos.coords.longitude;
          myLatlng = new google.maps.LatLng(parseFloat(latitude),parseFloat(longitude));
        }

        function errormessage(error){
          switch(error.code){
            case error.PERMISSION_DENIED:
              alert("Permission denied");
              break;
            case error.POSITION_UNAVAILABLE:
              alert("Position unavailable");
              break;
            case: error.TIMEOUT:
              alert("timeout");
              break;
            case: error.UNKNOWN_ERROR:
              alert("Unknown");
              break;
          }
        }


        function get_location(){

          if(navigator.geolocation){
              // timeout at 60000 milliseconds (60 seconds)
              var options = {timeout:60000};
              navigator.geolocation.getCurrentPosition(getlatlng, 
                                                       errormessage,
                                                       options);
          }else{
              alert("Sorry, browser does not support geolocation!");
          }
        }

        
      


      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body style="height:100%">
<?php include_once "top_menue.php"; ?>
<!-- end: .wrap-top-menu -->
		<?php include_once "header.php"; ?>
       <!--end: #header -->
<?php include_once "connector.php"; ?>
<?php include_once "singleContent.php"; ?>
    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                    
                        <div id="map-canvas" style="height:450px"> 

                        </div>


                        
                
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Categories</h3>
                <p class="rs description pb20"><?php echo $categories_desc;?></p>
                <ul class="rs nav nav-category">
				<?php echo $categories; ?>
                </ul>
            </div>
         <!--   <div class="box-gray">
                <h3 class="title-box">Text Widget</h3>
                <p class="rs description pb20"><?php echo "TextWidget";?></p>
            <!--<a class="btn bigger fill-width btn-white" href="#">Large download button(sr)</a>
                <a class="btn bigger fill-width btn-blue" href="#">Large download button(sr)</a>-->

          <!--  </div>-->
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>

    <div class="additional-info-line">
        <div class="container_12">
            <div class="grid_9">
                <h2 class="rs title"><?php echo "References";?></h2>
                <p class="rs description"><?php echo $References;?></p>
            </div>
         <!--   <div class="grid_3 ta-r">
                <a class="btn bigger btn-red" href="#">Learn more(sr)</a>
            </div>-->
            <div class="clear"></div>
        </div>
    </div><!--end: .additional-info-line -->
	<?php include_once "footer.php";?>
    <!--end: #footer -->

</div>

<?php include_once "loginRegister.php";?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20585382-5', 'megadrupal.com');
  ga('send', 'pageview');

</script>
</body>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/single.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:26 GMT -->
</html>