<?php 
	session_start();


	$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);
	mysql_query("SET NAMES utf8", $connect);

	$HN=$_GET["HN"];
	$favorites=$_GET["favorites"];
	$user_detail=$_GET["user_detail"];

	mysql_db_query($my_db, "UPDATE user_tbl SET cos_name='$HN',user_detail='$user_detail',favorites='$favorites'
		WHERE user_tbl.user_id = ".$_SESSION["user_id"].""
		);

	mysql_close($connect); 

	header("location:../ptipa_mypage/mypage_sample.php");
 ?>