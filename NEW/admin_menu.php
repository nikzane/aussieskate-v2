<?php
session_start();
?>
<!DOCTYPE HTML>
<!-- Base Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aussie Skate - Admin Login</title>
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
			<h1 style="display:block;text-align: center;">Rink Administrator Menu</h1>
			


<?php
include 'connectdb.php';

if ($_POST["admin_email"] != "") { 
	$_SESSION["admin_email"] = $_POST["admin_email"];
	}
if ($_POST["rink"] != "") {
	$_SESSION["rink"] = $_POST["rink"];	
	}
if ($_POST["password"] != "") {
	$_SESSION["password"] = $_POST["password"];
	}
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
	
<div class="container">
         
  <table class="table" style="color:black;">
    <thead>
      <tr>
        <th>Function</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
       <tr>
        <td>TRANSACTIONS</td>
        <td></td>
      </tr>
      <tr>
        <td><a href="admin_join.php">Join Skater</a></td>
        <td>Manually enter a skater who joined at the rink and made a cash payment.</td>
      </tr>
       <tr>
        <td>REPORTS</td>
        <td></td>
      </tr>
      <tr>
        <td><a href="admin_listskaters.php">List Skaters</a></td>
        <td>List stakers in a rink by Family Name, First Name</td>
      </tr>
      <tr>
        <td><a href="admin_listskater_csv.php">List Skaters (CSV)</a></td>
        <td>List stakers in a rink by Family Name, First Name (CSV format)</td>
      </tr>
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