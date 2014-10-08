<?php
//This is a very simple logout. It would be better a more secure logout
session_start();
require_once("connector.php");

$logout = session_destroy();
if($logout){
	header("location: index.php");
} else {
	die();
}
?>

