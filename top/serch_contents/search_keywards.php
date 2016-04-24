<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="#" class="search">

<div>
<input type="text" name="example" class="textBox">
<input type="submit" value="検索" class="btn">
</div> 
</form>

<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect=mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8", $connect);


$search_keywords=$_POST["example"];

$search_detail="select moe,pic_detail,pic_date,pic_path from pic_tbl where keywords
like '%".$search_keywords."%' ";
var_dump($search_detail);
var_dump(mysql_db_query($my_db, $search_detail));
$dbQuery = mysql_db_query($my_db, $search_detail);

while($search_result=mysql_fetch_assoc($dbQuery)){

	
	echo $search_result["moe"];
	echo $search_result["pic_detail"];
	echo $search_result["pic_date"];
	echo $search_result["pic_path"];
} 

var_dump($search_result);

?>  



</body>
</html>