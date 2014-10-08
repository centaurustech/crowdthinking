<!DOCTYPE html>
<html>
<!-- Mirrored from envato.megadrupal.com/html/kickstars/single.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:25 GMT -->
<head>
    <title>Alle Projekte | <?php echo "title";?></title>
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

</head>
<body>
<?php include_once "top_menue.php"; ?>
<!-- end: .wrap-top-menu -->
		<?php include_once "header.php"; ?>
       <!--end: #header -->
<?php include_once "connector.php"; ?>
<?php include_once "singleContent.php"; ?>
   
    <div class="layout-2cols">
        <div class="content grid_9">
            <div class="search-result-page">
			
                <div class="top-lbl-val">
                    <h3 class="common-title"><span class="fc-orange">Alle Projekte</span></h3>
                </div>
<?php
				$allProjectsQuerytext = 
				"SELECT projects.id as projectid,
				projects.projecttitle,
				projects.imagedata,
				projects.imagetype,
				projects.goalMoney,
				projects.goalWork,
				projects.duration,
				projects.city as projectCityId,
				projects.description,
				projects.excerpt,
				projects.author_id,
				projects.bankers_value,
				projects.pledged_value,
				projects.startdate,
				projects.enddate,
				projects.countUpdates,
				projects.countBackers,
				projects.category,
				profile.id as userid,
				profile.vorname as userfirstname,
				profile.nachname as userlastname,
				Cities.zipcode,
				Country.name as country,
				state.name as area,
				county.name as countyName,
				Cities.city as city 
				FROM projects, profile, Cities, Country, state, county
				WHERE projects.city = Cities.id 
				AND Cities.state_id = state.id
				AND Cities.county_id = county.id	
				AND Cities.country = Country.id
				GROUP BY projects.id ORDER BY enddate ASC; 
				";
				
				
								
				$allProjects_query = mysqli_query ($link, $allProjectsQuerytext);
				
				  // echo $allProjectsQuerytext;

				while ($zeile = mysqli_fetch_array( $allProjects_query, MYSQL_ASSOC))
				{
					echo "\n";
				
					$projectId 			= $zeile["projectid"];
					$title		 		= $zeile["projecttitle"];
					$goalMoney 			= $zeile["goalMoney"];
					$goalWork 			= $zeile["goalWork"];
					$duration 			= $zeile["duration"];
					$description 		= $zeile["description"];
					$shortDescription	= $zeile["excerpt"];
					$ammountWork		= $zeile["bankers_value"];
					$ammountMoney		= $zeile["pledged_value"];
					$startdate			= $zeile["startdate"];
					$enddate			= $zeile["enddate"];
					$countUpdates		= $zeile["countUpdates"];
					$countBackers		= $zeile["countBackers"];
					$category			= $zeile["category"];
					$userId				= $zeile["userid"];
					$userfirstname		= $zeile["userfirstname"];
					$userlastname		= $zeile["userlastname"];
					$zipcode			= $zeile["zipcode"];
					
					$projectCountry		= $zeile["country"];
					$projectArea		= $zeile["area"];
					$projectCountyName	= $zeile["countyName"];
					$projectCity		= $zeile["city"];
					
					$author = $userfirstname." ".$userlastname;
					$percent = number_format((($ammountMoney / $goalMoney) * 100 ), 0) ; 
					
					$today = new DateTime();
					$projectEnd = new DateTime($enddate);
					$interval = $projectEnd->diff($today);
					$daysTilEnd = $interval->format('%a');
					//$enddate-date();
					
					$imageQueryText = "select imagedata from projects where id = ".$projectId.";";
					$imageQuery = mysqli_query($link, $imageQueryText);
					$result = mysqli_fetch_array($imageQuery);
					$img_file = $result["imagedata"];
					
					// echo $title."<br>";

					echo '<div class="project-short larger">';
					echo '<div class="top-project-info">';
					echo '<div class="content-info-short clearfix">';
					echo '<a href="project.php?id='.$projectId.'" class="thumb-img">';
					echo '<img src="'.$img_file.'">';
					echo '</a>';
					echo '<div class="wrap-short-detail">';
					echo '<h3 class="rs acticle-title"><a class="be-fc-orange" href="project.php?id='.$projectId.'">'.$title.'</a></h3>';
					echo '<p class="rs tiny-desc">by <a href="profile.php?id='.$userId.'" class="fw-b fc-gray be-fc-orange">'.$author.'</a> in <span class="fw-b fc-gray">'.$projectCountry.', '.$projectArea.', '.$projectCountyName.', '.$projectCity.'</span></p>';
					echo '<p class="rs title-description">'.$shortDescription.'</p>';
					echo '</div>';
								// <p class="rs clearfix comment-view">
									// <a href="#" class="fc-gray be-fc-orange">75 comments</a>
									// <span class="sep">|</span>
									// <a href="#" class="fc-gray be-fc-orange">378 views</a>
								// </p>
					echo '</div>';
					echo '</div>';//end: .top-project-info
					echo '<div class="bottom-project-info clearfix">';
					echo '<div class="project-progress sys_circle_progress" data-percent="'.$percent.'">';
					echo '<div class="sys_holder_sector"></div>';
					echo '</div>';
					echo '<div class="group-fee clearfix">';
					echo '<div class="sep"></div>';
					echo '<div class="fee-item">';
					echo '<p class="rs lbl">Bereiterkl&auml;rte Helfer</p>';
					echo '<span class="val">'.$ammountWork.'</span>';
					echo '</div>';
					echo '<div class="sep"></div>';
					echo '<div class="fee-item">';
					echo '<p class="rs lbl">Bisher gesammelt</p>';
					echo '<span class="val">'.$ammountMoney.' &euro;</span>';
					echo '</div>';
					echo '<div class="sep"></div>';
					echo '<div class="fee-item">';
					echo '<p class="rs lbl">Verbleibende Tage</p>';
					echo '<span class="val">'.$daysTilEnd.'</span>';
					echo '</div>';
					echo '</div>';
					echo '<a class="btn btn-red btn-buck-project" href="#">Projekt unterst&uuml;tzen -> TODO !</a>';
					echo '<div class="clear"></div>';
					echo '</div>';
					echo '</div>';//end: project-short item 
				}
?>
                </div>
            </div><!--end: .search-result-page -->
        </div><!--end: .content -->
	<?php include_once ("footer.php");?>
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