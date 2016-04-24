<?php

$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);
mysql_query("SET NAMES utf8",$connect);
//オブジェクトが返ってくる
$result = mysql_db_query($my_db,
"SELECT * FROM event_tbl" ); 
//オブジェクトからデータを引っ張ってくるセレクトでとってきた一番最初が返ってくる/whileで値がなくなるまで回す
while ($row = mysql_fetch_assoc($result)) {
	$a[]=$row;
}


//とってきた$rowをforeachで成形する？

 //foreach ($a as $key => $value) {
	// $product[]=$value["event_name"];
 //}

 //var_dump($a);
//exit;

// foreach ($a as $key => $value) {

// 	var_dump($value);
// 	echo "<h1>商品名は".$value["product_name"]."です。</h1>\n";
// 	echo "<h1>金額は".$value["price"]."です。</h1>\n";
// }

// var_dump($product[1]);

// 

foreach ($a as $key => $value){

    ?>
	<div class="row">
        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h3 class="pull-right"><a href="#"><?php echo $value["event_name"] ?></a></h3>
                                <h4><?php echo $value["event_detail"] ?></h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <form action="delete_event.php" method="GET">
                            <input type="submit" value="削除">
                            </form>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>


<?php } ?>
   