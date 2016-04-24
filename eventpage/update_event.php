<?php 
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

$event_name = $_GET["event_name"];
$event_detail = $_GET["event_detail"];

//user_idをログインした状態から取り込みたい。セッション？

//データベースに対してSQLを実行する	
mysql_db_query($my_folder, "UPDATE event_tbl SET event_name ='$event_name', event_detail ='$event_detail' WHERE user_id=2"
);

mysql_close($connect); 
?>