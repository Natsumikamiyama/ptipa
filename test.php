<?php 


$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";


mysql_connect($my_url,$my_folder,$my_pass);

while($row = mysql_fetch_assoc(mysql_db_query($my_db,"select * from user_tbl"))){
var_dump($row);
}




?>