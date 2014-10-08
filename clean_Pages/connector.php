<?php
	//general connection parameters
	$dbname		= "crowd";
	$dbuser		= "root";
	$dbpasswd	= "!asdf#FDSA!";
	$dblocation	= "localhost";
	
	//establish connection
	$link = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);
	if(!$link)
	{
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}
?>