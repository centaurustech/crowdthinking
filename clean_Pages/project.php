<!DOCTYPE html>
<html>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/project.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:23:52 GMT -->
<head>
    <title>Project | <?php echo "title" ?></title>
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/jquery.sidr.light.css"/>
    <link rel="stylesheet" href="css/responsiveslides.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <!--[if lte IE 7]>
	<link rel="stylesheet" href="css/ie7.css"/> <![endif]-->	
    <!--[if lte IE 8]>
	<link rel="stylesheet" href="css/ie8.css"/> <![endif]-->	
    <link rel="stylesheet" href="css/responsive.css"/>
    <!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script><![endif]-->

    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/twitter.min.js"></script>
    <script type="text/javascript" src="js/pie.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
<?php
	include_once "connector.php";

	$projectid = $_GET["id"];
	if(!is_numeric($projectid))
	{
		$projectid = 1;
	}
	
	$countQueryText = "SELECT count(id) as count FROM projects WHERE id=".$projectid.";";
	
	// echo "##".$projectid."##";
	
	// echo $countQueryText."##";
	
	$count_query = mysqli_query ($link, $countQueryText);
	$countResult = mysqli_fetch_row($count_query);
	
	$count = $countResult[0];
	//echo "#".$count."#".$countResult[0];
	
	if($countResult[0]==0)
	{
		$projectid = 1;
	}
	
	//PROJECT INFO
			$projectContentQuerytext = "SELECT projects.projecttitle as projecttitle,
										projects.imagedata as imagedata,
										projects.imagetype as imagetype,
										projects.goalMoney as goalMoney,
										projects.goalWork as goalWork,
										projects.duration as duration,
										projects.city as projectCityId,
										projects.description as description,
										projects.excerpt as excerpt,
										projects.author_id,
										projects.bankers_value as bankers_value,
										projects.pledged_value as pledged_value,
										projects.startdate as startdate,
										projects.enddate as enddate,
										projects.countUpdates as countUpdates,
										projects.countBackers as countBackers,
										projects.category as category,
										Cities.zipcode as zipcode,
										Country.name as country,
										county.name as countyName,
										state.name as area,
										Cities.city as city,
										Cleverle.link as cleverlelink,
										Facebook.link as facebooklink,
										Googleplus.link as googlepluslink,
										Kickstarter.link as kickstarterlink,
										Twitter.link as twitterlink,
										Youtube.link as youtubelink,
										Storify.link as storifylink 
										FROM projects, Cities, Country, state, county, Cleverle, Facebook, Googleplus, Kickstarter, Twitter, Youtube, Storify 
										WHERE projects.city = Cities.id 
										AND Cities.state_id = state.id
										AND Cities.county_id = county.id	
										AND Cities.country = Country.id
										AND projects.id = ".$projectid." GROUP BY projects.id ;
										";
				
				 // echo $projectContentQuerytext."###";
								
				$projectContent_query = mysqli_query ($link, $projectContentQuerytext);
				$queryResult = mysqli_fetch_array( $projectContent_query, MYSQLI_ASSOC);
				
				$title		 		= $queryResult["projecttitle"];
				$imagedata			= $queryResult["imagedata"];
				$imagetype			= $queryResult["imagetype"];
				$goalMoney 			= $queryResult["goalMoney"];
				$goalWork 			= $queryResult["goalWork"];
				$duration 			= $queryResult["duration"];
				$description 		= $queryResult["description"];
				$excerpt			= $queryResult["excerpt"];
				$bankers_value		= $queryResult["bankers_value"];
				$pledged_value		= $queryResult["pledged_value"];
				$startdate			= $queryResult["startdate"];
				$enddate			= $queryResult["enddate"];
				$countUpdates		= $queryResult["countUpdates"];
				$countBackers		= $queryResult["countBackers"];
				$category			= $queryResult["category"];
				$authorId			= $queryResult["author_id"];
				$zipcode			= $queryResult["zipcode"];
				$country			= $queryResult["country"];
				$county				= $queryResult["countyName"];
				$area				= $queryResult["area"];
				$city				= $queryResult["city"];
				
				$countCommentsText = "SELECT count(*) as countComments
										FROM Comments
										WHERE projectid = ".$projectid;
							
				$countComments_query = mysqli_query ($link, $countCommentsText);
				$countCommentsResult = mysqli_fetch_array( $countComments_query, MYSQLI_ASSOC);
				
				$countComments		= $countCommentsResult["countComments"];
				
				$cleverlelink 		= mysqli_fetch_array(mysqli_query ($link, "select link from Cleverle where projectid =".$projectid.";"))["link"];
				if(strpos($cleverlelink, "http://") == false)
				{
					$cleverlelink = "http://".$cleverlelink;
				}

				$facebooklink 		= mysqli_fetch_array(mysqli_query ($link, "select link from Facebook where projectid =".$projectid.";"))["link"];
				if(strpos($facebooklink, "http://") == false)
				{
					$facebooklink = "http://".$facebooklink;
				}
				
				$googlepluslink 	= mysqli_fetch_array(mysqli_query ($link, "select link from Googleplus where projectid =".$projectid.";"))["link"];
				if(strpos($googlepluslink, "http://") == false)
				{
					$googlepluslink = "http://".$googlepluslink;
				}
				
				$kickstarterlink 	= mysqli_fetch_array(mysqli_query ($link, "select link from Kickstarter where projectid =".$projectid.";"))["link"];
				if(strpos($kickstarterlink, "http://") == false)
				{
					$kickstarterlink = "http://".$kickstarterlink;
				}
				
				$twitterlink 		= mysqli_fetch_array(mysqli_query ($link, "select link from Twitter where projectid =".$projectid.";"))["link"];
				if(strpos($twitterlink, "http://") == false)
				{
					$twitterlink = "http://".$twitterlink;
				}
				
				$youtubelink 		= mysqli_fetch_array(mysqli_query ($link, "select link from Youtube where projectid =".$projectid.";"))["link"];
				if(strpos($youtubelink, "http://") == false)
				{
					$youtubelink = "http://".$youtubelink;
				}
				
				$storifylink 		= mysqli_fetch_array(mysqli_query ($link, "select link from Storify where projectid =".$projectid.";"))["link"];
				if(strpos($storifylink, "http://") == false)
				{
					$storifylink = "http://".$storifylink;
				}
				
				$percentage =  number_format( ($pledged_value / ($goalMoney / 100) ), 0) ; 
				
				$today = new DateTime();
				$projectEnd = new DateTime($enddate);
				$interval = $projectEnd->diff($today);
				$daysLeft = $interval->format('%a');
				
	//USER INFO
	$userContentQuerytext = "select 
							vorname as userfirstname,
							nachname as userlastname,
							bild as userPicture,
							ort as userCity
							from profile
							WHERE id = ".$authorId;
							
				$userContent_query = mysqli_query ($link, $userContentQuerytext);
				$userResult = mysqli_fetch_array( $userContent_query, MYSQLI_ASSOC);
				
				$userfirstname		= $userResult["userfirstname"];
				$userlastname		= $userResult["userlastname"];
				$author 			= $userfirstname." ".$userlastname;
				$userPicture		= $userResult["userPicture"];
				$userCity			= $userResult["userCity"];
				
				 // echo $userContentQuerytext."###".$userfirstname."#".$userlastname."#"."#"."#";
				
	//USER INFO
	$userProjectQuerytext = "select count(*) as ownedProjects
							from projects
							WHERE author_id = ".$authorId;
							
				$userProject_query = mysqli_query ($link, $userProjectQuerytext);
				$userProjectResult = mysqli_fetch_array( $userProject_query, MYSQLI_ASSOC);
				
				$ownedProjects		= $userProjectResult["ownedProjects"];
