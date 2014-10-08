
<?php
 $id = $_GET["id"];

include_once "connector.php";

 $sql = "SELECT  * FROM `profile` where id=$id ";
 $db_erg = mysqli_query( $link, $sql );
 if ( ! $db_erg )
 {
  die('Ungültige Abfrage: ' . mysqli_error());
 }

 echo '<table border="1">';
while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  echo "<tr>";
  echo "<td>". $zeile['id'] . "</td>";
  echo "<td>". $zeile['nachname'] . "</td>";
  echo "<td>". $zeile['vorname'] . "</td>";
  echo "<td>". $zeile['email'] . "</td>";
  echo "<td>". $zeile['ort'] . "</td>";
  echo "<td>". $zeile['bio'] . "</td>";
  echo "<td>". $zeile['fb'] . "</td>";
  echo "<td>". $zeile['youtube'] . "</td>";
  echo "<td>". $zeile['twitter'] . "</td>";
  echo "<td>". $zeile['googleplus'] . "</td>";
  echo "<td>". $zeile['bildurl'] . "</td>";
  echo "<td>". $zeile['spezialisierung'] . "</td>";
  echo "</tr>";
}
echo "</table>";
 mysqli_free_result( $db_erg );
?>