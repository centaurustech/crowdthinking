<!DOCTYPE html>
<html>
  <!-- Mirrored from envato.megadrupal.com/html/kickstars/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:21:02 GMT -->
  <head>
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1">
    <title>Welcome to <?php echo $page_title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300"
      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/jquery.sidr.light.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/md-slider.css">
    <link rel="stylesheet" href="css/style.css">
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="css/ie7.css"/>    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>    <![endif]-->
    <link rel="stylesheet" href="css/responsive.css">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>    <![endif]-->
	
	     <script src="https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false" type="text/javascript"></script>
   
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
	$sql_command = "SELECT c.city as city,c.id as cID,p.id as pID,p.projecttitle as title, lng, lat FROM  `projects` p, Cities c WHERE p.city = c.id";
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	
	
	// Results loop
	echo '
	
	 var infoWindowContent5;
	 
	 infoWindowContent5 =\'<b><a href="project.php?id=1">Erstes Projekt</a></b><br>\';
	
	 var infowindow5 = new google.maps.InfoWindow({
      content: infoWindowContent5
		});
		var marker5 = new google.maps.Marker({
      position: new google.maps.LatLng(48.6833, 12.5),
      map: map,
      draggable: false,
	  title: \'Moosthenning\'
    });
		  google.maps.event.addListener(marker5, \'click\', function() {
    infowindow5.open(map,marker5);
  });';
	

