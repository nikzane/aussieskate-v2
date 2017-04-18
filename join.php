<!DOCTYPE HTML>
<!-- Base Hotel: HTML Template by Klaye Morrison (http://klayemorrison.com) -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aussie Skate - Join</title>
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
    <main id="sign-up-form" class="global-width">
			<h1 style="display:block;text-align: center;">Join Aussie Skate</h1>
			<span style="display:block;text-align: center;"><strong>Become a member today for only <strong>$30</strong> a year per student!</span>
			<span style="display:block;text-align: center;"><strong>Aussie Skate</strong> is a nationally recognised <strong><em>Learn-to-Skate</em></strong> Program for all ages.</span>
			<br><br>
			<form id="contact_form" action="/" method="POST" enctype="multipart/form-data">
				<div class="row">
					<label for="name" class="label-width">Name:</label>
					<input id="name" class="input" name="name" type="text" value="" size="30" placeholder="Skaters Name" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row">
					<label for="gender1" class="label-width">Gender:</label>
					<select id="gender1">
						<option selected="" disabled="">Select One</option>
						<option>Male</option>
						<option>Female</option>
					</select><br />
				</div>
				<div class="row">
					<label for="dob" class="label-width">Date of Birth:</label>
					<input id="dob" class="input" name="dob" type="date" value="" size="30" placeholder="Date of Birth" onClick="this.setSelectionRange(0, this.value.length)"  /><br />
				</div>
				<div class="row">
					<label for="email" class="label-width">Email:</label>
					<input id="email" class="input" name="email" type="text" value="" size="30" placeholder="Email" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row">
					<label for="phone1" class="label-width">Phone:</label>
					<input id="phone1" class="input" name="Skaters Phone" type="text" value="" size="30" placeholder="Phone" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>

				<div class="row">
					<label for="guardian" class="label-width">Parent/Guardian:</label>
					<input id="guardian" class="input" name="guardian" type="text" value="" size="30" placeholder="Parent/Guardian (if applicable)" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>

				<div class="row">					
					<span style="display: inline-block; width: 200px;"></span><label><input type="checkbox"> I agree to the <a href="terms.php" class="contact-link" target="_blank">Terms &amp; Conditions</a></label>
				</div>
				<br>
				<label for="submit_button" class="label-width"></label>
				<input id="submit_button" type="submit" value="Submit" />
			</form>
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