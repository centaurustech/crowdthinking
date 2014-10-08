<!DOCTYPE html>
<html>

<!-- Mirrored from envato.megadrupal.com/html/kickstars/single-search-dropdown.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:41 GMT -->
<head>
    <title>Single dropdown search | <?php echo "title";?></title>
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
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="js/twitter.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

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
                                <li><a href="all-pages.html">All Pages</a></li>
                                <li><a href="how-it-work.html">Help</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="top-message clearfix">
                        <i class="icon iFolder"></i>
                        <span class="txt-message"><?php echo "clearfix";?></span>
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
                            <a href="#" class="nav-title">Discover(sr)</a>
                            <p class="rs nav-description">Great Projects</p>
                        </div>
                        <span class="sep"></span>
                        <div class="nav-item">
                            <a href="#" class="nav-title">Start(sr)</a>
                            <p class="rs nav-description">Your Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown-search-result">
            <div class="container_12">
                <div class="grid_12 wrap-title-result">
                    <div class="title-result">Projects in <a href="#" class="fc-white"><?php echo "city";?></a></div>
                    <i class="icon iBigX"></i>
                    <i class="iPickUp"></i>
                </div>
                <div class="clear"></div>
                <div class="list-project-result">
                    <div class="grid_3">
                        <div class="project-short sml-thumb">
                            <div class="top-project-info">
                                <div class="content-info-short clearfix">
                                    <a href="#" class="thumb-img">
                                        <img src="images/ex/th-292x204-1.jpg" alt="$TITLE">
                                    </a>
                                    <div class="wrap-short-detail">
                                        <h3 class="rs acticle-title"><a class="be-fc-orange" href="#">Project title</a></h3>
                                        <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "author";?></a></p>
                                        <p class="rs title-description"><?php echo "desc";?></p>
                                        <p class="rs project-location">
                                            <i class="icon iLocation"></i>
                                            <?php echo "city";?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-project-info clearfix">
                                <div class="line-progress">
                                    <div class="bg-progress">
                                        <span  style="width: 50%"></span>
                                    </div>
                                </div>
                                <div class="group-fee clearfix">
                                    <div class="fee-item">
                                        <p class="rs lbl">Funded</p>
                                        <span class="val"><?php echo "%funded";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Pledged</p>
                                        <span class="val"><?php echo "amountPledged";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Days Left</p>
                                        <span class="val"><?php echo "daysLeft";?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end: .grid_3 > .project-short-->
                    <div class="grid_3">
                        <div class="project-short sml-thumb">
                            <div class="top-project-info">
                                <div class="content-info-short clearfix">
                                    <a href="#" class="thumb-img">
                                        <img src="images/sample.jpg" alt="$TITLE">
                                    </a>
                                    <div class="wrap-short-detail">
                                        <h3 class="rs acticle-title"><a class="be-fc-orange" href="#"><?php echo "title";?></a></h3>
                                        <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "author";?></a></p>
                                        <p class="rs title-description"><?php echo "desc";?></p>
                                        <p class="rs project-location">
                                            <i class="icon iLocation"></i>
                                            <?php echo "city";?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-project-info clearfix">
                                <div class="line-progress">
                                    <div class="bg-progress">
                                        <span class="success" style="width: 123%"></span>
                                    </div>
                                </div>
                                <div class="group-fee clearfix">
                                    <div class="fee-item">
                                        <p class="rs lbl">Funded</p>
                                        <span class="val"><?php echo "%funded";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Pledged</p>
                                        <span class="val"><?php echo "amountPledged";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Days Left</p>
                                        <span class="val"><?php echo "daysLeft";?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end: .grid_3 > .project-short-->
                    <div class="grid_3">
                        <div class="project-short sml-thumb">
                            <div class="top-project-info">
                                <div class="content-info-short clearfix">
                                    <a href="#" class="thumb-img">
                                        <img src="images/ex/th-192x135-2.jpg" alt="$TITLE">
                                    </a>
                                    <div class="wrap-short-detail">
                                        <h3 class="rs acticle-title"><a class="be-fc-orange" href="#">Project title</a></h3>
                                        <p class="rs tiny-desc">by <a href="#" class="fw-b fc-gray be-fc-orange"><?php echo "author";?></a></p>
                                        <p class="rs title-description"><?php echo "desc";?></p>
                                        <p class="rs project-location">
                                            <i class="icon iLocation"></i>
                                            <?php echo "i";?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-project-info clearfix">
                                <div class="line-progress">
                                    <div class="bg-progress">
                                        <span  style="width: 21%"></span>
                                    </div>
                                </div>
                                <div class="group-fee clearfix">
                                    <div class="fee-item">
                                        <p class="rs lbl">Funded</p>
                                        <span class="val"><?php echo "%funded";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Pledged</p>
                                        <span class="val"><?php echo "amountPledged";?></span>
                                    </div>
                                    <div class="sep"></div>
                                    <div class="fee-item">
                                        <p class="rs lbl">Days Left</p>
                                        <span class="val"><?php echo "daysLeft";?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end: .grid_3 > .project-short-->
                    
                </div>
                <div class="grid_12">
                    <div class="confirm-result">
                        Were you looking for projects in <a href="#" class="fc-white"><?php echo "city(sr)";?></a>, in <a href="#" class="fc-white"><?php echo "city(sr)";?></a>, or matching the word "<a href="#" class="fc-white"><?php echo "sampleText(sr)";?></a>"?
                        <a href="#" class="view-all">View all(sr)</a>
                        <span class="clear"></span>
                    </div>
                </div>
            </div>
        </div>
    </header><!--end: #header -->

    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title"><?php echo "article Title";?></h2>
                <p class="rs post-by">by <a href="#"><?php echo "author";?></a></p>
                <div class="box-single-content">
                    <div class="editor-content">
                        <p>
                            <img class="img-desc" src="images/sample.jpg" alt="$DESCRIPTION">
                        </p>
                        <p><?php echo "sample";?> <span class="fc-orange"><?php echo "sample";?></span><?php echo "sample";?></p>
                        <p><?php echo "sample";?> <span class="fw-b fc-black"><?php echo "sample";?></span> <?php echo "sample";?></p>
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
                <p class="rs description pb20"><?php echo "section_description";?></p>
                <ul class="rs nav nav-category">
                    <li>
                        <a href="#">
                            About(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            How It Works(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Membership(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Success Stories(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Press(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Games(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Stats(sr)
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-gray">
                <h3 class="title-box">Text Widget</h3>
                <p class="rs description pb20"><?php echo "textWidget";?></p>
                <a class="btn bigger fill-width btn-white" href="#">Large download button(sr)</a>
                <a class="btn bigger fill-width btn-blue" href="#">Large download button(sr)</a>

            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>

    <div class="additional-info-line">
        <div class="container_12">
            <div class="grid_9">
                <h2 class="rs title"><?php echo "addInfo";?></h2>
                <p class="rs description"><?php echo "addInfoDesc";?></p>
            </div>
            <div class="grid_3 ta-r">
                <a class="btn bigger btn-red" href="#">Learn more(sr)</a>
            </div>
            <div class="clear"></div>
        </div>
    </div><!--end: .additional-info-line -->
    <footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_3 about-us">
                <h3 class="rs title">About</h3>
                <p class="rs description"><?php echo "about_desc";?></p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:info@megadrupal.com"><?php echo "mail";?></a></p>
                <p class="rs"><?php echo "mobile";?></p>
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
                    <p class="rs description"><?php echo "newsletterdesc";?></p>
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
                        <li><a class="be-fc-orange" href="#">What is Kickstars(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Start a project(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Project Guidlines(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Press(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Stats(sr)</a></li>
                    </ul>
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">Staff Picks(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Popular(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Recent(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Small Projects(sr)</a></li>
                        <li><a class="be-fc-orange" href="#">Most Funded(sr)</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="copyright">
            <div class="container_12">
                <div class="grid_12">
                    <a class="logo-footer" href="index-2.html"><img src="images/sample.jpg" alt="$SITE_NAME"/></a>
                    <p class="rs term-privacy">
                        <a class="fw-b be-fc-orange" href="single.html">Terms & Conditions</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="single.html">Privacy Policy</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="#">FAQ(sr)</a>
                    </p>
                    <p class="rs ta-c fc-gray-dark site-copyright">HTML by <a href="http://megadrupal.com/" title="Drupal Developers" target="_blank">MegaDrupal</a>. Designed by <a href="http://bestwebsoft.com/" title="Web development company" target="_blank">BestWebSoft</a>.</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </footer><!--end: #footer -->

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

<!-- Mirrored from envato.megadrupal.com/html/kickstars/single-search-dropdown.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Jun 2013 09:24:41 GMT -->
</html>