?>
}



      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.touchwipe.min.js"></script>
    <script type="text/javascript" src="js/md_slider.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/twitter.min.js"></script>
    <script type="text/javascript" src="js/pie.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

		<?php include_once("top_menue.php"); ?>
    <!-- end: .wrap-top-menu -->
        <?php include_once("header.php"); ?>
		   <?php include_once("indexContent.php"); ?>
      <!--end: #header -->
      <div id="home-slider">
        <div class="md-slide-items md-slider" id="md-slider-1" data-thumb-width="105"
          data-thumb-height="70">
          <div class="md-slide-item slide-0" data-timeout="6000">
            <div class="md-mainimg"><img src="images/ex/th-slide0.jpg" alt=""></div>
            <div class="md-objects">
              <div class="md-object rs slide-title" data-x="20" data-y="38" data-width="480"
                data-height="30" data-start="700" data-stop="5500" data-easein="random"
                data-easeout="keep">
                <p>Haben Sie eine Idee, die Sie gerne umsetzen m&ouml;chten?</p>
              </div>
              <div class="md-object rs slide-description" data-x="20" data-y="160"
                data-width="480" data-height="90" data-start="1400" data-stop="7500"
                data-easein="random" data-easeout="keep">
                <p><?php echo "1";?></p>
              </div>
              <div class="md-object rs" data-x="20" data-y="260" data-width="120"
                data-height="23" data-padding-top="9" data-padding-bottom="7" data-padding-left="10"
                data-padding-right="10" data-start="1800" data-stop="7500" data-easein="random"
                data-easeout="keep"> <a href="how-it-works.php" class="btn btn-gray">Erfahren Sie wie...</a> </div>
              <div class="md-object" data-x="495" data-y="0" data-width="612" data-height="365"
                data-start="1800" data-stop="7500" data-easein="fadeInRight" data-easeout="keep"
                style=""><img src="images/ex/th-552x411-1.jpg" alt="Search Money for Your Creative Ideas"
                  height="365" width="612"></div>
            </div>
          </div>
          <div class="md-slide-item slide-1" data-timeout="6000">
            <div class="md-mainimg"><img src="images/ex/th-slide1.jpg" alt=""></div>
            <div class="md-objects">
              <div class="md-object rs slide-title" data-x="20" data-y="188" data-width="390"
                data-height="30" data-start="700" data-stop="5500" data-easein="random"
                data-easeout="random">
                <p>Viele K&ouml;pfe - Ein Ziel.</p>
              </div>
              <div class="md-object rs slide-description2" data-x="20" data-y="250"
                data-width="390" data-height="100" data-start="1400" data-stop="4500"
                data-easein="random" data-easeout="random">
                <p><?php echo "";?></p>
              </div>
              <div class="md-object" data-x="454" data-y="44" data-width="327" data-height="268"
                data-start="1000" data-stop="5500" data-easein="random" data-easeout="random"
                style=""><img src="images/ex/slide1_1.png" alt="Responsive" height="268"
                  width="327"></div>
              <div class="md-object" data-x="628" data-y="142" data-width="298"
                data-height="176" data-start="1600" data-stop="5100" data-easein="random"
                data-easeout="random" style=""><img src="images/ex/slide1_2.png"
                  alt="Responsive" height="176" width="298"></div>
              <div class="md-object" data-x="837" data-y="169" data-width="119"
                data-height="149" data-start="2200" data-stop="4800" data-easein="random"
                data-easeout="random" style=""><img src="images/ex/slide1_3.png"
                  alt="Responsive" height="149" width="119"></div>
              <div class="md-object" data-x="809" data-y="208" data-width="59" data-height="114"
                data-start="2800" data-stop="4500" data-easein="random" data-easeout="random"
                style=""><img src="images/ex/slide1_4.png" alt="Responsive" height="114"
                  width="59"></div>
            </div>
          </div>
          <div class="md-slide-item slide-2" data-timeout="4000">
            <div class="md-mainimg"><img src="images/ex/th-slide2.jpg" alt=""></div>
            <div class="md-objects">
              <div class="md-object slide-with-background" data-x="20" data-y="58"
                data-width="500" data-height="170" data-padding-top="30" data-padding-bottom="30"
                data-padding-left="35" data-padding-right="35" data-start="300"
                data-stop="3600" data-easein="random" data-easeout="keep">
                <h2 class="rs slide-title">Starten Sie Ihr Projekt noch heute!</h2>
                <p class="rs slide-description2"><?php echo "";?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end: #home-slider -->
      <div class="home-feature-category">
        <div class="container_12 clearfix">
          <div class="grid_4 left-lst-category">
            <div class="wrap-lst-category">
              <h3 class="title-welcome rs">Willkommen <?php echo $pageTitle; ?></h3>
              <p class="description rs"><?php echo 'Durchsuchen Sie unsere Kategorien...' ?></p>
              <nav class="lst-category">
                <ul class="rs nav nav-category">
				<!-- Loop to show categories -->
                  <?php echo $categories;?>
      <!-- End Loop Categories-->
                </ul>
              </nav>
              <!--end: .lst-category --> </div>
          </div>
          <!--end: .left-lst-category -->
          <div class="grid_8 marked-category">
            <div class="wrap-title clearfix">
              <h2 class="title-mark rs">Featured: <span class="fc-orange"><?php echo "";?></span></h2>
              <a href="category.html" class="count-project be-fc-orange">Alle Projekte</a> </div>
            <div class="box-marked-project project-short">
              <div class="top-project-info">
                <div class="content-info-short clearfix"> <a href="#" class="thumb-img">
                    <img src="<?php echo $fImage; ?>" alt="$TITLE"> </a>
                  <div class="wrap-short-detail">
                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="project.html"><?php echo $fTitle;?></a></h3>
                    <p class="rs tiny-desc">von <a href="profile.html" class="fw-b fc-gray be-fc-orange"><?php echo $fAuthor;?></a> in 
					<span class="fw-b fc-gray"><?php echo $fCity;?></span></p>
                    <p class="rs title-description"><?php echo $fDesc;?></p>
                  </div>
                  
                </div>
              </div>
              <!--end: .top-project-info -->
              <div class="bottom-project-info clearfix">
                <div class="project-progress sys_circle_progress" data-percent="<?php echo $fdaysPer; ?>">
                  <div class="sys_holder_sector"></div>
                </div>
                           <div class="group-fee clearfix">
                                <div class="sep"></div>
                                <div class="fee-item">
                                    <p class="rs lbl"> Tage verbleibend </p>
                                    <span class="val"><?php echo $fdaysLeft; ?></span>
                                </div>
                            </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <!--end: .marked-category -->
          <div class="clear"></div>
        </div>
      </div>
      <!--end: .home-feature-category -->
      <div class="home-popular-project">
        <div class="container_12">
          <div class="grid_12 wrap-title">
            <h2 class="common-title">Projektkarte</h2>
			<div id="map_canvas" class="map_canvas"></div>
          </div>
          <div class="clear"></div>
          <div class="lst-popular-project clearfix">
			<?php echo $popular; ?>
			<!--TODO Loop to load projects-->
            <!--end: .grid_3 > .project-short-->

            <!--end: .grid_3 > .project-short-->
           
   <!-- End   Loop Projects-->
            <!--end: .grid_3 > .project-short--> </div>
        </div>
      </div>
      <!--end: .home-popular-project -->
     <!-- <div class="home-discover-friends">
        <div class="container_12">
          <div class="row-friends"> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a>
            <div class="clear"></div>
          </div>
          <div class="row-friends row-connect-fb"> <a class="thumb-avatar t-first"
              href="#"><img src="images/sample.jpg" alt="$USER_NAME"></a>
            <div class="connect-fb">
              <p class="rs description">Discover great projects with your
                friends!</p>
              <a href="#" class="btn btn-fb">Connect With Facebook(sr)</a> </div>
            <a class="thumb-avatar t-last" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a>
            <div class="clear"></div>
          </div>
          <div class="row-friends"> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a> <a class="thumb-avatar" href="#"><img src="images/sample.jpg"
                alt="$USER_NAME"></a>
            <div class="clear"></div>
          </div>
        </div>
      </div>-->
      <!--end: .home-discover-friends -->
     <!-- <div class="additional-info-line">
        <div class="container_12">
          <div class="grid_9">
            <h2 class="rs title"></h2>
            <p class="rs description"></p>
          </div>
          <div class="grid_3 ta-r"> <a class="btn bigger btn-red" href="#">Learn
              more(sr)</a> </div>
          <div class="clear"></div>
        </div>
      </div>-->
      <!--end: .additional-info-line -->
<?php include_once("footer.php");?>
      <!--end: #footer -->
    </div>
    
 <?php include_once("loginRegister.php"); ?>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20585382-5', 'megadrupal.com');
  ga('send', 'pageview');

</script>
  </body>
  <!-- Mirrored from envato.megadrupal.com/html/kickstars/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:23:06 GMT -->
</html>
