<!DOCTYPE html>
<html>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/all-pages.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:23:42 GMT -->
<head>
    <title>Profilliste | Kickstars</title>
     <?php include_once("connector.php"); 
        $sql_count_command = "SELECT count(id) FROM  `location`";
        $count_result = mysqli_query($link,$sql_count_command);
        $idcount = mysqli_fetch_row($count_result)[0];

    ?>
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
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsueOO45xoTZ68rJw4QaXkXFBRGEl6Z5U">
    </script>

    <script type="text/javascript">

    
    
    var map;

    


      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(45, 25.4),
          zoom: 1
        };

        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
     


      <?php 
      $content;
  $sql_command = "SELECT p.id,l.long,l.lat,p.vorname, p.nachname FROM  location l, profile p WHERE l.id=p.id and l.type='u' order by l.lat;";
  $result = mysqli_query($GLOBALS['link'], $sql_command);
	$i=0;
  // Results loop
  	$pre;
	$prelat;$prelng;
	$last = false;
	$numResults = mysqli_num_rows($result);
  while($last==true or($geo = mysqli_fetch_array($result)))
  {
  				echo '
		//'.$numResults.' = '.$counter.'
		';

	$counter;
	$counter = $counter +1;
	$i = $i +1;
     echo 'var marker'.$i.';';
     echo 'var infoWindowContent'.$i.';';
     echo 'var infowindow'.$i.';';
	
     $content = $pre;
	 if($last ==false){
    $content .= "<b><a href=\"profile.php?id=".$geo[0]."\">View Profile: ".$geo[3].' '.$geo[4]."</a></b><br>";
    $currentlat=$geo[2];
    $currentlng=$geo[1];
	}else{
		$currentlat=$prelat;
		$currentlng=$prelng;
	}
	$last=false;
    while($geo = mysqli_fetch_array($result)){
	++$counter;
	  				echo '
		//'.$numResults.' = '.$counter.'
		';
	
     if($currentlng==$geo[1] && $currentlat==$geo[2]){
	 
     $content .= "<b><a href=\"profile.php?id=".$geo[0]."\">View Profile: ".$geo[3].' '.$geo[4]."</a></b><br>";
     }else{ 
        $pre = '<b><a href="profile.php?id='.$geo[0].'">View Profile: '.$geo[3].' '.$geo[4].'</a></b><br>';
		$prelat = $geo[2];
		$prelng = $geo[1];
		if($counter == $numResults){
				echo '
		//last = true
		';
		$last = true;
		}
        break;}
  }


    echo 'infoWindowContent'.$i.' = \''.$content.'\';';

       echo 'infowindow'.$i.' = new google.maps.InfoWindow({
      content: infoWindowContent'.$i.'
        });';
    
  
    echo 'marker'.$i.'=new google.maps.Marker({
          position: new google.maps.LatLng('.$currentlat.', '.$currentlng.'),
          map: map
        });';

    echo '  google.maps.event.addListener(marker'.$i.', \'click\', function() {
            infowindow'.$i.'.open(map,marker'.$i.');

  });';

    
  }

