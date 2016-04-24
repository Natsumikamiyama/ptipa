
<?php 

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

//user_idをログインした状態から取り込みたい。セッション？

//データベースに対してSQLを実行する	
mysql_db_query($my_db, "DELETE FROM pic_tbl WHERE pic_id=".$_GET["pic_id"]
);

mysql_close($connect); 

header("location:/ptipa_mypage/mypage_sample.php");

?>