?>
</head>
<body>

<div id="wrapper">
<?php
	$sitename = "Projektansicht";
	include_once "top_menue.php"; 
	include_once "header.php"; 
?>

    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="project-detail">
                <h2 class="rs project-title"><?php echo $title; ?></h2>
                <p class="rs post-by">by <a href="<?php echo "profile.php?id=".$authorId; ?>"><?php echo $author; ?></a></p>
                <div class="project-short big-thumb">
                    <div class="top-project-info">
                        <?php include_once "timelineView.php"; ?>
                    </div><!--end: .top-project-info -->
                    <div class="bottom-project-info clearfix">
                        <div class="project-progress sys_circle_progress" data-percent="<?php echo $percentage;?>">
                            <div class="sys_holder_sector"></div>
                        </div>
                        <div class="group-fee clearfix">
                            <div class="fee-item">
                                <p class="rs lbl">Unterst&uuml;tzer</p>
                                <span class="val"><?php echo $bankers_value; ?></span>
                            </div>
                            <div class="sep"></div>
                            <div class="fee-item">
                                <p class="rs lbl">Gespendet</p>
                                <span class="val"><?php echo $pledged_value; ?></span>
                            </div>
                            <div class="sep"></div>
                            <div class="fee-item">
                                <p class="rs lbl">Verbleibende Tage</p>
                                <span class="val"><?php echo $daysLeft; ?></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="project-tab-detail tabbable accordion">
                    <ul class="nav nav-tabs clearfix">
                      <li class="active"><a href="#">&Uuml;ber das Projekt</a></li>
                      <li><a href="#" class="be-fc-orange">Updates (<?php echo $countUpdates ?>)</a></li>
                      <li><a href="#" class="be-fc-orange">Unterstützer (<?php echo $countBackers ?>)</a></li>
                      <li><a href="#" class="be-fc-orange">Kommentare (<?php echo $countComments; ?>)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <h3 class="rs alternate-tab accordion-label">&Uuml;ber das Projekt</h3>
                            <div class="tab-pane active accordion-content">
                                <div class="editor-content">
                                    <h3 class="rs title-inside"><?php echo $title; ?></h3>
                                    <p class="rs post-by">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo $author; ?></a> in <span class="fw-b fc-gray"><?php echo $city.", ".$area.", ".$county.", ".$country; ?></span></p>
                                    <p>
										<?php echo $excerpt; ?>
									</p>
                                    <p>
