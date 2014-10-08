<?php 


if(!empty($_POST)){
    require_once('connector.php');

    //Perform the verification of data introduced
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $name = $_POST['name'];
    $lastName =$_POST['lastName'];


    if($email1 == $email2){
        if($pass1 == $pass2){
            //Password must be at least 5 charatcters long
            if(strlen($pass1) >= 5){
                //Everything is Ok, proceed to registration on DB
                $email1 = mysqli_real_escape_string($link,$email1);
                $pass1 = mysqli_real_escape_string($link,$pass1);
                $name = mysqli_real_escape_string($link,$name);
                $lastName = mysqli_real_escape_string($link,$lastName);
                $pass1 = md5($pass1);

                //Check in the DB that the email does not exist
                $emailCheck = "SELECT * FROM `profile` WHERE `email` = '$email1'";
                $resultEmail = mysqli_query($link,$emailCheck);
                if ($resultEmail){
                    if (mysqli_num_rows($resultEmail) > 0){
                        echo "Sorry, that email is already in use";
                        //The e-mail does not exist in the DB, proceed to register.
                    } else {

                        $query = "INSERT INTO `profile`(`id`, `vorname`, `nachname`, `email`, `password`, `ort`, `bio`, `fb`, `youtube`, `twitter`, `googleplus`, `bild`, `category`) VALUES (NULL,'$name','$lastName','$email1','$pass1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
                        $result = mysqli_query($link,$query);

                        //An error ocurred during the registration.
                        if (!$result){
                            echo "Error: ".mysqli_error($link);
                        //Success on the registration
                        }    else {
                            echo "<p style='color:green'> You have succesfully registered, now you can login </p>";
                        }
                    }
                } else {
                    echo "Error: ".mysqli_error($link);
                }
            } else {
                echo "Password must be at least 5 characters.";
            }




        } else {
            echo "Passwords do not match";
            
        }
    } else {
        echo "Emails do not macth";
        
    }





} else{
die();

}

?>
