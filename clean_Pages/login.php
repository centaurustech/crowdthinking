<?php
if(!empty($_POST)){
    require_once('connector.php');

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email = mysqli_real_escape_string($link,$email);
    $pass = mysqli_real_escape_string($link,$pass);
    $pass = md5($pass);


		    $logQuery = "SELECT * FROM `profile` WHERE `email` = '$email' AND `password` = '$pass'";
		    $result = mysqli_query($link,$logQuery);
		    if($result){
			    if(mysqli_num_rows($result) > 0 ){
			    	$row = $result->fetch_array(MYSQLI_ASSOC);
						// echo "You are logged in ".$row["email"];
						session_start();
						$_SESSION['id']=$row["id"];
						$id = $_SESSION['id'];
						$_SESSION['vorname']=$row["vorname"];
						$_SESSION['email']=$row["email"];
						// header("Location: profile.php");
						echo "profile.php?id=".$id;

						$result->close();
						// $link->close();
			    } else { 
			    	$emailCheck = "SELECT * FROM `profile` WHERE `email` = '$email'";
				    $resultEmail = mysqli_query($link,$emailCheck);
				    if ($resultEmail){
				    	if (mysqli_num_rows($resultEmail) == 0){
				        	echo "This email has not been registered in CrowdThinking";
				        } else {
			    	echo "Your email and/or password are incorrect".mysqli_error($link);
			    	die();
			    }
			}
		}
	}
}


?>
