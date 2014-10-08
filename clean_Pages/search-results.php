<!DOCTYPE html>
<html>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/search-results.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:26 GMT -->
<head>
    <title>Suche</title>
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

<?php include_once "connector.php"; ?>
<?php include_once "search-resultsContent.php"; ?>
    <div class="layout-2cols">
        <div class="content grid_9">
            <div class="search-result-page">
                <div class="top-lbl-val">
                    <h3 class="common-title"><span class="fc-orange">Suche</span></h3>
                    <div class="count-result">
                        <span class="fw-b fc-black"><?php echo $resultCount;?></span> Projekte gefunden f&uuml;r "<span class="fw-b fc-black"><?php echo $searchText;?></span>"
						
					</div>
                   <!-- <div class="confirm-search">Were you looking for projects in " class="fw-b be-fc-orange"><?php //echo $catName;?></a>?</div>-->
                </div>
				<!-- TODO Loop search Results-->
                <?php echo $finalString; ?>
                    <!-- End Loop Search Results--->
                </div>
                <p class="rs ta-c">
                   <?php echo $ShowMoreButton;?> 
                </p>
            </div><!--end: .search-result-page -->
        </div><!--end: .content -->
        <div class="sidebar grid_3">
		<div class ="left-list-category">
		<h4 class="rs title-nav"><a href="advancedSearch.php">Erweiterte Suche</a></h4>
		</div>
            <div class="left-list-category">
                <h4 class="rs title-nav">H&auml;ufig gesucht</h4>
                <ul class="rs nav nav-category">
                    <li>
                        <a href="search-results.php?mode=1">
                            Beliebt
                            <span class="count-val"></span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="search-results.php?mode=2">
                            Heute gestartet
                            <span class="count-val"></span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="search-results.php?mode=3">
                            Bald beendet
                            <span class="count-val"></span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div><!--end: .left-list-category -->
            <div class="left-list-category">
			<!-- Loop categories-->
                <h4 class="rs title-nav">Kategorien</h4>
                <ul class="rs nav nav-category">
                   <?php echo $categories; ?>
                </ul>
            </div><!--end: .left-list-category -->
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
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

<!-- Mirrored from envato.megadrupal.com/html/kickstars/search-results.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:41 GMT -->
</html>