<?php
// POSTのデータの取得
$pic_id =$_POST["pic_id"];
$user_id=$_POST["user_id"];


$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

/* 現在の動画のクリック数を表示する　start*/
$connect = mysql_connect($my_url,$my_folder,$my_pass);
$select_sql="select moe from pic_tbl where pic_id = $pic_id";
$now_moe_result=mysql_fetch_assoc(mysql_db_query($my_db, $select_sql));
/* 現在の動画のクリック数を表示する　end*/

// 押した回数を追加した数値の作成
$moe= $now_moe_result["moe"]+1; 

/* 最新のクリック数を問登録 start*/
$sql = mysql_db_query ($my_db, "UPDATE pic_tbl SET moe=$moe where pic_id=$pic_id");
/* 最新のクリック数を問登録 end*/


/* $moe_add = mysql_db_query($my_db, "SELECT SUM moe AS user_id, moe FROM pic_tbl GROUP BY user_id"); */
/* $mysql_db_query($my_db, $moe_total);
/* $moe_total =  mysql_db_query($my_db, "UPDATE moe SET moe=total FROM pic_tbl GROUP BY user_id"); */



/* 最新のクリック数を取得 start */
$select_sql="select moe from pic_tbl where pic_id = $pic_id";
$now_moe_after=mysql_fetch_assoc(mysql_db_query($my_db, $select_sql));
/* 最新のクリック数を取得 end */

/* 最新のクリック回数の取得 */
$moe_count_final="select moe from user_tbl where user_id=$user_id";
$moe_count_final_2=mysql_fetch_assoc(mysql_db_query($my_db, $moe_count_final));

/* 最新のクリック回数から押した数をひく(1回) */
$moe2= $moe_count_final_2["moe"]-1;

/* 情報の更新 */
$moe_update_sql= mysql_db_query ($my_db, "UPDATE user_tbl SET moe=$moe2 where user_id=$user_id");
$moe_count_finish=mysql_fetch_assoc(mysql_db_query($my_db, $moe_count_final));

$user_click= "insert into user_click_tbl (user_id,click_date) values ($user_id,'".date('Y-m-d H:i:s')."')";
mysql_db_query ($my_db, $user_click);


// 結果を出力
echo '{"videoClick":"'.$now_moe_after["moe"].'","userClickCount":"'.$moe_count_finish["moe"].'"}';
//echo $moe_count_finish["moe?>