 <?php
  //Test der Eingabe
 /*
 echo "Ihre Eingabe <br>\n";
 echo "vorname: " . $_POST["txt_vorname"] . "<br>";
 echo "nachname: " . $_POST["txt_nachname"] . "<br>";
 echo "Ort: " . $_POST["txt_location"]. "<br>";
 echo "Bio: " . $_POST["txt_bio"] . "<br>";
 echo "FB : " . $_POST["fb_txt"] . "<br>";
 echo "Twitter : " . $_POST["twitter_txt"] . "<br>";
 echo "YT : " . $_POST["yt_txt"] . "<br>";
 echo "G+ : " . $_POST["gplus_txt"] . "<br>";
 echo "Spezial : " . $_POST["spezialisierung"] . "<br>";*/
  include_once "connector.php";

 $id = $_POST["id"];
 $vorname = $_POST["txt_vorname"];
 $nachname = $_POST["txt_nachname"];
 $email = $_POST["txt_email"];
 $ort = $_POST["txt_location"];
 $bio =$_POST["txt_bio"];
 $fb=$_POST["fb_txt"];
 $youtube=$_POST["yt_txt"];
 $twitter=$_POST["twitter_txt"];
 $gplus=$_POST["gplus_txt"];
 $spezialisierung= $_POST["spezialisierung"];
 
 if (array_key_exists('image',$_FILES)) 
{
// echo "exists";
	$path = $_FILES['image']['tmp_name'];
// echo $path;	
	$type = $_FILES['image']['type'];
// echo $type;
	$data = file_get_contents($path);
// echo $data;
	$base64 = 'data:' . $type . ';base64,' . base64_encode($data);
}
else{
// echo "exists nicht";
}
 
 //Eingabe übertragen
 
 
 if ($id==0){
 $sql = "INSERT INTO `profile` 
 (`vorname`, `nachname`, email, `ort`, `bio`, `fb`, `youtube`, `twitter`, `googleplus`, `bild`, `spezialisierung`) 
 VALUES 
 ('$vorname', '$nachname', '$email', '$ort', '$bio', '$fb', '$youtube', '$twitter', '$gplus', '$base64', '$spezialisierung');"; 
 $link->query($sql);
  }
  else{
  $sql = "UPDATE profile
SET vorname='$vorname',nachname='$nachname', email='$email', ort='$ort', bio='$bio', fb='$fb', youtube='$youtube', twitter='$twitter',
 googleplus='$gplus', bild='$base64', spezialisierung='$spezialisierung'
WHERE id=$id;";
 $link->query($sql);
  }
 
 /* $ergebnis = $link->query($sql);
 $zeile = $ergebnis->fetch_array();
echo "<pre>";
 print_r($zeile);
 echo "</pre>";*/
 header("Location: http://141.28.73.142/clean_Pages/profile.php?id=".$id);
 ?>