<footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_3 about-us">
                <h3 class="rs title">About</h3>
                <p class="rs description"><a href="about.php">About Us</a></p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:info@megadrupal.com"><?php echo "mail";?></a></p>
                <p class="rs"><?php echo "mobile";?></p>
            </div><!--end: .contact-info -->
            <div class="grid_3 recent-tweets">
                <h3 class="rs title"><a href="twitter.php">Recent Tweets</a></h3>
                <div class="lst-tweets" id="sys_lst_tweets">
                    <a class="twitter-timeline"  href="https://twitter.com/Crowd_thinking"  data-widget-id="475969702552817665">Tweets von @Crowd_thinking</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                </div>
            </div><!--end: .recent-tweets -->
            <div class="clear clear-2col"></div>
            <div class="grid_3 email-newsletter">
                <h3 class="rs title">Newsletter Signup</h3>
                <div class="inner">
                    <p class="rs description"><?php echo "newsletterdes";?></p>
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
                <h3 class="rs title">Entdecke &amp; Erstelle</h3>
                <div class="footer-menu">
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="whatis.php">Was ist Kickstars</a></li>
                        <li><a class="be-fc-orange" href="createProject.php">Starten Sie ein Projekt</a></li>
                        <li><a class="be-fc-orange" href="about.php">Team</a></li>
                    </ul>
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="search-results.php?mode=3">Bald beendet</a></li>
                        <li><a class="be-fc-orange" href="search-results.php?mode=1">Beliebt</a></li>
                        <li><a class="be-fc-orange" href="search-results.php?mode=2">Von heute</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>