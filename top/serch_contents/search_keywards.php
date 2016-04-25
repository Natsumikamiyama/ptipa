

<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect=mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8", $connect);


$search_keywords=$_POST["example"];

$search_detail="select moe,pic_detail,pic_date,pic_path,pic_id from pic_tbl where keywords
like '%".$search_keywords."%' ";
var_dump($search_detail);
var_dump(mysql_db_query($my_db, $search_detail));
$dbQuery = mysql_db_query($my_db, $search_detail);

while($search_result=mysql_fetch_assoc($dbQuery)){

	
echo "<a href='../moviepage/movie_page.php?id=".$search_result["pic_id"]."'>".$search_result["pic_detail"]."</a>";

} 


?>  



</body>
</html>