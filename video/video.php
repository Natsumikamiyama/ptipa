<?php 
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";//ID名を指定

$connect = mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8",$connect);

$handle=fopen("b31_c819/Tech_Fight/1.mp4", 'rb');
while (!feof($handle)) {

echo fread($handle, 4096);
ob_flush();
flush();	# code...
}
fclose($handle);

mysql_close($connect); 

?>