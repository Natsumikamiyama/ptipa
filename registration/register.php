<?php

//$salt="mwefCMEP28DjwdW3lwdS239vVS";

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

//$password=md5($_GET["password"].$salt);

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

$HN = $_GET["HN"];
$name = $_GET["name"];
$phone=$_GET["phone"];
$address=$_GET["address"];
$email=$_GET["mail"];
$password=$_GET["password"];
$sei=$_GET["sei"];
$birthday=$_GET["birthday"];
session_start();
$_SESSION["error"]= array();

foreach ($_GET as $key => $value) {
    # code...
    echo $value;
    $alart_error="";
    if (empty($value)) {
        switch ($key) {
            case 'HN':
            $alart_error="please,enter hundle name.";
                 # code...
                 break;
            case 'name':
            $alart_error="please,enter your name.";
                 # code...
                 break;
            case 'birthday':
            $alart_error="please,enter your birthday.";
                 # code...
                 break;
            case 'phone':
            $alart_error="please,enter your phone number.";
                 # code...
                 break;
            case 'address':
            $alart_error="please,enter your adress.";

                 # code...
                 break;
            case 'mail':
            $alart_error="please,enter your mail adress.";

                 # code...
                 break;

            case 'password':
            $alart_error="please,set passwprd.";
                 # code...
                 break;   


             default:
                 # code...
                 break;
         }
         $_SESSION["error"][$key]=$alart_error; 
        # code...
    }
}
if (!empty($_SESSION["error"])) {

    header("location:/registration/registration.php");
exit;
    # code...
}


$result = mysql_db_query( $my_db, 
"INSERT INTO user_tbl (cos_name, name, user_type, email, password, tel, birth_day)
VALUES ('$HN','$name','$sei','$email','$password','$phone','$birthday')"
	);
while ($result == null) {
     # code...
    echo "please,try again.";}
//mysql_close($connect);

?>


<?php 
/*
$my_folder = //ID名を指定

$connect = mysql_connect("localhost", $my_folder ,$my_folder);
mysql_query("SET NAMES utf8",$connect);

$filedir=";
var_dump ($_SERVER["DOCUMENT_ROOT"]);
//$filesdirで指定したファイルに画像を保存する。
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
    if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$filedir.$_FILES["upfile"]["name"])) {
        echo $_FILES["upfile"]["name"] . "をアップロードしました。";
        $save = "INSERT INTO user_tbl (profile_pic) VALUES ('".$filedir.$_FILES["upfile"]["name"]."')";
        mysql_db_query ($my_folder, $save);
    }
    else {
        echo "ファイルをアップロードできません。";
    }
}
else {
    echo "ファイルが選択されていません。";
}
mysql_close($connect);

*/



$result = mysql_db_query( $my_db, 
"SELECT * FROM user_tbl WHERE email = '$email' and password = '$password'");

$row = mysql_fetch_assoc($result);

$_SESSION["user_id"]=$row["user_id"];

header("location:/ptipa_mypage/mypage_sample.php");

var_dump($_SESSION);



 ?>