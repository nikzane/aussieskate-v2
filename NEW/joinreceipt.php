<?php
session_start();
?>
<!-- joinreceipt.php - Receives redirect from Paypal if payment made -->

<!DOCTYPE HTML>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0">
<title>Aussie Skate - Receipt</title>
<link rel="stylesheet" href="system/css/global.css">
<link class="colour" rel="stylesheet" href="system/css/colour-blue.css">
<link class="pattern" rel="stylesheet" href="system/css/pattern-china.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body class="home3 fullwidth">
<!-- Navigation | START -->

<?php include 'web-head.html'; ?>
<!-- Navigation | END-->

<div id="container">
   <!-- Content | START -->
<main id="sign-up-form" class="global-width">

<div class="row">

<h1> Thank you for your payment. </h1>
<br>
<p> Please locate your Paypal receipt in your email.  Record the transaction Id in the field below.
</p>
<img src="system/images/paypal_receipt.png" alt="Paypal email image" style="width:900px;">

<form name="classic" id="contact_form" action="joinreceipt2.php" method="POST" enctype="multipart/form-data">
	<div class="row">
		<label for="paypal_ref" class="label-width">Paypal Transaction ID:</label>
		<input id="paypal_ref" class="input" name="paypal_ref" type="text" value="" size="30" placeholder="txn id" onClick="this.setSelectionRange(0, this.value.length)" /><br />
	</div>
	<br>
	<label for="submit_button" class="label-width"></label>
	<input id="submit_button" type="submit" value="Submit" />
</form>

</p>
</main>

<!-- Footer | START -->
<?php include 'web-foot.html'; ?>

</div>
	

<script src="system/js/plugins.js"></script>
<script src="system/js/global.js"></script>
</body>
</html>