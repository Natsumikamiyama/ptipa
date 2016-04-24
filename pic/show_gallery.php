<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

$result = mysql_db_query( $my_db, 
"select * from pic_tbl" 
);

//ここまでが、実行結果を受け取るプログラム

//ここからが表示に関するプログラム

while(true){ //無限に繰り返せ
	/*
	$resultに対してmysql_fetch_assocを行うと
	表の１番上の行のデータが$rowに
	カット＆ペースト(Ctrl+Xやって、Ctrl+V)される
	*/
	$row = mysql_fetch_assoc($result);

	if($row == null){//$rowがnull(=空)なら終了
		break;
	}else{
		/*
		contentsのところには表示したい
		カラム名を入力する
		*/
		echo "<img src ='".$row["pic_path"]."'>";
		echo "<br>";
		?>

		<form action="pic_delete.php" method="GET">
		<input type="hidden" name="pic_id" value= '<?php echo $row["pic_id"]; ?>' >
		<input type="submit" value="削除">
		</form>

		<?php
		 //1行表示したら改行を入れる。
			//""で囲んだところで一区切り。変数と文字列は切り分けないとエラーになる//
	}
}

mysql_close($connect); 

?>


