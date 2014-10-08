<?php 
$articleTitle;
$articleID;
$articleContent;
$articlePoster;
$articleDate;
$posterID; // Is used to link the profile of the author
$articlePicture;
$categories;
$category_id;
$categories_desc = 'In Kategorien suchen...';
$References;

$articleID = $_GET['articleID'];

// get article data from database
$sql_command = "SELECT u.firstName,u.name,a.title,a.content as a_content, a.id as a_id, u.id as u_id, c.id as c_id, a.picture_path as a_picture 
				FROM Articles a,User u,Categories c
				WHERE a.author_id=u.id AND
				a.category_id=c.id AND
				a.id=".$articleID.";";

$result = mysqli_query ($link, $sql_command);

if($row = mysqli_fetch_assoc($result)){

// fill variables
$articleTitle = $row['title'];
$articlePoster =  $row['firstName']." ".$row['name'];
$posterID = $row['u_id'];
$articlePicture = $row['a_picture'];
$articleContent = $row['a_content'];
$category_id = $row['c_id'];
}else
{
$articleTitle = 'Article not found.';
$category_id = 1;
}
// Categories loop:
$sql_command_categories = "SELECT * FROM Categories c";

$result_cat = mysqli_query($link,$sql_command_categories);

$tmp;
while($cats = mysqli_fetch_array($result_cat))
{
	if($cats['id']== $category_id)
		$tmp = '<li class="active">';
	else
		$tmp ='<li>';
	$tmp = $tmp.'<a href=search.php?cid='.$cats['id'].'>'.$cats['title']
				.'<i class="icon iPlugGray"></i>
				</a>
				</li>';
	$categories=$categories.$tmp;
	$tmp = '';
}

//References loop
$sql_command_references = "SELECT * FROM Article_References a where a.article_id = ".$articleID.";";

$result_cat_R = mysqli_query($link,$sql_command_references);

$tmp2;
while($cats_R = mysqli_fetch_array($result_cat_R))
{
	$tmp2 = $tmp2.'<a href="'.$cats_R['url'].'">'.$cats_R['name'].'</a>';
	$References=$References.$tmp2;
	$tmp2 = '';
}
?>
