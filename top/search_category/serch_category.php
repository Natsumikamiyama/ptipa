<html>
<head>
	<title>search movie</title>
</head>

<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect=mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8", $connect);

$category="select category_id,category_name from category_tbl";
$dbQuery = mysql_db_query($my_db, $category);

// ここからカテゴリーに紐づく動画の取得
if (isset($_POST["category"])) {

	$in_category=$_POST["category"];

	$get_information="select moe,pic_detail,pic_path,pic_date,pic_id,title from pic_tbl where category='$in_category'";

	$movie_information_set= mysql_db_query($my_db, $get_information);

while ($movie_information= mysql_fetch_assoc($movie_information_set)) {
	# codee...
	echo $movie_information["moe"];
	echo $movie_information["pic_detail"];
	echo $movie_information["pic_path"];
	echo $movie_information["pic_date"];
	?>
	<a href = "http://ptipa.sakura.ne.jp/moviepage/movie_page.php?id=<?php echo $movie_information['pic_id'];?>"> 
		<?php echo $movie_information["title"];?></a>
	<?php
}

	# code...
}

	$get_movie="SELECT moe,category from pic_tbl where category = "

?>


<body>

<form action="search_category.php" method="post">
<p>movie's category：<br>

<select name="category">
<option value="Event">Event</option>
<option value="Report">Report</option>
<option value="Cosplay">Cosplay</option>
<option value="Anime">Anime</option>
</select>

<?php
    while ($search_result=mysql_fetch_assoc($dbQuery)) {
?>
    <option value= <?php echo $search_result["category_id"];?> >
    	<?php echo $search_result["category_name"];?>
    </option>
<?php } ?>

</select></p>
<input type="submit" value="送信"><input type="reset" value="リセット">
</form>




</body>
</html>




