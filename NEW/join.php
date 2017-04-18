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
    <main id="sign-up-form" class="global-width">
			<h1 style="display:block;text-align: center;">Join Aussie Skate</h1>
			<span style="display:block;text-align: center;"><strong>Become a member today for only <strong>$30</strong> per student! Renewal is <strong>$17</strong> per year.</span>
			<span style="display:block;text-align: center;"><strong>Aussie Skate</strong> is the nationally recognised <strong><em>Learn-to-Skate</em></strong> Program for all ages.</span>
			<br><br>
			
<?php include 'connectdb.php';?>

			
			<form name="classic" id="contact_form" action="join2.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<label for="first_name" class="label-width">First Name:</label>
					<input id="first_name" class="input" name="first_name" type="text" value="" size="30" placeholder="Skaters First Name" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row">
					<label for="family_name" class="label-width">Name:</label>
					<input id="family_name" class="input" name="family_name" type="text" value="" size="30" placeholder="Family Name" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
		
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="rink" class="label-width">Rink:</label>
					<select id="rink" name="rink">
						<option selected="" disabled="" onClick="alert(this.options[this.options.selectedIndex].value)">Select One</option>

<?php
/* Get a list of rinks */
$sql = "SELECT 	rink_name, rink_id, locale FROM Rinks ORDER BY State";
foreach ( $db->query($sql) as $row) {

    echo "<option value=\"" . $row['rink_id'] . "\">" . $row['rink_name'] . ", " . $row['locale'] . "</option>";
}
echo "</select><br/>";
?>

					</select>
				</div>				
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="gender" class="label-width">Gender:</label>
					<select id="gender" name="gender">
						<option selected="" disabled="">Select One</option>
						<option>Male</option>
						<option>Female</option>
					</select><br />
				</div>
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="dob2" class="label-width">Date of Birth:</label>
					<input id="dob2" class="input" name="dob" type="date" value="" size="30" placeholder="DD/MM/YYYY"   /><br />
				</div>
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="email" class="label-width">Contact Email:</label>
					<input id="email" class="input" name="email_guardian" type="text" value="" size="30" placeholder="Email" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="phone1" class="label-width">Contact Phone:</label>
					<input id="phone1" class="input" name="phone" type="text" value="" size="30" placeholder="Phone" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="skatersemail" class="label-width">Skaters Email:</label>
					<input id="skatersemail" class="input" name="email_skater" type="text" value="" size="30" placeholder="Email" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
			
				<br>
				<label for="submit_button" class="label-width"></label>
				<input id="submit_button" type="submit" value="Submit" />
			</form>
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