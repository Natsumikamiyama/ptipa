<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

$contents1 = $_GET["email"];
$contents2 = $_GET["password"];
$result = mysql_db_query( $my_db, 
"SELECT * FROM user_tbl WHERE email = '$contents1' and password = '$contents2'");
//"SELECT * FROM consumer_tbl WHERE consumer_id = 1 and email = 'sato@example.com'");


//データベースに対してSQLを実行する	
$num_rows = mysql_num_rows($result);

if  ($num_rows == 1) {
	echo header("Location:/ptipa_mypage/mypage_sample.php");
	//echo header( "Location:http://nunona.jp/wppost/plg_WpPost_post.php");

	$row = mysql_fetch_assoc($result);
	
	session_start();
	$_SESSION["user_id"]=$row["user_id"];



	}else{
	//echo "失敗";
		echo header( "Location:http://recruiting.c-connect.co.jp/");

	}



mysql_close($connect); 

?>