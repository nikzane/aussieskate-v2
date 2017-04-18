<?php
session_start();
?>
<!DOCTYPE HTML>
<!-- Base Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aussie Skate - List Skaters</title>
<link rel="stylesheet" href="system/css/global.css">
<link class="colour" rel="stylesheet" href="system/css/colour-blue.css">
<link class="pattern" rel="stylesheet" href="system/css/pattern-china.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body class="home3 fullwidth">
<!-- Navigation | START -->

<?php include 'web-head.html'; ?>

<!-- Navigation | END -->
<div id="container">
	<!-- Header | START -->
	<header>
    	<!-- Featured Slider | START -->
<!--
        <div id="featured">
        	<div class="slider">
            	<div class="item">
                    <div class="details">
                        <div class="title"><span>Fun, Friendly, Healthy</span></div>
                        <div class="buttoncontainer"><a href="join.php" class="button"><span data-hover="&nbsp;&nbsp;&nbsp;Join Now">&nbsp;&nbsp;&nbsp;Join Now&nbsp;&nbsp;&nbsp;</span></a></div>
                    </div>
                    <img alt="" src="system/images/homepage-bg.jpg" width="1800" height="800" style="background-attachment: fixed;" />
                </div>
            </div>
        </div>
-->
        <!-- Featured Slider | END -->
    </header>
    <!-- Header | END -->
    <!-- Content | START -->
    <main id="" class="global-width">
	<h1 style="display:block;text-align: center;">
	<?php echo "List of Skaters for " . $_SESSION["rink"] ."</h`>"; ?>
			


<?php
include 'connectdb.php';

$badness = 0;
if ($_SESSION["admin_email"] == "" || $_SESSION["rink"] == "" || $_SESSION["password"] == "") {
	echo "<BR><p>ERROR: You are not logged in.  Please click <A href=\"admin_login.php\" style=\"color:blue;\">here</a> to login.</p>";
	$badness = 1;
} else
{

	$stmt = $db->prepare("SELECT * FROM Rinks WHERE Rink_ID = :rink  AND POC_email = :admin_email AND POC_password = :password");
	$stmt->bindValue(':rink', $_SESSION["rink"], PDO::PARAM_STR);
	$stmt->bindValue(':admin_email', $_SESSION["admin_email"], PDO::PARAM_STR);
	$stmt->bindValue(':password', $_SESSION["password"], PDO::PARAM_STR);
	$stmt->execute();
	if ($stmt->rowCount() == 0 ){
		echo "<h3>Invalid Email or Account for rink.</h3>";
		echo "<BR><p>Please click <A href=\"admin_login.php\" style=\"color:blue;\">here</a> to login.</p>";
		$badness = 1;
	}	
}

if ($badness == 1) {
	echo "\n<!--";
	}
	

		
?>
	
<div class="container"; align-content: left;>
         
  <table class="table" style="color:black; align-content: left;">
    <thead>
      <tr>
      <th style=\"font-size: 50%;\">Family Name</th>
      <th style=\"font-size: 50%;\">First Name</th>
      <th style=\"font-size: 50%;\">Member Nr</th>
      <th style=\"font-size: 50%;\">Last Renewed</th> 
      <th style=\"font-size: 50%;\">Gender</th>
      <th style=\"font-size: 50%;\">DOB</th>
      <th style=\"font-size: 50%;\">Pay Ref</th> 
      <th style=\"font-size: 50%;\">email</th> 
      <th style=\"font-size: 50%;\">Phone</th>
      </tr>
    </thead>
    <tbody>

<?php
if ($badness == 0) {

	include 'connectdb.php';

	$sql = "SELECT * FROM Members where Rink_ID = '" . $_SESSION["rink"] . "' ORDER BY Family_Name, First_Name";

	foreach ( $db->query($sql) as $row) {
	
      	echo "<tr>\n";
        echo "<td style=\"font-size: 50%;\">" . $row['Family_Name']. "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['First_Name'] . "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['Member_Nr'] .  "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['Date_Last_Renewed'] . "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['Gender'] . "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['DOB'] .  "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['Paypal_Ref'] . "</td> ";
        echo "<td style=\"font-size: 50%;\">Guardian:" . $row['email_Guardian'] . " Skater:" . $row['email_Member'] . "</td> ";
        echo "<td style=\"font-size: 50%;\">" . $row['Phone'] . "</td> ";
        echo "</tr>\n";
    }
}      

?>
    </tbody>
  </table>
</div>

<?php

if ($badness == 1) {
	echo "\n-->";
	}
?>


			
    </main>    <!-- Content | END -->

    <!-- Content | END -->




    <!-- Footer | START -->

    <?php include 'web-foot.html'; ?>

    <!-- Footer | END -->
</div>
<script src="system/js/plugins.js"></script>
<script src="system/js/global.js"></script>
</body>
</html>