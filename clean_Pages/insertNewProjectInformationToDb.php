<?php
// echo "blubb";

$projectId;
$cityId;

$startOrEndEmpty;
$startdate = $_POST["start"];
if(empty($startdate))
{
	$startOrEndEmpty = true;
	$startdate = "01/01/1970";
}

$enddate = $_POST["end"];
if(empty($enddate))
{
	$startOrEndEmpty = true;
	$enddate = "01/01/1970";
}

if($startOrEndEmpty)
{
	$duration = 0;
}
else
{
	$datetime1 = new DateTime($startdate);
	$datetime2 = new DateTime($enddate);
	
// echo $startdate."#".$enddate."<br>";
	
	$interval = $datetime1->diff($datetime2);
	$duration = $interval->format('%a');
	
	list ($monat, $tag, $jahr) = split('[/.-]', $startdate);
	$startdate = $jahr."-".$monat."-".$tag;
	
	list ($monat, $tag, $jahr) = split('[/.-]', $enddate);
	$enddate = $jahr."-".$monat."-".$tag;
	
	// echo "#".$duration."#";
}

// echo $startdate."#".$enddate."<br>";

$title = $_POST["title"];
if(empty($title))
{
	$title = "Muster";
}
$goalMoney = $_POST["goalMoney"];
if(empty($goalMoney))
{
	$goalMoney = 0;
}
$goalWork = $_POST["goalWork"];
if(empty($goalWork))
{
	$goalWork = 0;
}

$country = $_POST["country"];
if(empty($country))
{
	$country = "Musterland";
}
$area = $_POST["area"];
if(empty($area))
{
	$area = "Musterregion";
}
$zipcode = $_POST["zipcode"];
if(empty($zipcode))
{
	$zipcode = '4711';
}
$city = $_POST["city"];
if(empty($city))
{
	$city = "Musterstadt";
}
$description = $_POST["description"];
if(empty($description))
{
	$description = "Musterbeschreibung";
}

// description : ' ersetzen !!!
$description = str_replace("'",'"',$description);

$excerpt = $_POST["excerpt"];
if(empty($excerpt))
{
	$excerpt = "Musterexcerpt";
}
$cleverle = $_POST["Cleverle"];
if(empty($cleverle))
{
	$cleverle = "www.cleverle-navi.de";
}
$storify = $_POST["Storify"];
if(empty($storify))
{
	$storify = "www.storify.de";
}
$kickstarter = $_POST["Kickstarter"];
if(empty($kickstarter))
{
	$kickstarter = "www.kickstarter.de";
}
$facebook = $_POST["Facebook"];
if(empty($facebook))
{
	$facebook = "www.facebook.de";
}
$googleplus = $_POST["Googleplus"];
if(empty($googleplus))
{
	$googleplus = "www.google.de";
}
$twitter = $_POST["Twitter"];
if(empty($twitter))
{
	$twitter = "www.twitter.de";
}
$youtube = $_POST["Youtube"];
if(empty($youtube))
{
	$youtube = "www.youtube.de";
}
$prename = $_POST["prename"];
if(empty($prename))
{
	$prename = "Testvorname";
}
$lastname = $_POST["lastname"];
if(empty($lastname))
{
	$lastname = "Testnachname";
}
$category = $_POST["category"];
if($category == "")
{
	$category = 2;
}
include_once("connector.php");

// Ein Bild hochladen
/*
if (array_key_exists('image',$_FILES)) 
{
	$tmpname = $_FILES['image']['tmp_name'];
	$imagetype = $_FILES['image']['type'];
	$hndFile = fopen($tmpname, "r");
	$image = addslashes(fread($hndFile, filesize($tmpname)));
}*/

$image;
if (array_key_exists('image',$_FILES)) 
{
	$path = $_FILES['image']['tmp_name'];
	$type = $_FILES['image']['type'];
	$data = file_get_contents($path);
	$base64 = 'data:' . $type . ';base64,' . base64_encode($data);
	
	// echo $path."###".$type;
	
	/*
	$tmpname = $_FILES['image']['tmp_name'];
	$imagetype = $_FILES['image']['type'];
	$hndFile = fopen($tmpname, "r");
	$image = addslashes(fread($hndFile, filesize($tmpname)));*/

	$GLOBALS["image"] = $base64;
}

//echo $imagetype."<br>".$image;

