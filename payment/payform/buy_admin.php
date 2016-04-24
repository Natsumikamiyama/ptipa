<?php
$want_buy_moe=$_POST["term"];
//グローバルへんすう。：$_はもともと設定されている変数。
$customer_card=$_POST["card_number"]

?>

<html>
<head>
	<title>購入確認画面</title>
	<meta charset="utf-8">
</head>
<body>

<form method="post" action="http://ptipa.sakura.ne.jp/payment/payment.php">

	<input type="hidden"name="term" value="<?php echo $want_buy_moe; ?>">

	<input type="hidden"name="card_number" value="<?php echo $customer_card; ?>">
	<input type= "submit" value="送信">

</form>

<?php
echo $want_buy_moe;
echo $customer_card;

?>



</body>
</html>