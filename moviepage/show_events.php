
<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";




$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

$title=$_GET["event_name"];

$result = mysql_db_query($my_folder, 
"SELECT * from pic_tbl where event_name like '%$title%'" 
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
		echo $row["event_name"];
		echo "<br>";
		echo $row["event_detail"];
		echo "<img src ='".$row["pic_pass"]."'>";
		echo "<br>"; //1行表示したら改行を入れる。
			//""で囲んだところで一区切り。変数と文字列は切り分けないとエラーになる//
	}
}

mysql_close($connect); 

?>
