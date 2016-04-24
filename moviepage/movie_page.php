<?php
session_start();

if (!isset($_SESSION["user_id"])){
    header ("location:/top/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ptipa Video Page</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


</head>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../ptipa_mypage/mypage_sample.php">PTIPA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../ptipa_mypage/mypage_sample.php">MY PAGE</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
<!-- 動画を引き出すためのphp-->
                 <?php

                        $my_folder="ptipa";
                        $my_db ="ptipa_db";
                        $my_pass="cosmo123";
                        $my_url="mysql527.db.sakura.ne.jp";
                        $connect = mysql_connect($my_url,$my_folder,$my_pass);
                        
                        $id=$_GET["id"];
                        mysql_query("SET NAMES utf8",$connect);
                        //オブジェクトが返ってくる


                        $result = mysql_db_query($my_db,
                        "SELECT * FROM pic_tbl WHERE pic_id='".$id."'"); 
                        $row=mysql_fetch_assoc($result);

                        {
?>

        <div class="header-content">
            <div class="header-content-inner">
                <?php 
                echo "<video src ='".$row["pic_path"]."' controls>";
                ?>
            </div>
        </div>
    </header>
<?php
mysql_close($connect); 
        }

?>

 <!-- 動画を引き出すためのphp-->

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">

    <aside class="bg-primary">
        <div class="container text-center">
        
        </div>

    </aside>



     <aside class="bg-dark">
        <div class="container text-center">
            <div id="contents_sample_wrap">
        <p class="text_box">Click MOE! to support them!!</p>
                <input type="button" name"moe" value="MOE!" class="btn btn-default btn-xl wow tada">
            </div>
                 <h2>Wanna Support them?<br>Send more "MOE!" for them!</h2>
                 <p>Purchase "MOE!" from your <a href="../ptipa_mypage/mypage_sample.php">User Page</a></p>


<?php 

$id=$_GET["id"];

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";


$connect = mysql_connect($my_url,$my_folder,$my_pass);
/* 現在のどうが　のクリック数の取得 start */

$sql="select moe from pic_tbl where pic_id='".$id."'";
$result= mysql_db_query ($my_db,$sql);
$result2= mysql_fetch_assoc($result);
/* 現在のどうが　のクリック数の取得 end */
/* 現在のユーザのクリック残り回数の取得 start */
$get_user_clickcount_sql="SELECT moe from user_tbl where user_id='".$_SESSION["user_id"]."'";
$get_user_id= mysql_fetch_assoc(mysql_db_query ($my_db,$get_user_clickcount_sql));
/* 現在のユーザのクリック残り回数の取得 end */
mysql_query("SET NAMES utf8",$connect);


{

?>

<script>
var click_count = 0; 
//▼▼ページ要素が操作可能になったときの処理
$(function(){
    //▼▼ボタンがクリックされたときの処理
    //▼▼inputタグのtype属性buttonにアクセスするセレクタ
    $(":button").click(function(){
            //▼▼"#contents_sample_wrap .text_box"タグに書き込む
            click_count++;
            $("#contents_sample_wrap .text_box").text( + click_count + " MOE!");

             $.ajax({
        　　　　　　　　type:"POST",
        　　　　　　　　url: "/moviepage/moe_ajax.php",
        　　　　　　　　data:{
                　　　　'pic_id':<?php echo $id; ?>,
                     'user_id':<?php echo $_SESSION["user_id"]; ?>
             　　　},
        　　　　　　　success:function(html){
                        var resultJson = JSON.parse(html);
                        resultJson["videoClick"];
                        resultJson["userClickCount"];
            　　　         $("#goodButton").text("This time's MOE! Count:" +  resultJson["videoClick"]);
                        $("#lastClickCount").text("Your Remaining MOE!: " + resultJson["userClickCount"]);


                },
             });
    });
});
</script>



Last Time's MOE! Count:<?php echo $result2["moe"];?><br>
MOE! Limit:<?php echo $get_user_id["moe"];?><br>
<span id="goodButton">This time's MOE! Count<br></span><br>
<span id="lastClickCount">MOE!s Left<br></span>

</div>
    </aside>

<?php

mysql_db_query($my_db, "UPDATE pic_tbl SET moe ='".$_GET["click_count"]."' WHERE pic_id = '".$id."'"
);

}

mysql_close($connect); 


?>


</body>

</html>