<?php

										$imageQueryText = "select imagedata from projects where id = ".$projectid.";";
										$imageQuery = mysqli_query($link, $imageQueryText);
										$result = mysqli_fetch_array($imageQuery);
										$img_file = $result["imagedata"];
										
										echo '<img src="'.$img_file.'">';
?>
                                    </p>
									<p>
										<?php echo $description; ?>
									</p>
									<p>
										<h3> Diesem Projekt folgen: </h3>
										<table border="0">
											<tr>
												<td>Cleverle-Navi:</td><td><a href="<?php echo $cleverlelink ;?>"><?php echo $cleverlelink ;?></a></td>
											</tr>
											<tr>
												<td>Kickstarter :</td><td><a href="<?php echo $kickstarterlink ;?>"><?php echo $kickstarterlink ;?></a></a></td>
											</tr>
											<tr>
												<td>Storify :</td><td><a href="<?php echo $storifylink ;?>"><?php echo $storifylink ;?></a></td>
											</tr>
											<tr>
												<td>Facebook :</td><td><a href="<?php echo $facebooklink ;?>"><?php echo $facebooklink ;?></a></td>
											</tr>
											<tr>
												<td>Google+ :</td><td><a href="<?php echo $googlepluslink ;?>"><?php echo $googlepluslink ;?></a></td>
											</tr>
											<tr>
												<td>Twitter :</td><td><a href="<?php echo $twitterlink ;?>"><?php echo $twitterlink ;?></a></td>
											</tr>
											<tr>
												<td>Youtube :</td><td><a href="<?php echo $youtubelink ;?>"><?php echo $youtubelink ;?></a></td>
											</tr>
										</table>
									</p>
                                    <div class="social-sharing">
                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                        </div>
                                        <script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                                        <!-- AddThis Button END -->
                                    </div>
                                </div>
                                <div class="project-btn-action">
                                    <a class="btn big btn-red" href="#">Author kontaktieren</a>
                                    <a class="btn big btn-black" href="#">Dieses Projekt melden</a>
                                </div>
                            </div><!--end: .tab-pane(About) -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Updates (<?php echo $countUpdates; ?>)</h3>
                            <div class="tab-pane accordion-content">
                                <div class="tab-pane-inside">
                                    <div class="list-last-post">
									<!--TODO Loop to load updates-->
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/sample.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b"><?php echo "titleUpdate" ?></a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">posted <?php echo "daysAgoValue" ?> days ago</p>
                                                <p class="rs description"> <?php echo "description" ?></p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                        <div class="media other-post-item">
                                            <a href="#" class="thumb-left">
                                                <img src="images/sample.jpg" alt="$TITLE">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs title-other-post">
                                                    <a href="#" class="be-fc-orange fw-b"><?php echo "titleUpdate" ?></a>
                                                </h4>
                                                <p class="rs fc-gray time-post pb10">posted <?php echo "xDaysAgo" ?> days ago</p>
                                                <p class="rs description"><?php echo "description" ?></p>
                                            </div>
                                        </div><!--end: .other-post-item -->
                                     <!--Updates loop finish -->
                                    </div>
                                </div>
                            </div><!--end: .tab-pane(Updates) -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Unterstützer (<?php echo $countBackers; ?>)</h3>
                            <div class="tab-pane accordion-content">
                                <div class="tab-pane-inside">
                                    <div class="project-author pb20">
                                        <div class="media">
                                            <a href="#" class="thumb-left">
                                                <img src="images/sample.jpg" alt="$USER_NAME"/>
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b"><?php echo $author; ?></a></h4>
                                                <p class="rs">location</p>
                                                <p class="rs fc-gray">Bisher <?php echo $ownedProjects; ?> Projekte</p>
                                            </div>
                                        </div>
                                    </div><!--end: .project-author -->
                                    <div class="project-author pb20">
                                        <div class="media">
                                            <a href="#" class="thumb-left">
                                                <img src="images/sample.jpg" alt="$USER_NAME"/>
                                            </a>
                                            <div class="media-body">
                                                <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b"><?php echo "author" ?></a></h4>
                                                <p class="rs"><?php echo "location" ?></p>
                                                <p class="rs fc-gray"><?php echo "countProjects" ?> projects</p>
                                            </div>
                                        </div>
                                    </div><!--end: .project-author -->
                                </div>
                                <div class="project-btn-action">
                                    <a class="btn btn-red" href="#">Ask a question(sr)</a>
                                    <a class="btn btn-black" href="#">Report this project(sr)</a>
                                </div>
                            </div><!--end: .tab-pane(Unterstützer) -->
                        </div>
                        <div>
                            <h3 class="rs active alternate-tab accordion-label">Kommentare (<?php echo $countComments; ?>)</h3>
							
							
                            <div class="tab-pane accordion-content">
                                <div class="box-list-comment">
									
