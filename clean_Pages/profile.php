<!DOCTYPE html>
<html>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:22 GMT -->
<head>
    <title>Profile | <?php echo "page_title";?></title>
    <?php include_once "connector.php";
    $id  = htmlspecialchars($_GET['id']);
      $lat = htmlspecialchars($_GET['lat']);
      $lng = htmlspecialchars($_GET['lng']);

      $sql = "INSERT INTO `location`(`id`, `type`, `long`, `lat`) VALUES ($id,'u',$lng,$lat)";

      //$result = mysql_query($link, $query);
      $link->query($sql);

      ?>

    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1">
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
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/twitter.min.js"></script>
    <script type="text/javascript" src="js/pie.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsueOO45xoTZ68rJw4QaXkXFBRGEl6Z5U">
    </script>

    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>

    <script type="text/javascript">

    var marker;
    var map;
    var myLatlng;
    var getid = getUrlVars()["id"];

    function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
      });
      return vars;
    }

      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(45, 25.4),
          zoom: 1
        };

        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

        google.maps.event.addListener(map, 'idle', function(e) {
          placeGeoMarker();
        });
      
      }

    function placeGeoMarker(){
        get_location();
        placeMarker(myLatlng, map);
    }


    function placeMarker(location, map) {
        if ( marker ) {
          marker.setPosition(location);
        
        } else {
          marker = new google.maps.Marker({
            position: location,
            map: map
          });
        }
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
            case error.TIMEOUT:
              alert("timeout");
              break;
            case error.UNKNOWN_ERROR:
              alert("Unknown, please contact the developers");
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


    function saveData() {
      var latlng = marker.getPosition();

      var url = "profile.php?lat=" + latlng.lat() + "&lng=" + latlng.lng() + "&id=" + getid;
      downloadUrl(url, function(data, responseCode) {
        if (responseCode == 200 && data.length >= 1) {
          alert("Location added");
        }
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body>
<?php include_once "top_menue.php"; ?>
<!-- end: .wrap-top-menu -->
		<?php include_once "header.php"; ?>
       <!--end: #header -->


    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="project-detail">
                <div class="project-tab-detail tabbable accordion">
                    <ul class="nav nav-tabs clearfix">
                      <li class="active"><a href="#">Profile</a></li>
                      <li><a href="#" class="be-fc-orange">Account</a></li>
                      <li class="disable"><a href="#" class="be-fc-orange">Notifications</a></li>
                      <li><a href="#" class="be-fc-orange">Inbox</a></li>
                      <li><a href="#" class="be-fc-orange">Projects</a></li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Profile</h3>
                            <div class="tab-pane accordion-content active">
							<?php
							if (isset($_GET["id"])){
							$id = $_GET["id"];
							$link = mysqli_connect("localhost", "root", "!asdf#FDSA!", "crowd");
							$sql = "SELECT profile.id,profile.vorname,profile.nachname,profile.email,profile.ort,profile.bio,profile.fb,profile.youtube,profile.twitter,profile.googleplus,profile.bild, Categories.title as category FROM profile, Categories where profile.id=$id and Categories.id=profile.category";
							$db_erg = mysqli_query( $link, $sql );
							$zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC);
							
							
							mysqli_free_result( $db_erg );
							}
							else{
							$zeile['nachname']=
							$zeile['vorname'] =
							$zeile['email']=
							$zeile['ort']=
							$zeile['bio']=
							$zeile['fb']=
							$zeile['youtube']= 
							$zeile['twitter']= 
							$zeile['googleplus']=
							$zeile['bild']=
							$zeile['category']="";
							$id="0";
							}
							
							?>
							
							
                                <div class="form form-profile">
									<form action="profileInformationToDb.php" method="post" class="atcf-submit-campaign" enctype="multipart/form-data">
									<input type="hidden" name ="id" value="<?=$id?>">
                                        <div class="row-item clearfix">										
                                            <label class="lbl" for="txt_name1">Vorname:</label>
                                            <div class="val">
                                                <input class="txt" type="text" name="txt_vorname" value="<?=$zeile['vorname']?>">
                                                <p class="rs description-input">Your name is displayed on your profile.</p>
                                            </div>
                                        </div>
										<div class="row-item clearfix">
                                            <label class="lbl" for="txt_name2">Nachname:</label>
                                            <div class="val">
                                                <input class="txt" type="text" name="txt_nachname" value="<?=$zeile['nachname']?>">
                                            </div>
                                        </div>
										<div class="row-item clearfix">
                                            <label class="lbl" for="txt_email">e-Mail:</label>
                                            <div class="val">
                                                <input class="txt" type="text" name="txt_email" value="<?=$zeile['email']?>">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_location">Ort:</label>
                                            <div class="val">
                                                <input class="txt" type="text" name="txt_location" value="<?=$zeile['ort']?>">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_bio">Beschreibungstext:</label>
                                            <div class="val">
                                                <textarea class="txt fill-width" name="txt_bio" name="txt_bio" cols="30" rows="10"><?=$zeile['bio']?></textarea>
                                                <p class="rs description-input">We suggest a short bio. If it's 300 characters or less it'll look great on your profile.</p>
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name2">Facebook URL:</label>
                                            <div class="val">
                                                <input class="txt txt-website" type="text" name="fb_txt" value="<?=$zeile['fb']?>">
                                                <p class="rs description-input">Link zum Facebook Account (optional)</p>
                                            </div>
                                        </div>
										<div class="row-item clearfix">
                                            <label class="lbl" for="txt_name2">Twitter URL:</label>
                                            <div class="val">
                                                <input class="txt txt-website" type="text" name="twitter_txt" value="<?=$zeile['vorname']?>">
                                                <p class="rs description-input">Link zum Twitter Account (optional)</p>
                                            </div>
                                        </div>
										<div class="row-item clearfix">
                                            <label class="lbl" for="txt_name2">Youtube URL:</label>
                                            <div class="val">
                                                <input class="txt txt-website" type="text" name="yt_txt" value="<?=$zeile['youtube']?>">
                                                <p class="rs description-input">Link zum YouTube Account (optional)</p>
                                            </div>
                                        </div>
										
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_web">Google+ URL:</label>
                                            <div class="val">
                                                <input class="txt txt-website" type="text" name="gplus_txt" value="<?=$zeile['googleplus']?>">
												<p class="rs description-input">Link zum Google+ Account (optional)</p>
                                            </div>
                                        </div>
										<div class="row-item clearfix">
                                            <label class="lbl" for="txt_name2">Profilbild &auml;ndern :</label>
											
                                            <div class="val">
												<input type="file" name="image" id="image" />
												<p class="rs description-input">max. 4MB</p>
												
												<p>
												<?php echo '<img src="'.$zeile['bild'].'">';?>
												</p>
										
                                                <p class="rs description-input">Profilbild URL, z.B. Imgur oder Tinypic (optional)</p>
                                            </div>
											
                                        </div>
										<p>
										<label class="lbl" for="txt_web">Spezialisierung / Fachgebiet:&nbsp &nbsp &nbsp &nbsp</label>
										<?php
										$spez = array();
										$spez[0]="Nature";
										$spez[1]="Science";
										$spez[2]="Technology";
										$spez[3]="Organisation";
										?>
										<select name="spezialisierung" size="5">
										<?php
										for ( $i=0; $i<4; $i++){
										if ($spez[$i]==$zeile['category']) $selected="selected"; else $selected="";
										echo "<option " . $selected . ">" . $spez[$i] . "</option>";
										}
										?>
									    </select>
										</p>
                                        <div id="map-canvas" class="map-canvas" style="height:450px"></div>
                                        <div> <td><input type='button' value='Save Location' onclick='saveData()'/></td>
										</div>
                                        <p class="wrap-btn-submit rs ta-r">
                                            <button  type="submit" name="submit" value="submit"  class="btn btn-red btn-submit-all"> Save all settings</button>
                                        </p>
                                    </form>
                                </div>
                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Account</h3>
                            <div class="tab-pane accordion-content">
                                <div class="tab-pane-inside">
                                    <div class="project-author pb20">
                                        <div class="media">
                                            <a href="#" class="thumb-left">
                                                <img src="images/sample.jpg" alt="$USER_NAME">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b"><?php echo "name";?></a></h4>
                                                <p class="rs"><?php echo "city";?></p>
                                                <p class="rs fc-gray pb10"><?php echo "countProjects";?> projects</p>
                                                <p class="rs description"><?php echo "description";?></p>
                                            </div>
                                        </div>
                                    </div><!--end: .project-author -->
                                </div>
                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Notifications</h3>
                            <div class="tab-pane accordion-content">
                                <br /> Notifications<br /> <br /> <br /> <br /><br /><br />

                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Inbox</h3>
                            <div class="tab-pane accordion-content">
                                <div class="box-list-comment">
                                    <div class="media comment-item">
                                        <a href="#" class="thumb-left">
                                            <img src="images/sample.jpg" alt="$TITLE">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="rs comment-author">
                                                <a href="#" class="be-fc-orange fw-b"><?php echo "messager_name";?></a>
                                                <span class="fc-gray">say:</span>
                                            </h4>
                                            <p class="rs comment-content"><?php echo "sample_message";?></p>
                                            <p class="rs time-post"><?php echo "countDaysAgo";?> days ago</p>
                                        </div>
                                    </div><!--end: .comment-item -->
                                    <!-- TODO End Loop Inbox Items -->

                                </div>
                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Projects</h3>
                            <div class="tab-pane accordion-content">
                                <div class="box-marked-project project-short inside-tab">
                                    <div class="top-project-info">
                                        <div class="content-info-short clearfix">
                                            <a href="#" class="thumb-img">
                                                <img src="images/ex/th-292x204-1.jpg" alt="$TITLE">
                                            </a>
                                            <div class="wrap-short-detail">
                                                <h3 class="rs acticle-title"><a class="be-fc-orange" href="#"><?php echo "article_Title";?></a></h3>
                                                <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "poster";?></a> in <span class="fw-b fc-gray"><?php echo "city";?></span></p>
                                                <p class="rs title-description"><?php echo "description";?></p>
                                            </div>
                                            <p class="rs clearfix comment-view">
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countComments";?> comments</a>
                                                <span class="sep">|</span>
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countViews";?> views</a>
                                            </p>
                                        </div>
                                    </div><!--end: .top-project-info -->
                                    <div class="bottom-project-info clearfix">
                                        <div class="project-progress sys_circle_progress" data-percent="33">
                                            <div class="sys_holder_sector"></div>
                                        </div>
                                        <div class="group-fee clearfix">
                                            <div class="fee-item">
                                                <p class="rs lbl">Bankers</p>
                                                <span class="val"><?php echo "countBankers";?></span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Pledged</p>
                                                <span class="val"><?php echo "countPledged";?></span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Days Left</p>
                                                <span class="val"><?php echo "CountDays2go";?></span>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div><!--end: .box-marked-project -->
                                <div class="box-marked-project project-short inside-tab">
                                    <div class="top-project-info">
                                        <div class="content-info-short clearfix">
                                            <a href="#" class="thumb-img">
                                                <img src="images/sample.jpg" alt="$TITLE">
                                            </a>
                                            <div class="wrap-short-detail">
                                                <h3 class="rs acticle-title"><a class="be-fc-orange" href="#"><?php echo "top-project_title";?></a></h3>
                                                <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "psoter(sr)";?></a> in <span class="fw-b fc-gray"><?php echo "city";?></span></p>
                                                <p class="rs title-description"><?php echo "description";?></p>
                                            </div>
                                            <p class="rs clearfix comment-view">
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countComments";?> comments</a>
                                                <span class="sep">|</span>
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countViews";?> views</a>
                                            </p>
                                        </div>
                                    </div><!--end: .top-project-info -->
                                    <div class="bottom-project-info clearfix">
                                        <div class="project-progress sys_circle_progress" data-percent="65">
                                            <div class="sys_holder_sector"></div>
                                        </div>
                                        <div class="group-fee clearfix">
                                            <div class="fee-item">
                                                <p class="rs lbl">Bankers</p>
                                                <span class="val"><?php echo "countBankers";?></span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Pledged</p>
                                                <span class="val"><?php echo "countPledged";?></span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Days Left</p>
                                                <span class="val"><?php echo "countDaysAgo";?></span>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div><!--end: .box-marked-project -->
                                <div class="box-marked-project project-short inside-tab">
                                    <div class="top-project-info">
                                        <div class="content-info-short clearfix">
                                            <a href="#" class="thumb-img">
                                                <img src="images/sample.jpg" alt="$TITLE">
                                            </a>
                                            <div class="wrap-short-detail">
                                                <h3 class="rs acticle-title"><a class="be-fc-orange" href="#"><?php echo "sample_title";?></a></h3>
                                                <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "poster";?></a> in <span class="fw-b fc-gray"><?php echo "city";?></span></p>
                                                <p class="rs title-description"><?php echo "description";?></p>
                                            </div>
                                            <p class="rs clearfix comment-view">
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countComments";?> comments</a>
                                                <span class="sep">|</span>
                                                <a href="#" class="fc-gray be-fc-orange"><?php echo "countViews";?> views</a>
                                            </p>
                                        </div>
                                    </div><!--end: .top-project-info -->
                                    <div class="bottom-project-info clearfix">
                                        <div class="project-progress sys_circle_progress" data-percent="69">
                                            <div class="sys_holder_sector"></div>
                                        </div>
                                        <div class="group-fee clearfix">
                                            <div class="fee-item">
                                                <p class="rs lbl">Bankers</p>
                                                <span class="val"><?php echo "countBankers";?></span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Pledged</p>
                                                <span class="val">countPledged</span>
                                            </div>
                                            <div class="sep"></div>
                                            <div class="fee-item">
                                                <p class="rs lbl">Days Left</p>
                                                <span class="val"><?php echo "countDay";?></span>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div><!--end: .box-marked-project -->
                            </div><!--end: .tab-pane -->
                        </div>
                      </div>
                </div><!--end: .project-tab-detail -->
            </div>
        </div><!--end: .content -->
        
        <div class="clear"></div>
    </div>
    <?php include_once "footer.php";?>

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

<!-- Mirrored from envato.megadrupal.com/html/kickstars/profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:25 GMT -->
</html>