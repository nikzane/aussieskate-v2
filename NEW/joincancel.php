<?php
session_start();
?>
<!-- joincancel.php - Receives redirect from Paypal via cancel -->

<!DOCTYPE HTML>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0">
<title>Aussie Skate - Payment Cancelled</title>
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

<h1> Transaction Cancelled </h1>
<br>
<p> You are here because the Paypal process was cancelled.  There are two other ways you can pay to join Aussie Skate.  You can pay via Cash at the rink or you can contact Ice Skating Australia via email.
If for any reason you have problems with payment please contact  <A href="mailto:administration@isa.org.au" style="color:black;">administration@isa.org.au</a>.
Please include the Membership Number in your email and when making a Cash payment.</p>
	

</p>

<?php

include 'connectdb.php';

$sql = "SELECT * FROM Members where Member_Nr = " . $_SESSION["member_nr"];

foreach ( $db->query($sql) as $row) {

	echo "<TABLE class=\"table\">\n";
	echo "<thead>\n";
	/* Print logo and Heading */
    echo "<tr>\n";
    echo "<th><img SRC=\"system/images/logo.png\" style=\"width:60px;\" ></th >
      <th style=\"color:black;\">Member " . $row['Member_Nr'] ." (Pending)</th>\n";
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
    echo "<tr>\n";
    echo "<th style=\"color:black;\" scope=\"row\">Valid until</th>";
	echo "<td style=\"color:black;\"> NOT PAID </td>\n";
    echo "</tr>\n";

    
  	echo "</tbody>\n";
	
	echo "</table>\n";	 

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