//check, if city exists
$checkcity = "select count(*) as citycount from Cities where UPPER(zipcode)='".strtoupper($zipcode)."' AND UPPER(city)='".strtoupper($city)."' AND UPPER(country)='".strtoupper($country)."' AND UPPER(area)='".strtoupper($area)."';";
$inserttocities;

if(mysqli_fetch_array(mysqli_query($link, $checkcity))["citycount"] == 0)
{
	//city anlegen
	$inserttocities = "insert into Cities (zipcode, country, area, city) VALUES ('".$zipcode."','".$country."','".$area."','".$city."');";
	mysqli_query($link, $inserttocities);
	// echo "#".$inserttocities."#";
} 
else 
{ 
	// echo mysql_errno($link) . ": " . mysql_error($link) . "\n"; 
}

//get city id
$cityIdText = "select id as cityId from Cities where UPPER(city)='".strtoupper($city)."' AND UPPER(zipcode)='".strtoupper($zipcode)."' AND UPPER(country)='".strtoupper($country)."' AND UPPER(area)='".strtoupper($area)."';";

$GLOBALS["cityId"] = mysqli_fetch_array(mysqli_query($link, $cityIdText))["cityId"];

//check, if user exists
$checkuser = "select count(*) as usercount from User where UPPER(firstName)='".strtoupper($prename)."' AND UPPER(name)='".strtoupper($lastname)."';";
$inserttousers;

// echo $checkuser;
if(mysqli_fetch_array(mysqli_query($link, $checkuser))["usercount"] == 0)
{
	//city anlegen
	$inserttousers = "insert into User (firstName, name, city_id) VALUES ('".$prename."','".$lastname."','".$GLOBALS["cityId"]."');";
	mysqli_query($link, $inserttousers);
	
	// echo "#".$inserttousers."#";
} else 
{ 
// echo mysql_errno($link) . ": " . mysql_error($link) . "\n"; 
}

//check, if project exists
$checkproject = "select count(*) as projectcount from projects where UPPER(projecttitle)='".strtoupper($title)."';";
$inserttoprojects;

if(mysqli_fetch_array(mysqli_query($link, $checkproject))["projectcount"] == 0)
{
	//project anlegen
	$inserttoprojects = "insert into projects (projecttitle, goalMoney, goalWork, duration, startdate, enddate, city, description, excerpt, category, imagedata) VALUES ('".$title."',".$goalMoney.",".$goalWork.",".$duration.",".$startdate.",".$enddate.",".$GLOBALS["cityId"].",'".$description."','".$excerpt."','".$category."','".$image."');";
	
	// echo "#####<br>".$GLOBALS["cityId"];
	// echo "#".$inserttoprojects."#";
	
	mysqli_query($link, $inserttoprojects);
		
	//get project id
	$projectIdText = "select id as projectId from projects where 
	projecttitle='".$projecttitle."' AND
	description='".$description."' AND
	excerpt='".$excerpt."' AND
	;";

	$GLOBALS["projectId"] = mysqli_fetch_array(mysqli_query($link, $projectIdText))["projectId"];
	
	
	if(!empty($cleverle))
	{
		$querytext = "INSERT into Cleverle (projectid, link) VALUES (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($storify))
	{
		$querytext = "INSERT into Storify (projectid, link) VALUES (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($kickstarter))
	{
		$querytext = "INSERT into Kickstarter (projectid, link) VALUES (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($facebook))
	{
		$querytext = "INSERT into Facebook (projectid, link) VALUES  (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($googleplus))
	{
		$querytext = "INSERT into Googleplus (projectid, link) VALUES  (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($twitter))
	{
		$querytext = "INSERT into Twitter (projectid, link) VALUES  (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
	if(!empty($youtube))
	{
		$querytext = "INSERT into Youtube (projectid, link) VALUES  (".$GLOBALS["projectId"].", '".$cleverle."');";
		mysqli_query($link, $querytext);
	}
	
} else 
{ 
//echo mysql_errno($link) . ": " . mysql_error($link) . "\n"; 
}

// echo "#".$title.$goalMoney.$goalWork.$length.$country.$area.$city.$description.$excerpt.$youtube.$storify.$kickstarter.$prename.$lastname.$GLOBALS["projectId"]."#";

//ACHTUNG !!! hardcoded !!!
header("Location: http://141.28.73.142/clean_Pages/project.php?id=".$GLOBALS["projectId"]);
?>