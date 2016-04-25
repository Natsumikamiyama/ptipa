<!DOCTYPE html>
<?php
session_start();
var_dump($_SESSION["error"]);
?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ptipa Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration.css" media="all" />
    <link rel="stylesheet" type="text/css" href="bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" media="all" />
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
                <a class="navbar-brand" href="/top/">PTIPA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="/ptipa_mypage/mypage_sample.php">MY PAGE</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div id="form">
    <?php foreach ($_SESSION["error"] as $key => $value){ ?>
    <div style= "color:red">
    <?php echo $value;
    ?> 
    </div>
    <?php }
    unset($_SESSION["error"]);
    ?>
    <p class="form-title">New User Registration</p>
    <form action="register.php" method="GET" enctype="multipart/form-data">
        <p>Handle-name</p>
        <p class="HN"><input type="HN" name="HN" /></p>
        <p>Real Name</p>
        <p class="name"><input type="name" name="name" /></p>
        <p>Birthday</p>
        <input type="date" name="birthday">
        <p></p>

        <p>Telephone</p>
        <p class="phone"><input type="num" name="phone" /></p>
        <p>Address</p>
        <p class="adress"><input type="text" name="address" /></p>
        <p>Email</p>
        <p class="mail"><input type="text" name="mail" /></p>
        <p>Password</p>
        <p class="password"><input type="password" name="password" /></p>
            <input id="sei_1" name="sei" type="radio" value="1"><label for="sei_1">Cosplayer</label>&nbsp;<input id="sei_0" name="sei" type="radio" value="0"><label for="sei_0">User</label>
        <p class="submit"><input type="submit" value="Register" /></p>
    </form>
</div>
</body>
</html>