<?php 
session_start();
	$my_folder="ptipa";
	$my_db ="ptipa_db";
	$my_pass="cosmo123";
	$my_url="mysql527.db.sakura.ne.jp";

	$connect = mysql_connect($my_url,$my_folder,$my_pass);
	mysql_query("SET NAMES utf8", $connect);

	$term=$_POST["term"];
	$card_number=$_POST["card_number"];
	$user_id= $_SESSION["user_id"];

	if ($term==100){$cost="2.99";

	}else if ($term == 300) {$cost="8.99";
		# code...
	}elseif ($term == 500) {$cost="13.99";
		# code...
	}elseif ($term ==1000) {$cost="29.99";
		# code...
	}elseif ($term ==1200) {$cost="35.99";
		# code...
	}


$buy_user_moe="insert into payment_tbl (user_id,card_number,paid) VALUES ($user_id,$card_number,$cost) ";
mysql_db_query($my_db, $buy_user_moe);

$customer_getmoe="select moe from user_tbl where user_id=$user_id";
$result=mysql_db_query($my_db, $customer_getmoe);
$result_moe=mysql_fetch_assoc($result);

$customer_get_moe=$term+$result_moe["moe"];
$update_user_moe="update user_tbl set moe=$customer_get_moe where user_id=$user_id";
$update=mysql_db_query($my_db, $update_user_moe);


	/*mysql_db_query($my_folder, "INSERT INTO payment_tbl (user_id, payment_flg, payment_date, card_number)
		VALUES ($_SESSION["user_id"], 1, sysdate(),'$card_number')"
		);
*/
header("location:/ptipa_mypage/mypage_sample.php");

 ?>