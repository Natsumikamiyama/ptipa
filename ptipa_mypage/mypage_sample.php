<?php
session_start();

if (!isset($_SESSION["user_id"])){
    header ("location:/top/");
}
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ptipa User Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<?php

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8",$connect);
//オブジェクトが返ってくる
$result = mysql_db_query($my_db,
"SELECT * FROM user_tbl WHERE user_id='".$_SESSION["user_id"]."'");


 //→ここは$_SESSIONでユーザーIDを引っ張ってくる。

//オブジェクトからデータを引っ張ってくるセレクトでとってきた一番最初が返ってくる/whileで値がなくなるまで回す
while ($row = mysql_fetch_assoc($result)) {
    $a[]=$row;

}
//記事の取得
$user_id=$_SESSION["user_id"];
$contents_sql="select subject,contents_id from contents_tbl WHERE user_id = $user_id";
$contents_query=mysql_db_query($my_db,$contents_sql);




foreach ($a as $key => $value){
?>


</head>

<body>

    <!-- Navigation -->
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
                <b><a class="navbar-brand" href="mypage_sample.php">Ptipa</a></b>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                            <form action="../loginform/logout.php" method="GET">
                            <button type="submit" class="icon-bar btn btn-primary">Logout</button>
                    </form></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header" img src="<?php echo $value["cover_pic"];?>" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline"><?php echo $value["cos_name"]; ?></h1>
                        <img class="img-circle img-responsive img-center pull-left" src=" <?php echo $value["profile_pic"]; ?>" >
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- /.row -->

        <hr>

            <!--ここがタブ-->
            <ul style='list-style-type:none;' class="tab">
                <li><a href="#tab1"><img src="img/font/1.png"></a></li>
                <li><a href="#tab4"><img src="img/font/2.png"></a></li>
                <li><a href="#tab3"><img src="img/font/3.png"></a></li>
                <li><a href="#tab5"><img src="img/font/4.png"></a></li>
            </ul>
            <div class="content">
                <div class="area" id="tab1"> 
                MY PROFILE
                 <form action="submit" href="profile.html" value="Edit"></form>
                    <p> <?php echo $value["user_detail"]; ?> </p>
                    <p><br></p>
                    <p>My Favorites</p>
                    <p><?php echo $value["favorites"]; ?></p>
                    <p><br></p>
                    <?php echo "You have:".$value["moe"]."'MOE!' left."; ?>
                    <br>
                    <a href="../profile_update/profile_edit.php"><input type="submit" value="Edit Profile"></a>
                </div>

                <div class="area" id="tab4">
<!--動画投稿フォーム-->
                Video Upload
                <form action="../pic/pic_post2.php" method="post" name="FormName" enctype="multipart/form-data">
                <input type="file" name="upfile" value="Search" class="example">
                <input type="submit" name="submit" value="Upload">
                </form>
<!--動画投稿フォーム-->

<hr>

<!--動画検索フォーム-->

<form method="POST" action="search_keywards.php" class="search">

<div>
<input type="text" name="example" class="textBox">
<input type="submit" value="検索" class="btn">
</div> 
</form>

<!--動画検索フォーム-->

<!--ここから動画一覧。ユーザーIDに紐づいて表示させたい-->
<div class="thumbnail">
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
        echo "<video src ='".$row["pic_path"]."' controls></video>";
        echo "<br>";
        echo "<a href='../moviepage/movie_page.php?id=".$row["pic_id"]."'>Video Page</a>";

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

}
mysql_close($connect); 


?>
</div>

<!--ここまで動画一覧。ユーザーIDに紐づいて表示させたい-->
<!--ここからイベント一覧。ユーザーIDに紐づいて表示させたい-->

                </div>

                <div class="area" id="tab3">
                <?php 
                while ($contents_result= mysql_fetch_assoc($contents_query)) {


                ?>

                <a href='http://ptipa.sakura.ne.jp/kizi/post.php?id=<?php echo $contents_result["contents_id"];?>'>
                    <?php echo $contents_result["subject"];?>

                </a><br>
                <?php }?>

                </div>

                <div class="area" id="tab5">
<div id="form">
    <p class="form-title">Payment </p>
     <form action="/payment/payform/buy_admin.php" method="post"> 

    <p>How many "MOE！"s do you want?</p>
        <select type="num" name="term">
        <option value="100">100 MOE！ = €2.99</option>
        <option value="300">300 MOE！ = €8.99</option>
        <option value="500">500 MOE！ = €13.99</option>
        <option value="1000">1000 MOE！ = €24.99</option>
        <option value="1200">1200 MOE！ = €35.99</option>
        
        </select>
        <p>Pay with Credit Card</p>
        <input type="num" name="card_number">
        <input type="submit" value="Check-out">
    </form>
        <p>Pay with Paypal</p>
    
        <input type="submit" value="Move to Paypal Page">
        
</div>
                </div>
 <!--ここまでイベント一覧。ユーザーIDに紐づいて表示させたい-->

        <!-- /.row -->

        <hr>

        <!-- Footer -->

    </div>
   
    <!-- /.container -->



    <!-- jQuery -->
<script type="text/javascript">
$(document).ready(function() {
        $('.area:first').show();
    $('.tab li:first').addClass('active');

    $('.tab li').click(function() {
        $('.tab li').removeClass('active');
        $(this).addClass('active');
        $('.area').hide();

        $($(this).find('a').attr('href')).fadeIn();
        return false;
    });
});
</script>

    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
