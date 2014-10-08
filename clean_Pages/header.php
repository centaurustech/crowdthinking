 <?php
    session_start();
	$sitename;
    if(isset($_SESSION['id'])){
        echo"
        <div class='container_12 clearfix'>
            <div class='grid_12 header-content'>
                <div id='sys_header_right' class='header-right'>
                    <div class='account-panel'>
                        <a href='logout.php' id='logout' class='btn btn-red' type='button'>Logout</a>
                    </div>
                    <div class='form-search'>
                        <form action='search-results.php' method='post'>
                            <label for='sys_txt_keyword'>
                                <input id='sys_txt_keyword' class='txt-keyword' type='text' name='search' placeholder='Search projects'/>
                            </label>
                            <button class='btn-search' type='submit'><i class='icon iMagnifier'></i></button>
                            <button class='btn-reset-keyword' type='reset'><i class='icon iXHover'></i></button>
                        </form>
                    </div>
                </div>
                <div class='header-left'>
                    <h1 id='logo'>
                        <a href=".$_SERVER['PHP_SELF'].">".$sitename."</a>
                    </h1>
                    <div class='main-nav clearfix'>
                        <div class='nav-item'>
                            <a href='all-projects.php' class='nav-title'>Entdecke</a>
                            <p class='rs nav-description'>andere Projekte</p>
                        </div>
                        <span class='sep'></span>
                        <div class='nav-item'>
                            <a href='createProject.php' class='nav-title'>Starte</a>
                            <p class='rs nav-description'>dein eigenes Projekt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>";

    } else {
        echo"
 <div class='container_12 clearfix'>
            <div class='grid_12 header-content'>
                <div id='sys_header_right' class='header-right'>
                    <div class='account-panel'>
                        <a href='#' class='btn btn-red sys_show_popup_login'>Registrieren</a>
                        <a href='#' class='btn btn-black sys_show_popup_login'>Login</a>
                    </div>
                    <div class='form-search'>
                        <form action='search-results.php' method='post'>
                            <label for='sys_txt_keyword'>
                                <input id='sys_txt_keyword' class='txt-keyword' type='text' name='search' placeholder='Search projects'/>
                            </label>
                            <button class='btn-search' type='submit'><i class='icon iMagnifier'></i></button>
                            <button class='btn-reset-keyword' type='reset'><i class='icon iXHover'></i></button>
                        </form>
                    </div>
                </div>
                <div class='header-left'>
                    <h1 id='logo'>
                        <a href=".$_SERVER['PHP_SELF']."> ".$sitename."</a>
                    </h1>
                    <div class='main-nav clearfix'>
                        <div class='nav-item'>
                            <a href='all-projects.php' class='nav-title'>Entdecke</a>
                            <p class='rs nav-description'>andere Projekte</p>
                        </div>
                        <span class='sep'></span>
                        <div class='nav-item'>
                            <a href='createProject.php' class='nav-title'>Starte</a>
                            <p class='rs nav-description'>dein eigenes Projekt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>";

    }

    ?>