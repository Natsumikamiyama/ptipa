<?php
session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Ptipa Video</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/creative.css">


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.html">PTIPA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="login.html">MY PAGE</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
</nav>
        <!-- /.container -->

<div class="thumbnail col-lg-4">
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
        echo "<p name='picid'>PicID:".$row["pic_id"]."</p>";
        echo "<video class='fit' src ='".$row["pic_path"]."' controls></video>";
        echo "<br>";
        echo "<a class='normal' href='movie_page.php?id=".$row["pic_id"]."'>Video Page</a>";

        ?>

        <form action="../pic/pic_delete.php" method="GET">
        <input type="hidden" name="pic_id" value= '<?php echo $row["pic_id"]; ?>' >
        <input type="submit" value="Delete">
        </form>

        <hr>

        <?php
         //1行表示したら改行を入れる。
            //""で囲んだところで一区切り。変数と文字列は切り分けないとエラーになる//
    }
}


mysql_close($connect); 

?>
</div>
</body>
</html>

