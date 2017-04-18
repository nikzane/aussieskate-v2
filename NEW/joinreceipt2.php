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

<h1> Congratulations and welcome to Aussie Skate! </h1>
<br>
<p> Please find below your membership card.  Please print this card as you will need this to register for Aussie Skate classes.
</p>

<?php

include 'connectdb.php';

/* Save the paypal receipt into the Member record */
$badness = 0;
if ($_POST[paypal_ref] == "") {
	echo "ERROR: You must enter the Paypal Transaction ID. Please hit back button, correct and resubmit <BR>";
	$badness = 1; 
}
if ($_SESSION["member_nr"] == "") {
	echo "ERROR: Something went wrong.  Cookie not set.<BR>";
	$badness = 1; 
}

if ($badness == 1) {
	echo "\n<!--";
}
if ($badness == 0) {

	$stmt = $db->prepare ("UPDATE Members SET Paypal_Ref = :paypal_ref WHERE Member_Nr = :member_nr");
	$stmt->bindValue(':paypal_ref', $_POST[paypal_ref], PDO::PARAM_STR);
	$stmt->bindValue(':member_nr', $_SESSION["member_nr"]);
		
	$stmt->execute();

}

/* display the membership card */
$sql = "SELECT * FROM Members where Member_Nr = " . $_SESSION["member_nr"];

foreach ( $db->query($sql) as $row) {

	echo "<TABLE class=\"table\">\n";
	echo "<thead>\n";
	/* Print logo and Heading */
    echo "<tr>\n";
    echo "<th><img SRC=\"system/images/logo.png\" style=\"width:60px;\" ></th >
      <th style=\"color:black;\">Member " . $row['Member_Nr'] ."</th>\n";
    echo "</tr>\n";
  	echo "</thead>\n";
 	echo "<tbody>\n";
 	/* Print name */
    echo "<tr>\n";
    echo "<th style=\"color:black;\" scope=\"row\">Name</th>";
	echo "<td style=\"color:black;\">" . $row['First_Name'] . " " . $row['Family_Name'] . "</td>\n";
    echo "</tr>\n";
 	/* Print rink */
    echo "<tr>\n";
    echo "<th style=\"color:black;\" scope=\"row\">Rink</th>";
	echo "<td style=\"color:black;\">" . $row['Rink_ID'] . "</td>\n";
    echo "</tr>\n";
     /* Valid until */
    $t = strtotime ($row['Date_Joined']);
    $t = $t + 31536000;
    $renew = date ("j M Y", $t); 
    echo "<tr>\n";
    echo "<th style=\"color:black;\" scope=\"row\">Valid until</th>";
	echo "<td style=\"color:black;\">" . $renew . "</td>\n";
    echo "</tr>\n";

    
  	echo "</tbody>\n";
	
	echo "</table>\n";	 

}
?>

<p>You also have access to the exclusive members area of Aussie Skate via the members-only URL. Make sure you add this to your bookmarks.</p><p>

<?php

$baseurl = "http://aussieskate.spd13.com/"; /* need to update when deploying */

$url = "members.php?id=" . $_SESSION["member_nr"];

echo "<a style=\"color:blue;\" href=\"" . $url ."\">" . $baseurl . $url . "<a>";



if ($badness == 1) {
	echo "\n-->";
}

?>



</p>
</main>

<!-- Footer | START -->
<?php include 'web-foot.html'; ?>

</div>
	

<script src="system/js/plugins.js"></script>
<script src="system/js/global.js"></script>
</body>
</html>