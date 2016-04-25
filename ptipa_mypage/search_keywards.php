<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ptipa User Page</title>





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect=mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8", $connect);


$search_keywords=$_POST["example"];

$search_detail="select moe,pic_detail,pic_date,pic_path,pic_id from pic_tbl where keywords
like '%".$search_keywords."%' ";
$dbQuery = mysql_db_query($my_db, $search_detail);

while($search_result=mysql_fetch_assoc($dbQuery)){
	
echo "<a href='../moviepage/movie_page.php?id=".$search_result["pic_id"]."'>".$search_result["pic_detail"]."</a><br>";

} 


?>  



</body>
</html>