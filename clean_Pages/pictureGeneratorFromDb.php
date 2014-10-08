<?php

include_once ("connector.php");

$imageQueryText = "select imagedata from projects where id = 10;";
$imageQuery = mysqli_query($link, $imageQueryText);
$result = mysqli_fetch_array($imageQuery);
$img_file = $result["imagedata"];
?>

<html>
<head>
</head>
<body>
<img src="<?php echo $img_file;?>">
</body>
</html>