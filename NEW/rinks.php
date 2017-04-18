<!DOCTYPE HTML>
<!-- Base Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) -->
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
			<h1 style="display:block;text-align: center;">Find an Aussie Skate Rink</h1>
			
<?php include 'connectdb.php';?>
<?php

/* Display rinks by state */


$q1 = "SELECT DISTINCT State FROM Rinks ORDER BY State";
foreach ($db->query($q1) as $row) {

    echo "<p>" . $row['State'] . "</p><hr>\n";

  	$q2 = "SELECT * FROM Rinks WHERE State = '" . $row['State'] . "'";
    foreach ($db->query($q2) as $row2) { 
			echo "<h2><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> " . $row2['Rink_Name'] . "</h2>";
			echo "<p><a href=\"" . $row2['WebsiteURL'] . "\" title=\"Click to find out more\" target=\"_blank\" class=\"contact-link\"><img src=\"" . $row2['Logo'] . "\" alt=\"[Logo]\" height=\"64\"></a></p>";
			echo "<p>Address: <a href=\"" . $row2['GoogleURL'] . "\" title=\"Get Directions\" target=\"_blank\" class=\"contact-link\">" . $row2['Street'] . "," . $row2['Locale'] . "</a></p>";
			echo "<p>Phone: <a href=\"tel://" . $row2['Phone'] . "\" title=\"Phone Us\" class=\"contact-link\">" . $row2['Phone'] . "</a></p>";
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