<?php 
include_once "connector.php";

$searchText;
$resultCount;
$catName;
$categories;
$results;
$finalString;
$mode; // 1 = beliebt 2 = heute gestartet 3 = endet in den nächsten 3 tagen 4 advancedSearch
$ShowMoreButton;
$cid;


$searchText = $_REQUEST["search"];
$mode = $_GET["mode"];
$cid = $_GET["cid"];
// echo $cid;
if($mode==1)
{
	$sqlSearch = "SELECT p.* FROM projects p WHERE countComments > 10;";
	$searchText='Beliebt';
}else if($mode==2)
{
	$sqlSearch = "SELECT p.* FROM projects p WHERE startdate = CURDATE();";
	$searchText = 'Heute';
}
else if($mode == 3)
{
	$sqlSearch = "SELECT p.* FROM projects p WHERE DATEDIFF(enddate,CURDATE())<=3 AND DATEDIFF(enddate,CURDATE()>=0);";
	$searchText = 'Bald beendet';
}else if($mode == 4)
{
	$sTitle = $_REQUEST['txt-title'];
	$sAuthor = $_REQUEST['txt-autor'];
	$sDesc = $_REQUEST['txt-desc'];
	$sCity = $_REQUEST['txt-city'];
	$sCategory = $_REQUEST['category'];
	$sCircum = $_REQUEST['circum'];
	
	$earth = 6371;
	// <Calc distance>
		if(!empty($sCity))
		{
			$cityGeo = findCityGeo($sCity);
			$radLng = $cityGeo['lng'] * (pi()/180);
			$radLat = $cityGeo['lat'] * (pi()/180);
			
			$sqlSearch = "select p.*, ".$earth." * ( 2 
      * asin(
        sqrt(
          power(sin(((lng * (PI()/180)) - ".$radLng.") / 2), 2) 
          + cos(lng) 
          * cos(".$radLat.") 
          * power(sin(((lat * (PI()/180)) - ".$radLat.") / 2), 2)
          )
        )
      ) as distance
from
    projects p, Cities c, profile u, Categories x WHERE 
				  p.city = c.id AND p.author_id = u.id AND p.category = x.id AND
				  p.projecttitle LIKE '%".$sTitle."%' AND
				  (u.vorname LIKE '%".$sAuthor."%' OR u.nachname LIKE '%".$sAuthor."%') AND
				  p.description LIKE '%".$sDesc."%' AND 
				  x.id LIKE '%".$sCategory."%'
having distance ".$sCircum."
order by distance";
// echo $sqlSearch;
		}
	// </Calc distane>
	
	
	else{
	$sqlSearch = "SELECT p.* FROM projects p, Cities c, profile u, Categories x WHERE 
				  p.city = c.id AND p.author_id = u.id AND p.category = x.id AND
				  p.projecttitle LIKE '%".$sTitle."%' AND
				  (u.firstName LIKE '%".$sAuthor."%' OR u.Name LIKE '%".$sAuthor."%') AND
				  p.description LIKE '%".$sDesc."%' AND 
				  (c.city LIKE '%".$sCity."%' OR c.zipcode LIKE '%".$sCity."%') AND 
				  x.id LIKE '%".$sCategory."%';" ;
		}	
	$searchText = 'Erweitere Suche';
}
else{
if(!empty($cid)){

$sqlSearch = "SELECT p.* FROM projects p WHERE 
					(projecttitle LIKE '%".$searchText."%' 
					OR excerpt LIKE '%".$searchText."%' 
					OR city LIKE '%".$searchText."%')
					AND category=".$cid.";";
}else{
$sqlSearch = "SELECT p.* FROM projects p WHERE 
					projecttitle LIKE '%".$searchText."%' 
					OR excerpt LIKE '%".$searchText."%' 
					OR city LIKE '%".$searchText."%';";
}
}
initCategories();
		
if((strcmp($mode,"all")==0))
{
	initResultsTitleOnly($sqlSearch);
}
else
{
	initResults($sqlSearch);
}




