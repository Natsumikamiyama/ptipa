

<?php
/*MOEを利用するユーザーへの無料付与MOEを毎日20にするためのphp*/
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

/* 現在の動画のクリック数を表示する　start*/
$connect = mysql_connect($my_url,$my_folder,$my_pass);

$bigin_date= date("Y-m-d 00:00:00");
$finish_date= date("Y-m-d 23:59:59");

$count_moe = "select user_id , count(1) as count from user_click_tbl where click_date between '$bigin_date' and '$finish_date' group by 1";
$dayMoeCount = mysql_db_query($my_db, $count_moe);

while($count_moe1= mysql_fetch_assoc($dayMoeCount)){
	$result_moe = 10-$count_moe1["count"];


$moe_get="select moe from user_tbl where user_id=".$count_moe1['user_id'];
$nowmoe =mysql_fetch_assoc(mysql_db_query($my_db,$moe_get));


if ($result_moe <= 0 ){ 
	$return_getmoe=$nowmoe["moe"]+10;

$free_moe="update user_tbl set moe=$return_getmoe where user_id=".$count_moe1['user_id'];
	# code...
}elseif ($result_moe >= 1) {
	
	$return2_getmoe=$nowmoe["moe"]+$count_moe1["count"];
$free_moe="update user_tbl set moe=$return2_getmoe where user_id=".$count_moe1['user_id'];
	# code...
}
mysql_db_query($my_db, $free_moe);

}












/*$select_sql="update user_tbl set moe = 20";
$now_moe_result=mysql_db_query($my_folder, $select_sql);
var_dump($now_moe_result);*/
/* 一日に一回ユーザーの"萌"回数（一日最大10回。課金している場合は除く。）を元に戻す。*/

?>