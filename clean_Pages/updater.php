<?php
echo "<script>alert('hey')</script>";
$id = $_GET("id");
$title =$_GET("title");
$type = $_GET("type");
$date = $_GET("date");
$link = $_GET("link");

include_once("connector.php");

$updateText = "UPDATE timeline
				SET timeline.title = '".$title."',
				timeline.type = ".$type.",
				timeline.date = '".$date."',
				timeline.link = '".$link."'
				WHERE timeline.id";
				mysqli_query($link, $updateText);
				
header('Location: editable.php');
?>				