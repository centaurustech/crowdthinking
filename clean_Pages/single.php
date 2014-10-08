<!DOCTYPE html>
<html>
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
</head>
<body>
<?php include_once "top_menue.php"; ?>
<!-- end: .wrap-top-menu -->
		<?php include_once "header.php"; ?>
       <!--end: #header -->
<?php include_once "connector.php"; ?>
<?php include_once "singleContent.php"; ?>
    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title">#<?php echo $articleID." ".$articleTitle; ?> </h2>
                <p class="rs post-by">by <a href="profile.php?uID=<?php echo $posterID; ?>"><?php echo $articlePoster;?></a></p>
                <div class="box-single-content">
                    <div class="editor-content">
                        <p>
                            <img class="img-desc" src="<?php echo "./".$articlePicture; ?>" alt="$DESCRIPTION">
                        </p>
                        <p><?php echo $articleContent;?></p>
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