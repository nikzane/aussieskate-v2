<?php
session_start();
?>
<!DOCTYPE HTML>
<!-- Members Page -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aussie Skate - Home</title>
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
			<h1 style="display:block;text-align: center;">Members Area</h1>

<?php
include 'connectdb.php';
$member_nr = $_GET["id"];
$badness = 0;
if ($member_nr == ""){
	
	/* set session state is not done so */
	if ($_SESSION["member_nr"] != "")	
		$member_nr = $_SESSION["member_nr"];
	else
		$badness = 1;
}	

if ($badness == 0) {
	$stmt = $db->prepare("SELECT * FROM Members WHERE Member_Nr = :id ");
	$stmt->bindValue(':id', $member_nr, PDO::PARAM_INT);
	$stmt->execute();
	if ($stmt->rowCount() == 0 ) {
		$badness = 1;
	}
}

if ($badness == 0) {

	$sql = "SELECT * FROM Members where Member_Nr = " . $member_nr;

	foreach ( $db->query($sql) as $row) {

		echo "<h3>Welcome " .  $row['First_Name'] . "</h3>";
	
		/* If  */
	    $t = strtotime ($row['Date_Last_Renewed']);
	    $t = $t + 31536000;    
		if ( $t < time() ) {
			echo "<p>Your Aussie Skate membership expired on " . $renew . ". You need to renew to keep taking classes.</p>";
		}


	
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
	    $t = strtotime ($row['Date_Last_Renewed']);
	    $t = $t + 31536000;
	    $renew = date ("j M Y", $t); 
	    echo "<tr>\n";
	    echo "<th style=\"color:black;\" scope=\"row\">Valid until</th>";
		echo "<td style=\"color:black;\">" . $renew . "</td>\n";
	    echo "</tr>\n";

    
	  	echo "</tbody>\n";
	
		echo "</table>\n";	 


	}
}
?>




	
			
    </main>    <!-- Content | END -->
    <!-- Content | END -->
    <!-- Sitewide Extras | START -->
<!--
    <div id="extras">
    	<div class="centre">
-->
            <!-- List Items (Specials Slider) | START -->
<!--
            <div id="specials" class="list">
                <div class="back">
                    <div class="slider">
                    	<div class="item">
                        	<img alt="" src="http://dummyimage.com/1200x400" width="1200" height="400" />
                            <div class="details">
                                <a href="specials.html">
                                    <div class="title">Family Escape<br />
                                    <span>Activity Package</span></div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna.<br />
                                    <strong>Stay from $249 per night</strong></p>
                                    <div class="button"><span data-hover="View Special">View Special</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav"></div>
            </div>
-->
            <!-- List Items (Specials Slider) | END -->
        	<!-- Recent Blog Posts | START -->
<!--
            <div class="recent">
                <a href="blog-post.html">
                	<div class="date">
                    	<span class="month">Dec</span>
                        <span class="day">12</span>
                    </div>
                    <p class="title">Our Latest Hotel Awards</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque...</p>
                </a>
                <a href="blog-post.html">
                	<div class="date">
                    	<span class="month">Nov</span>
                        <span class="day">27</span>
                    </div>
                    <p class="title">Free Wi-Fi in all rooms</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque...</p>
                </a>
            </div>
-->
            <!-- Recent Blog Posts | END -->
        	<!-- Footer Testimonial | START -->
<!--
            <div class="footertestimonial">
            	<i class="fa fa-quote-left"></i>
                <p class="title">Comfortable & spacious apartment</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet...</p>
                <div class="author">&ndash; <strong>John Smith</strong> <span>(Sydney, Australia)</span></div>
                <a href="guest-book.html" class="button"><span data-hover="Read Guest Book">Read Guest Book</span></a>
            </div>
-->
            <!-- Footer Testimonial | END -->
<!--
        </div>
    </div>
-->
    <!-- Sitewide Extras | END -->
    <!-- Footer | START -->

    <?php include 'web-foot.html'; ?>

    <!-- Footer | END -->
</div>
<script src="system/js/plugins.js"></script>
<script src="system/js/global.js"></script>
</body>
</html>