<!DOCTYPE HTML>
<!-- Base Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aussie Skate - Rinks</title>
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
	<header></header>
    <!-- Header | END -->
    <!-- Content | START -->
    <main id="" class="global-width">
			<h1 style="display:block;text-align: center;">Find an Aussie Skate Rink</h1>
			
<?php include 'connectdb.php';?>
<?php

/* Display rinks by state */


$q1 = "SELECT DISTINCT State FROM Rinks ORDER BY State";
foreach ($db->query($q1) as $row) {

    echo "<h1 class='rink-section'>" . $row['State'] . "</h1>";

  	$q2 = "SELECT * FROM Rinks WHERE State = '" . $row['State'] . "'";
    foreach ($db->query($q2) as $row2) { 
			echo "<span class='rink-location'><h1><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> " . $row2['Rink_Name'] . "</h1>";
			echo "<p><a href=\"" . $row2['WebsiteURL'] . "\" title=\"Click to find out more\" target=\"_blank\" class=\"contact-link\"><img src=\"" . $row2['Logo'] . "\" alt=\"[Logo]\" height=\"64\"></a></p>";
			echo "<p>Address: <a href=\"" . $row2['GoogleURL'] . "\" title=\"Get Directions\" target=\"_blank\" class=\"contact-link\">" . $row2['Street'] . ", " . $row2['Locale'] . "</a></p>";
			echo "<p>Phone: <a href=\"tel://" . $row2['Phone'] . "\" title=\"Phone Us\" class=\"contact-link\">" . $row2['Phone'] . "</a></p></span>";
			}			
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