function initCategories()
{
	$sql_command_categories = "SELECT * FROM Categories c";

	$result_cat = mysqli_query($GLOBALS['link'],$sql_command_categories);
	global $cid;
	// Categories loop:
	$tmp;
	while($cats = mysqli_fetch_array($result_cat))
	{
		if(!empty($cid))
		{
			if($cats['id']==$cid)
			{
				$tmp = '<li class="active">';
			}else
			{
					$tmp = '<li>';
			}
		}else{
			$tmp = '<li>';
		}
		$tmp = $tmp.'<a href=search-results.php?cid='.$cats['id'].'>'.$cats['title']
					.'<span class="count-val"></span>'
					.'<i class="icon iPlugGray"></i>
					</a>
					</li>';
					
		$GLOBALS['categories']=$GLOBALS['categories'].$tmp;
		$tmp = '';
	}
}
function initResults($sql_command)
{
	$results = mysqli_query($GLOBALS['link'],$sql_command);
	global $finalString,$ShowMoreButton,$searchText;
	$resultDisplayed=0;
	$Limit=8;
	// Results loop
	$tmp;
	while($project = mysqli_fetch_array($results))
	{
	
		//$resultCount=$project['amount'];
		$owner = findOwner($project['author_id']);
		$ownerName;$ownerFirstName;$ownerCity;

		if($owner!= false)
		{
			$ownerName=$owner['nachname'];
			$ownerFirstName=$owner['vorname'];
		}else
		{
			$ownerName='Unbekannt';
			$ownerFirstName='';
		}
		
		
		$city = findCity($project['city']);
		$cityName;
		if($city!= false)
		{
			$cityName = $city['city'];
		}
		else
		{
			$cityName = 'Unbekannt';
		}
		
		$comments = countComments($project['id']);
		$countC;
		if($comments!=false){
			$countC = $comments['count'];
			}
		else{
			$countC = 0;
			}

		$days = calcDaysLeft($project['id']);
		$daysLeft;$daysOverPerc;
		
		if($days!=false)
		{
			$daysLeft = $days['daysleft'];
			
			if($daysLeft<=0)
			{	
				$daysLeft = 0;
			}
			$daysOverPerc = round(((100/$days['daysTotal'])*$days['over']),0,PHP_ROUND_HALF_UP);
			if($daysOverPerc>100)
			{
				$daysOverPerc = 100;
			}
			if($daysOverPerc<0)
			{
				$daysOverPerc = 0;
			}
		}
		
		$tmp=
		'<div class="project-short larger">
                        <div class="top-project-info">
                            <div class="content-info-short clearfix">
                                <a href="project.php?id='.$project['id'].'" class="thumb-img">
                                    <img src="'.$project['imagedata'].'" alt="$TITLE">
                                </a>
                                <div class="wrap-short-detail">
                                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="project.php?id='.$project['id'].'">'.$project['projecttitle'].'</a></h3>
                                    <p class="rs tiny-desc">von <a href="profile.php?id='.$project['author_id'].'" class="fw-b fc-gray be-fc-orange">'.$ownerName.' '.$ownerFirstName.'</a> in <span class="fw-b fc-gray">'.$cityName.'</span></p>
                                    <p class="rs title-description">'.$project['excerpt'].'</p>

                                </div>
                                <p class="rs clearfix comment-view">
                                    <a href="project.php?id='.$project['id'].'" class="fc-gray be-fc-orange">'.$countC.' comments</a>
                                    <span class="sep">|</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-project-info clearfix">
                            <div class="project-progress sys_circle_progress" data-percent="'.$daysOverPerc.'">
                                <div class="sys_holder_sector"></div>
                            </div>
                            <div class="group-fee clearfix">
                                <div class="sep"></div>
                                <div class="fee-item">
                                    <p class="rs lbl"> Tage verbleibend </p>
                                    <span class="val">'.$daysLeft.'</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>';
		$finalString.=$tmp;
		$tmp ='';
		$resultDisplayed++;
		
		if($resultDisplayed>=$Limit)
		{
			$ShowMoreButton='<a class="btn btn-black btn-load-more" href="search-results.php?mode=all&search='.$searchText.'">Alle anzeigen</a>';
			break;
		}
		
	}
	
}

function initResultsTitleOnly($sql_command)
{
	$results = mysqli_query($GLOBALS['link'],$sql_command);
	global $finalString;
	// Results loop
	$tmp;
	while($project = mysqli_fetch_array($results))
	{
		$tmp='<div class="wrap-short-detail">
                <h3 class="rs acticle-title"><a class="be-fc-orange" href="#">'.$project['projecttitle'].'</a></h3>
				<p></p>
                <p class="rs title-description">'.$project['excerpt'].'</p>
				<p></p>
              </div>';
		$finalString.=$tmp;
	}
}
function findOwner($userID)
{
	$sql_command = "SELECT * FROM profile WHERE id = ".$userID;

	$result = mysqli_query($GLOBALS['link'],$sql_command);

	if($row = mysqli_fetch_assoc($result)){
		return $row;
		}
	else
	return false;
}

function findCity($cityID)
{
	$sql_command = "SELECT * FROM Cities WHERE id = ".$cityID;
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	if($row = mysqli_fetch_assoc($result))
		return $row;
	else
	return false;
}

function findCityGeo($cityy)
{
	$sql_command = "SELECT lng,lat  FROM Cities WHERE zipcode like '%".$cityy."%' or city like '%".$cityy."%';";
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);

	if($row = mysqli_fetch_assoc($result))
		return $row;
	else
	return false;
}
function countComments($projectID)
{
	$sql_command = "SELECT count(*) as count FROM Comments WHERE id = ".$projectID;
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);

	if($row = mysqli_fetch_assoc($result))
		return $row;
	else
	return false;
}

function calcDaysLeft($projectID)
{
	$sql_command = "SELECT  DATEDIFF(enddate,startdate) as daysTotal, DATEDIFF(enddate,CURDATE()) as daysleft, DATEDIFF(CURDATE(),startdate) as over FROM projects WHERE id =  ".$projectID;
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	
	if($row = mysqli_fetch_assoc($result))
	{
		return $row;
	}else
	{
		return false;
	}
}

function checkSearchText($searchText)
{
	$sql_command = "SELECT title FROM Categories WHERE title = ".$searchText;
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	
	if($row = mysqli_fetch_assoc($result))
		return true;

	return false;
}
?>