<?php									
									
										$commentQueryText = "SELECT postDate,
										content,
										vorname,
										nachname,
										commentatorid,
										bild as profilePic FROM Comments,
										profile WHERE profile.id = Comments.commentatorid AND Comments.projectid = ".$projectid.";";
										
										// echo "########".$commentQueryText;
										$commentQuery_query = mysqli_query ($link, $commentQueryText);
										
									
										while($queryResult = mysqli_fetch_array( $commentQuery_query, MYSQLI_ASSOC))
										{
											$postDate = $queryResult["postDate"];
											$comment = $queryResult["content"];
											$commentAuthor = $queryResult["firstName"]." ".$queryResult["name"];
											$commentAuthorId = $queryResult["commentatorid"];
											$commentAuthorPicture = $queryResult["profilePic"];
											
											$today = new DateTime();
											$commentDate = new DateTime($postDate);
											$interval = $commentDate->diff($today);
											$timeDifference = $interval->format('%a');
										
											echo '<div class="media comment-item">';
												echo '<a href="profile.php?id='.$authorId.'" class="thumb-left">';
													echo '<img src="'.$commentAuthorPicture.'">';
												echo '</a>'; 
												echo '<div class="media-body">';
													echo '<h4 class="rs comment-author">';
														echo '<a href="profile.php?id='.$authorId.'" class="be-fc-orange fw-b">'.$author.'</a>';
														echo '<span class="fc-gray"> sagt :</span>';
													echo '</h4>';
													echo '<p class="rs comment-content">'.$comment.'</p>';
													echo '<p class="rs time-post">vor '.$timeDifference.' Tagen</p>';
												echo '</div>';
											echo '</div><!--end: .comment-item -->';
										}
									