?>  
      
      }


      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="wrap-top-menu">
            <div class="container_12 clearfix">
                <div class="grid_12">
                    <nav class="top-menu">
                        <ul id="main-menu" class="nav nav-horizontal clearfix">
                            <li class="active"><a href="index-2.html">Home</a></li>
                            <li class="sep"></li>
                            <li><a href="all-pages.html">All Pages</a></li>
                            <li class="sep"></li>
                            <li><a href="how-it-work.html">Help</a></li>
                            <li class="sep"></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <a id="btn-toogle-menu" class="btn-toogle-menu" href="#alternate-menu">
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                        </a>
                        <div id="right-menu">
                            <ul class="alternate-menu">
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="all-pages.html">About</a></li>
                                <li><a href="how-it-work.html">Help</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="top-message clearfix">
                        <i class="icon iFolder"></i>
                        <span class="txt-message">Nulla egestas nulla ac diam ultricies id viverra nisi adipiscing.</span>
                        <i class="icon iX"></i>
                        <div class="clear"></div>
                    </div>
                    <i id="sys_btn_toggle_search" class="icon iBtnRed make-right"></i>
                </div>
            </div>
        </div><!-- end: .wrap-top-menu -->
        <div class="container_12 clearfix">
            <div class="grid_12 header-content">
                <div id="sys_header_right" class="header-right">
                    <div class="account-panel">
                        <a href="#" class="btn btn-red sys_show_popup_login">Register</a>
                        <a href="#" class="btn btn-black sys_show_popup_login">Login</a>
                    </div>
                    <div class="form-search">
                        <form action="#">
                            <label for="sys_txt_keyword">
                                <input id="sys_txt_keyword" class="txt-keyword" type="text" placeholder="Search projects"/>
                            </label>
                            <button class="btn-search" type="reset"><i class="icon iMagnifier"></i></button>
                            <button class="btn-reset-keyword" type="reset"><i class="icon iXHover"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-left">
                    <h1 id="logo">
                        <a href="index-2.html"><img src="images/logo.png" alt="$SITE_NAME"/></a>
                    </h1>
                    <div class="main-nav clearfix">
                        <div class="nav-item">
                            <a href="#" class="nav-title">Discover</a>
                            <p class="rs nav-description">Great Projects</p>
                        </div>
                        <span class="sep"></span>
                        <div class="nav-item">
                            <a href="#" class="nav-title">Start</a>
                            <p class="rs nav-description">Your Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--end: #header -->

    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title">Profilliste</h2>
                <div class="box-single-content">
                    <div class="editor-content">
                        <ul style="list-style: decimal">
						
							<?php
	
							//DB
							 $link = mysqli_connect("localhost", "root", "!asdf#FDSA!", "crowd");
							 if($mysqli->connect_error)
							 {
							  echo ("Verbindungsfehler: ".mysqli_connect_error());
							  exit();
							 }	
							 if (!$link->set_charset("utf8")){
							 echo "fehler charset" . $link->error;
							 }

							 $sql = "SELECT  * FROM `profile` ";
							 $db_erg = mysqli_query( $link, $sql );
							 if ( ! $db_erg )
							 {
							  die('Ungültige Abfrage: ' . mysqli_error());
							 }
	
	
							    echo '<table border="1">';
								while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
								{
								  echo "<tr>";
								  echo "<td>";
								  echo '<a href="profile.php?id=' . $zeile['id']. '">';
							      echo $zeile['vorname']. "</a>";
								  echo "</td>";
								  echo "<td>";
								  echo '<a href="profile.php?id=' . $zeile['id']. '">';
							      echo $zeile['nachname'].  "</a>";
								  echo "</td>";
								  echo "<td>";
								  echo '<a href="profile.php?id=' . $zeile['id']. '">';
							      echo $zeile['email']. "</a>";
								  echo "</td>";
								  echo "</tr>";
								}
								echo "</table>";
							 mysqli_free_result( $db_erg );
							 ?>

						</ul>
                        <div id="map-canvas" style="height:450px"> 

                        </div>
                        <!-- AddThis Button BEGIN -->
                        <div class="social-sharing">
                            <div class="addthis_toolbox addthis_default_style">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                        </div><!-- AddThis Button END -->
                    </div>
                </div>
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Sections</h3>
                <p class="rs description pb20">Pellentesque laoreet sapien id lacus luctus non fringilla elit lobortis. Fusce augue diam, tempor posuere pharetra sed, feugiat non sapien.</p>
                <ul class="rs nav nav-category">
                    <li>
                        <a href="#">
                            About
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            How It Works
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Membership
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Success Stories
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Press
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Games
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Stats
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-gray">
                <h3 class="title-box">Text Widget</h3>
                <p class="rs description pb20">Nam sollicitudin malesuada dapibus. Suspendisse mollis pellentesque eros. Aenean congue tempor neque, vel malesuada augue auctor in. In aliquam faucibus interdum.</p>
                <a class="btn bigger fill-width btn-white" href="#">Large download button</a>
                <a class="btn bigger fill-width btn-blue" href="#">Large download button</a>

            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>

    <div class="additional-info-line">
        <div class="container_12">
            <div class="grid_9">
                <h2 class="rs title">Vestibulum tristique, purus eget euismod vulputate, nisl erat suscipit mi!</h2>
                <p class="rs description">Duis placerat malesuada sapien, eu consequat mauris vestibulum vitae. Aliquam fermentum lorem ut leo ultricies semper. In sed ligula massa, vitae elementum mauris.</p>
            </div>
            <div class="grid_3 ta-r">
                <a class="btn bigger btn-red" href="#">Learn more</a>
            </div>
            <div class="clear"></div>
        </div>
    </div><!--end: .additional-info-line -->
    <footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_3 about-us">
                <h3 class="rs title">About</h3>
                <p class="rs description">Donec rutrum elit ac arcu bibendum rhoncus in vitae turpis. Quisque fermentum gravida eros non faucibus. Curabitur fermentum, arcu sed cursus commodo.</p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:info@megadrupal.com">info@megadrupal.com</a></p>
                <p class="rs">+1 (555) 555 - 55 - 55</p>
            </div><!--end: .contact-info -->
            <div class="grid_3 recent-tweets">
                <h3 class="rs title">Recent Tweets</h3>
                <div class="lst-tweets" id="sys_lst_tweets">
                    <p class="rs ta-c fc-white">
                        loading Twitter <br />
                        <img src="images/ajax-loader.gif" alt="loading"/>
                    </p>
                </div>
            </div><!--end: .recent-tweets -->
            <div class="clear clear-2col"></div>
            <div class="grid_3 email-newsletter">
                <h3 class="rs title">Newsletter Signup</h3>
                <div class="inner">
                    <p class="rs description">Nam aliquet, velit quis consequat interdum, odio dolor elementum.</p>
                    <form action="#">
                        <div class="form form-email">
                            <label class="lbl" for="txt-email">
                                <input id="txt-email" type="text" class="txt fill-width" placeholder="Enter your e-mail address"/>
                            </label>
                            <button class="btn btn-green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!--end: .email-newsletter -->
            <div class="grid_3">
                <h3 class="rs title">Discover &amp; Create</h3>
                <div class="footer-menu">
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">What is Kickstars</a></li>
                        <li><a class="be-fc-orange" href="#">Start a project</a></li>
                        <li><a class="be-fc-orange" href="#">Project Guidlines</a></li>
                        <li><a class="be-fc-orange" href="#">Press</a></li>
                        <li><a class="be-fc-orange" href="#">Stats</a></li>
                    </ul>
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">Staff Picks</a></li>
                        <li><a class="be-fc-orange" href="#">Popular</a></li>
                        <li><a class="be-fc-orange" href="#">Recent</a></li>
                        <li><a class="be-fc-orange" href="#">Small Projects</a></li>
                        <li><a class="be-fc-orange" href="#">Most Funded</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="copyright">
            <div class="container_12">
                <div class="grid_12">
                    <a class="logo-footer" href="index-2.html"><img src="images/logo-2.png" alt="$SITE_NAME"/></a>
                    <p class="rs term-privacy">
                        <a class="fw-b be-fc-orange" href="single.html">Terms & Conditions</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="single.html">Privacy Policy</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="#">FAQ</a>
                    </p>
                    <p class="rs ta-c fc-gray-dark site-copyright">HTML by <a href="http://megadrupal.com/" title="Drupal Developers" target="_blank">MegaDrupal</a>. Designed by <a href="http://bestwebsoft.com/" title="Web development company" target="_blank">BestWebSoft</a>.</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </footer><!--end: #footer -->

