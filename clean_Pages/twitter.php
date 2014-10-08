<!DOCTYPE html>
<html style="height:100%">

<head>
    <title>Twitter-Feed</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/jquery.sidr.light.css"/>
    <link rel="stylesheet" href="css/style.css"/>
 
    <link rel="stylesheet" href="css/responsive.css"/>

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>



    

    

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
                    
                   <a class="twitter-timeline"  href="https://twitter.com/Crowd_thinking"  data-widget-id="481052597948657665">Tweets von @Crowd_thinking</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>




                        
                
            </div>
        </div><!--end: .content -->
        
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