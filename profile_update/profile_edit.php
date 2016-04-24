<?php

session_start();
if (!isset($_SESSION["user_id"])){
    header ("/top/");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ptipa Profile Edit</title>
    <link rel="stylesheet" type="text/css" href="profile.css" media="all" />
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" media="all" />
　　<link rel="stylesheet" type="text/css" href="bootstrap.css" media="all" />
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
                <a class="navbar-brand" href="../ptipa_mypage/mypage_sample.php">PTIPA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="../ptipa_mypage/mypage_sample.php">MY PAGE</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div id="form">
    <p class="form-title">Profile Editing</p>
    <form action="profile_update.php" method="GET" enctype="multipart/form-data">
        <p>Cosplay Name</p>
        <p class="HN"><input type="HN" name="HN" /></p>
        <p>Favorites</p>
        <p class="name"><input type="text" name="favorites" /></p>
        <p>Profile</p>
        <p class="syoukai"><input type="text" name="user_detail" /></p>
        <p class="submit"><input type="submit" value="Save Profile" /></p>
    </form>
</div>
</body>
</html>