
<!--フォーム用
<form action="delete_event.php" method="GET">


                                                    <input type="submit" value="参加解除">
                                                    </form>
-->

<?php 
session_start();

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";
session_start();

$connect = mysql_connect($my_url,$my_folder,$my_pass);

mysql_query("SET NAMES utf8",$connect);

//user_idをログインした状態から取り込みたい。セッション？

                        $result = mysql_db_query($my_folder,
                        "SELECT * FROM attend_tbl" );


//データベースに対してSQLを実行する	
mysql_db_query($my_db, "DELETE FROM attend_tbl WHERE user_id=".$_SESSION["user_id"]);

mysql_close($connect); 
?>