</div>

<div class="popup-common" id="sys_popup_common">
    <div class="overlay-bl-bg"></div>
    <div class="container_12 pop-content">
        <div class="grid_12 wrap-btn-close ta-r">
            <i class="icon iBigX closePopup"></i>
        </div>
        <div class="grid_6 prefix_1">
            <div class="form login-form">
                <form action="#">
                    <h3 class="rs title-form">Register</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">New to Kickstars?</h4>
                        <p class="rs">A Kickstars account is required to continue.</p>
                        <div class="form-action">
                            <label for="txt_name">
                                <input id="txt_name" class="txt fill-width" type="text" placeholder="Enter full name"/>
                            </label>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="txt_email">
                                        <input id="txt_email" class="txt fill-width" type="email" placeholder="Enter your e-mail address"/>
                                    </label>
                                    <label for="txt_re_email">
                                        <input id="txt_re_email" class="txt fill-width" type="email" placeholder="Re-enter your e-mail adress"/>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="txt_password">
                                        <input id="txt_password" class="txt fill-width" type="password" placeholder="Enter password"/>
                                    </label>
                                    <label for="txt_re_password">
                                        <input id="txt_re_password" class="txt fill-width" type="password" placeholder="Re-enter password"/>
                                    </label>
                                </div>
                            </div>
                            <p class="rs pb10">By signing up, you agree to our <a href="#" class="fc-orange">terms of use</a> and <a href="#" class="fc-orange">privacy policy</a>.</p>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="submit">Register</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid_4">
            <div class="form login-form">
                <form action="#">
                    <h3 class="rs title-form">Login</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Already Have an Account?</h4>
                        <p class="rs">Please log in to continue.</p>
                        <div class="form-action">
                            <label for="txt_email_login">
                                <input id="txt_email_login" class="txt fill-width" type="email" placeholder="Enter your e-mail address"/>
                            </label>
                            <label for="txt_password_login">
                                <input id="txt_password_login" class="txt fill-width" type="password" placeholder="Enter password"/>
                            </label>

                            <label for="chk_remember" class="rs pb20 clearfix">
                                <input id="chk_remember" type="checkbox" class="chk-remember"/>
                                <span class="lbl-remember">Remember me</span>
                            </label>
                            <p class="rs ta-c pb10">
                                <button class="btn btn-red btn-submit" type="submit">Login</button>
                            </p>
                            <p class="rs ta-c">
                                <a href="#" class="fc-orange">I forgot my password</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20585382-5', 'megadrupal.com');
  ga('send', 'pageview');

</script>
</body>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/all-pages.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:23:49 GMT -->
</html>