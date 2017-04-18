<?php
session_start();
?>
<!-- join2.php - recieves join form data, saved in the in database and redirects to paypal -->

<!-- Use session variable to store member ID -->


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0">
<title>Aussie Skate - Join</title>
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
<?php

$badness = 0;
if ($_POST[first_name] == "") {
	echo "ERROR: First name is required. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_POST[family_name] == "") {
	echo "ERROR: Family name is required. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_POST[rink] == "Select One") {
	echo "ERROR: Rink is required. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_POST[gender] == "Select One") {
	echo "ERROR: Gender is required. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}		
if ($_POST[dob] == "DD/MM/YYYY") {
	echo "ERROR: DOB is required. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_POST[email_guardian] == "") {
	echo "ERROR: A emails is required to send you a receipt. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_POST[email_skater] == "") {
	echo "Skater email not set " . $_POST[email_skater] . " <BR>";
	$badness = 1; 
}
if ($_POST[phone] == "") {
	echo "ERROR: A Phone number is required for safety. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
echo "</div>";
echo "<div class=\"row\">";
	
if ($badness == 0) {

	include 'connectdb.php';

	$stmt = $db->prepare("INSERT INTO `Members`(`First_Name`, `Family_Name`, `Rink_ID`, `Gender`, `DOB`, `email_Guardian`, `email_Member`, `Phone`) VALUES (:first_name, :family_name, :rink, :gender, STR_TO_DATE(:dob, '%Y-%m-%d'), :email_guardian, :email_skater, :phone)");
	$stmt->bindValue(':first_name', $_POST[first_name], PDO::PARAM_STR);
	$stmt->bindValue(':family_name', $_POST[family_name], PDO::PARAM_STR);
	$stmt->bindValue(':rink', $_POST[rink], PDO::PARAM_STR);	
	$stmt->bindValue(':gender', $_POST[gender], PDO::PARAM_STR);		
	$stmt->bindValue(':dob', $_POST[dob], PDO::PARAM_STR);	  
	$stmt->bindValue(':email_guardian', $_POST[email_guardian], PDO::PARAM_STR);	
	$stmt->bindValue(':email_skater', $_POST[email_skater], PDO::PARAM_STR);	
	$stmt->bindValue(':phone', $_POST[phone], PDO::PARAM_STR);	
	
	
	$stmt->execute();

	$member_nr = $db->lastInsertId();
	
	echo "<p>" . $_POST[first_name] . "'s membership number is " . $member_nr . ".  Please take note of this number for future reference.</p>";

	// Set session variables
	$_SESSION["member_nr"] = $member_nr;

	echo "<p>The next step is to process the payment for " . $_POST[first_name] . "'s membership.</p><p>Click on the Paypal button below and you will be taken to the secure Payment page.  After you have paid you will be returned to this site.</p>";

	echo "<p>If for any reason you have problems with payment please contact  <A href=\"mailto:administration@isa.org.au\" style=\"color:black;\">administration@isa.org.au</a>.</p>";
	
	
}	
else {
	echo "\n<!--";
}
	
?>
</div>
<div class="row">
<div class="col-md-1">

<!-- This is the paypal button - it needs to be updated during deployment to have correct amount and URLS.  Also make sure to set style="width:150px;" 
in the <input type-"image" tag  
 -->
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2WXHZZMPXC6J2">
<input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_buynowCC_LG.gif" style="width:150px;" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>

</div>
</div>

<?php
if ($badness != 0) {

	echo "\n-->";
}
?>
<br>
</main>

<!-- Footer | START -->
<?php include 'web-foot.html'; ?>

</div>
	

<script src="system/js/plugins.js"></script>
<script src="system/js/global.js"></script>
</body>
</html>