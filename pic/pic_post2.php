<?php 

session_start();

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";//ID名を指定

$connect = mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8",$connect);

$filedir="/img/mov/";
var_dump ($_SERVER["DOCUMENT_ROOT"]);
//$filesdirで指定したファイルに画像を保存する。
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
	var_dump($_FILES["upfile"]["tmp_name"]);
	var_dump($_SERVER["DOCUMENT_ROOT"].$filedir.$_FILES["upfile"]["name"]);


    if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$filedir.$_FILES["upfile"]["name"])) {
        echo $_FILES["upfile"]["name"] . "is uploaded!";
        $save = "INSERT INTO pic_tbl (pic_path, user_id) VALUES ('".$filedir.$_FILES["upfile"]["name"]."',".$_SESSION["user_id"].")";
        var_dump($save);

        mysql_db_query ($my_db, $save);
    }
    else {
        echo "cannot be uploaded...";
    }
}
else {
    echo "File not selected...";
}



echo $_SERVER;
/*
echo header ("Location:../ptipa_mypage/mypage_sample.php");

mysql_close($connect);

 ?> 