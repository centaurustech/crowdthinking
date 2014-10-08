<?php 
include_once("connector.php");
$pageTitle;
$categories;
$fProjectID;
$fTitle;
$fAuthor;
$fAuthorID;
$fCity;
$fdaysPer;
$fdaysLeft;
$fDesc;
$fImage;
initCategories();
initFeatured();
function initFeatured()
{
	$sql_command = "SELECT * FROM projects WHERE id =(select projectid from (SELECT projectid, count(*) as anz from Comments group by projectid order by anz desc LIMIT 0,1) a);";
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	global $fTitle,$fAuthor,$fCity,$fdaysPer,$fdaysLeft,$fDesc,$fImage,$fProjectID,$fAuthorID;
	// Results loop
	$tmp;
	while($project = mysqli_fetch_array($result))
	{
		$fProjectID = $project['id'];
		$fAuthorID = $project['author_id'];
		$fTitle = $project['projecttitle'];
		$fDesc = $project['excerpt'];
		$owner = findOwner($project['author_id']);
		$fImage = $project['imagedata'];
		if($owner!= false)
		{
			$fAuthor=$owner['name'].' '.$owner['firstName'];
		}else
		{
			$fAuthor='Unbekannt';
		}
		
		
		$city = findCity($project['city']);

		if($city!= false)
		{
			$fCity = $city['city'];
		}
		else
		{
			$fCity = 'Unbekannt';
		}
		
		$days = calcDaysLeft($project['id']);
		
		if($days!=false)
		{
			$fdaysLeft = $days['daysleft'];
			
			if($daysLeft<=0)
			{	
				$daysLeft = 0;
			}
			$fdaysPer = round(((100/$days['daysTotal'])*$days['over']),0,PHP_ROUND_HALF_UP);
			if($fdaysPer>100)
			{
				$fdaysPer = 100;
			}
			if($fdaysPer<0)
			{
				$fdaysPer = 0;
			}
		}
	}
}

function findOwner($userID)
{
	$sql_command = "SELECT * FROM User WHERE id = ".$userID;

	$result = mysqli_query($GLOBALS['link'],$sql_command);

	if($row = mysqli_fetch_assoc($result)){
		return $row;
		}
	
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

function findCity($cityID)
{
	$sql_command = "SELECT * FROM Cities WHERE id = ".$cityID;
	
	$result = mysqli_query($GLOBALS['link'],$sql_command);
	if($row = mysqli_fetch_assoc($result)){
		return $row;
	}
	return false;
}

function initCategories()
{
	$sql_command_categories = "SELECT * FROM Categories c";

	$result_cat = mysqli_query($GLOBALS['link'],$sql_command_categories);

	// Categories loop:
	$tmp;
	while($cats = mysqli_fetch_array($result_cat))
	{
		$tmp = '<li>';

		$tmp = $tmp.'<a href=search-results.php?cid='.$cats['id'].'>'.$cats['title']
					.'<span class="count-val"></span>'
					.'<i class="icon iPlugGray"></i>
					</a>
					</li>';
					
		$GLOBALS['categories']=$GLOBALS['categories'].$tmp;
		$tmp = '';
		
	}
}
?>