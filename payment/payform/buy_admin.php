<?php
$want_buy_moe=$_POST["term"];
//グローバルへんすう。：$_はもともと設定されている変数。
$customer_card=$_POST["card_number"];
if ($want_buy_moe==100){$cost="2.99";

	}else if ($want_buy_moe == 300) {$cost="8.99";
		# code...
	}elseif ($want_buy_moe == 500) {$cost="13.99";
		# code...
	}elseif ($want_buy_moe ==1000) {$cost="29.99";
		# code...
	}elseif ($want_buy_moe ==1200) {$cost="35.99";
		# code...
	}

?>

<html>
<head>
	<title>Check-Out</title>
	<meta charset="utf-8">
</head>
<body>

	<div>
	Purchased amount:<?php echo $want_buy_moe; ?>moe
</div>

<div>
	Amount:€<?php echo $cost; ?>
</div>

<form method="post" action="http://ptipa.sakura.ne.jp/payment/payment.php">

	<input type="hidden"name="term" value="<?php echo $want_buy_moe; ?>">

	<input type="hidden"name="card_number" value="<?php echo $customer_card; ?>">
	<input type= "submit" value="Purchase">



</form>

<?php
echo $want_buy_moe;
echo $customer_card;


?>


</body>
</html>