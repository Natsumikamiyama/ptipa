<?php
session_start();


if (isset($_SESSION["user_id"])){
    header ("location:/ptipa_mypage/mypage_sample.php");
var_dump($_SESSION["user_id"]);
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="login.css" media="all" />
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
                <a class="navbar-brand" href="../top/">PTIPA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="login.php">MY PAGE</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div id="form">
    <p class="form-title">Login</p>
    <form action="loginmypage.php" method="GET">
        <p>E-mail address</p>
        <p class="mail"><input type="mail" name="email" /></p>
        <p>Password</p>
        <p class="password"><input type="password" name="password" /></p>
        
        <p class="submit"><input type="submit" value="Log In" /></p>
    </form>
</div>
</body>
</html>



