<?php
    session_start();
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
                <a class="navbar-brand page-scroll" href="#page-top">PTIPA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li>
                        <a href="#">MAKE ACCOUNT</a>
                    </li>
                    <li>
                        <a href="#">MY PAGE</a>
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

                        mysql_query("SET NAMES utf8",$connect);
                        //オブジェクトが返ってくる
                        $result = mysql_db_query($my_db,
                        "SELECT * FROM pic_tbl WHERE pic_id=11" ); 
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
var_dump($row);
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
            <div class="call-to-action">
                 <h2>Wanna Make them Famous?<br>Push more "MOE!" for them!</h2>
                 <p>ワンクリックで投稿者に申請が送れます。</p>
                 <p>投稿者は申請の状況をマイページで確認出来ます。</p>
                <a href="#" class="btn btn-default btn-xl wow tada">COMUNE!</a>
            </div>
        </div>
    </aside>

</body>

</html>