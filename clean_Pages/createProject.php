<!DOCTYPE html>
<html>
<!-- Mirrored from envato.megadrupal.com/html/kickstars/single.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:25 GMT -->
<head>
    <title>Ein Projekt anlegen | <?php echo "title";?></title>
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
        <div class="content grid_12">
            <div class="single-page">
                <div class="wrapper-box box-post-comment">
                    
                    <h3 class="common-title"><span class="fc-orange">Ein Projekt anlegen</span></h3>
					
					
                    <div class="box-white">
                        
					<form action="insertNewProjectInformationToDb.php" method="post" class="atcf-submit-campaign" enctype="multipart/form-data">

				<h3 class="atcf-submit-section campaign_heading">Projekt Informationen</h3>
				<p>
				<label for="title">Projekttitel</label>
				<input type="text" name="title" id="title" value="" placeholder="">
				</p>
				<p>
				<label for="image">Projektbild (max 2048kB)</label>
				<input type="file" name="image" id="image" />
				</p>
				<p>
				<label for="goalMoney">Ziel (&euro;)</label>
				<input type="number" name="goalMoney" id="goalMoney" value="" placeholder="800.00">
				und / oder
				<label for="goalWork">Ziel (Helfer)</label>
				<input type="number" name="goalWork" id="goalWork" value="" placeholder="10">
				</p>
				<p>
				Projektstart <input type="text" id="start" name="start" onclick="abholenA();">
				<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
				<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
				<link rel="stylesheet" href="/resources/demos/style.css">
				<input type="hidden" id="projectstart" name="projectstart">
				<script>
					$(function() {
					$( "#start" ).datepicker();
					document.getElementById("projectstart").value = document.getElementById("start").value;
					});
					function abholenA() {
					$( "#start" ).datepicker();
					document.getElementById("projectstart").value = document.getElementById("start").value;
					};
				</script>

				Projektende <input type="text" id="end" name="end" onclick="abholenB();">
				<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
				<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
				<link rel="stylesheet" href="/resources/demos/style.css">
				<input type="hidden" id="projectend" name="projectend">
				<script>
					$(function() {
					$( "#end" ).datepicker();
					document.getElementById("projectend").value = document.getElementById("end").value;
					});
					function abholenB() {
					$( "#end" ).datepicker();
					document.getElementById("projectend").value = document.getElementById("end").value;
					};
				</script>
				</p>
				<p>
				<table>
				<tr>
				<td>
				<label for="typeOfExpertise">Art der Erfahrung</label>
				</td>
				<td>
				<input type="radio" name="typeOfExpertise" id="typeOfExpertise" value="1">Natur<br>
				<input type="radio" name="typeOfExpertise" id="typeOfExpertise" value="2">Wissenschaft<br>
				<input type="radio" name="typeOfExpertise" id="typeOfExpertise" value="3">Organisation<br>
				<input type="radio" name="typeOfExpertise" id="typeOfExpertise" value="4">Technologie
				</td>
				</tr>
				</table>
				</p>
				<p>
				<label for="country">Projektland</label>
				<input type="text" name="country" id="country" value="" placeholder="Deutschland">
				</p>
				<p>
				<label for="area">Projektbundesland/-bezirk</label>
				<input type="text" name="area" id="area" value="" placeholder="Baden-Wuerttemberg">
				</p>
				<p>
				<label for="zipcode">Projektpostleitzahl</label>
				<input type="text" name="zipcode" id="zipcode" value="" placeholder="79098">
				</p>
				<p>
				<label for="city">Projektort</label>
				<input type="text" name="city" id="city" value="" placeholder="Freiburg i.B.">
				</p>
				<input type="hidden" name="type" value="donation" />	
				<div class="atcf-submit-campaign-description">
				<label for="description">Projektbeschreibung</label>
				<textarea class="wp-editor-area" rows="20" autocomplete="off" cols="40" name="description" id="description"></textarea>
				</div>
				<p>
				<label for="excerpt">Kurzzusammenfassung</label>
				<textarea name="excerpt" id="excerpt"></textarea>
				</p>
				<p>
				<label for="Cleverle">Zugeh&ouml;riger Cleverle-Navi Link</label>
				<input type="text" name="Cleverle" id="Cleverle" value="" placeholder="">
				</p>
				<p>
				<label for="Storify">Zugeh&ouml;riger Storify Link</label>
				<input type="text" name="Storify" id="Storify" value="" placeholder="">
				</p>
				<p>
				<label for="Kickstarter">Zugeh&ouml;riger Kickstarter Link</label>
				<input type="text" name="Kickstarter" id="Kickstarter" value="" placeholder="">
				</p>
				<p>
				<label for="Facebook">Zugeh&ouml;riger Facebook Link</label>
				<input type="text" name="Facebook" id="Facebook" value="" placeholder="">
				</p>
				<p>
				<label for="Googleplus">Zugeh&ouml;riger Google+ Link</label>
				<input type="text" name="Googleplus" id="Googleplus" value="" placeholder="">
				</p>
				<p>
				<label for="Twitter">Zugeh&ouml;riger Twitter Link</label>
				<input type="text" name="Twitter" id="Twitter" value="" placeholder="">
				</p>
				<p>
				<label for="Youtube">Zugeh&ouml;riger Youtube Link</label>
				<input type="text" name="Youtube" id="Youtube" value="" placeholder="">
				</p>
				<h3 class="atcf-submit-section info_heading">Pers&ouml;nliche Informationen</h3>
				<p>
				<label for="prename">Vorname</label>
				<input type="text" name="prename" id="prename" value="" placeholder="">
				</p>
				<p>
				<label for="lastname">Nachname</label>
				<input type="text" name="lastname" id="lastname" value="" placeholder="">
				</p>
				<p class="atcf-submit-campaign-submit">
				<button type="submit" name="submit" value="submit" class="button">
				Projekt ver&ouml;ffentlichen</button>


				<input type="hidden" name="action" value="atcf-campaign-submit" />
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="3cab74b769" /><input type="hidden" name="_wp_http_referer" value="/neu_test/wordpress/?page_id=67" />
				</p>
				</form>	
						
						
                    </div>
                </div><!--end: .box-list-comment -->
            </div>
        </div><!--end: .content -->
        <div class="clear"></div>
    </div>
<?php include_once "footer.php";?>
<!--end: #footer -->

<?php include_once "loginRegister.php";?>
</body>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/single.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:26 GMT -->
</html>