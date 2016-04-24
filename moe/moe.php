<!DOCTYPE html>
<meta charset="utf8">
<html>
<head>
	<title>moe button</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>

<div id="contents_sample_wrap">
	<ul>
		<li class="text_box">ボタンを押すとテキストが変わります</li>
	</ul>
	<input type="button" name="moe" value="萌！" /><!--クリックしたときにtext()を実行-->
</div>

<script src="../js/jquery-1.8.2.js"></script>

<?php 
$my_folder="ptipa";
$my_db ="ptipa_db";
$my_pass="cosmo123";
$my_url="mysql527.db.sakura.ne.jp";

$connect = mysql_connect($my_url,$my_folder,$my_pass);
/* 現在のどうが　のクリック数の取得 start */
$sql="select moe from pic_tbl where pic_id=9";
$result= mysql_db_query ($my_db,$sql);
$result2= mysql_fetch_assoc($result);
/* 現在のどうが　のクリック数の取得 end */
/* 現在のユーザのクリック残り回数の取得 start */
$get_user_clickcount_sql="select moe from user_tbl where user_id=36";
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
			$("#contents_sample_wrap .text_box").text("ボタンが" + click_count + "回クリックされました");

			 $.ajax({
        　　　　　　　　type:"POST",
        　　　　　　　　url: "/moe/moe_ajax.php",
        　　　　　　　　data:{
                　　　　'pic_id':9,
                     'user_id':1
             　　　},
        　　　　　　　success:function(html){
                        var resultJson = JSON.parse(html);
                        resultJson["videoClick"];
                        resultJson["userClickCount"];
            　　　     	$("#goodButton").text("いいね通算回数　ボタンが" +  resultJson["videoClick"] + "回クリックされました");
                        $("#lastClickCount").text("いいね残り回数　ボタンが" + resultJson["userClickCount"] + "回クリックされました");


                },
             });
	});
});
</script>

初回:<?php echo $result2["moe"];?><br>
初回クリック上限数:<?php echo $get_user_id["moe"];?><br>
ボタンクリック<br>
<span id="goodButton">いいね通算回数<br></span><br>
<span id="lastClickCount">いいね残り回数<br></span>
<?php

mysql_db_query($my_db, "UPDATE pic_tbl SET moe =".$_GET["click_count"]. "WHERE pic_id = 1"
);

}

mysql_close($connect); 


?>

</body>
</html>