?>									
                                </div>
                            </div><!--end: .tab-pane(Kommentare) -->
                        </div>
                      </div>
                </div><!--end: .project-tab-detail -->
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="project-runtime">
                <div class="box-gray">
                    <div class="project-date clearfix">
                        <i class="icon iCalendar"></i>
                        <span class="val"><span class="fw-b">Startdatum: </span><?php echo $startdate; ?></span>
                    </div>
                    <div class="project-date clearfix">
                        <i class="icon iClock"></i>
                        <span class="val"><span class="fw-b">Enddatum: </span><?php echo $enddate; ?></span>
                    </div>
                    <a class="btn btn-green btn-buck-project" href="#">
                        <span class="lbl">Dieses Projekt unterst&uuml;tzen<br>(finanziell) - TODO</span>
                        <span class="desc">1 &euro; Minimum</span>
                    </a>
                    <a class="btn btn-green btn-buck-project" href="#">
                        <span class="lbl">Dieses Projekt unterst&uuml;tzen<br>(Arbeitskraft) - TODO</span>
                        <span class="desc">1 &euro; Minimum</span>
                    </a>
                    <p class="rs description">Dieses Projekt wird nur starten, wenn <?php echo $goalMoney ?> Spenden-Euro und mindestens <?php echo $goalWork ?> Helfer bis zum <?php echo $enddate; ?> erreicht sind.</p>
                </div>
            </div><!--end: .project-runtime -->
            <div class="project-author">
                <div class="box-gray">
                    <h3 class="title-box">Projekt erstellt durch</h3>
                    <div class="media">
                        <a href="<?php echo "profile.php?id=".$authorId; ?>" class="thumb-left">
                            <img src="<?php echo $userPicture; ?>"/>
                        </a>
                        <div class="media-body">
                            <h4 class="rs pb10"><a href="<?php echo "profile.php?id=".$authorId; ?>" class="be-fc-orange fw-b"><?php echo $author ?></a></h4>
                            <p class="rs"><?php echo $userCity;  ?></p>
                            <p class="rs fc-gray">Bisher <?php echo $ownedProjects; ?> Projekte</p>
                        </div>
                    </div>
                    <div class="author-action">
                        <a class="btn btn-red" href="<?php echo "profile.php?id=".$authorId; ?>">Schreib' mir</a>
                        <a class="btn btn-white" href="<?php echo "profile.php?id=".$authorId; ?>">Vollst&auml;ndiges Profil</a>
                    </div>
                </div>
            </div><!--end: .project-author -->
            <div class="clear clear-2col"></div>
            <div class="wrap-nav-pledge">
                <ul class="rs nav nav-pledge accordion">
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 10 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 20 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                    <li>
                        <div class="active pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 50 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class="active pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 75 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 100 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                    <li>
                        <div class=" pledge-label accordion-label clearfix">
                            <i class="icon iPlugGray"></i>
                            <span class="pledge-amount">Spende 200 € - TODO</span>
                            <span class="count-val">(2 von 10)</span>
                        </div>
                        <div class=" pledge-content accordion-content">
                            <div class="pledge-detail">
                                <p class="rs pledge-description">Auch mit einer kleinen Spende können Sie bereits helfen</p>
                                <p class="rs fw-b pb20">Übernommene Spenden (2 von 10)</p>
                                <p class="rs"><span class="fw-b">Geldeingang voraussichtl.:</span> Aug 2013</p>
                                <p class="rs ta-c"><a class="btn big btn-red" href="#">An das Projekt spenden</a></p>
                            </div>
                        </div>
                    </li><!--end: pledge-item -->
                </ul>
            </div><!--end: .wrap-nav-pledge -->
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
<?php
	include_once("footer.php");
?>

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

<!-- Mirrored from envato.megadrupal.com/html/kickstars/project.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:22 GMT -->
</html>