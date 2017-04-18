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
			<h1 style="display:block;text-align: center;">Rink Administrator Login</h1>
			
<?php include 'connectdb.php';?>


			<form name="classic" id="contact_form" action="admin_menu.php" method="POST" enctype="multipart/form-data">
		
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="rink" class="label-width">Rink:</label>
					<select id="rink" name="rink">
						<option selected="" disabled="" onClick="alert(this.options[this.options.selectedIndex].value)">Select One</option>

<?php


$sql = "SELECT 	rink_name, rink_id, locale FROM Rinks ORDER BY State";
foreach ( $db->query($sql) as $row) {

    echo "<option value=\"" . $row['rink_id'] . "\">" . $row['rink_name'] . ", " . $row['locale'] . "</option>";
}
echo "</select><br/>";
?>

					</select>
				</div>				

				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="email" class="label-width">Rink Email:</label>
					<input id="email" class="input" name="admin_email" type="text" value="" size="30" placeholder="Email" onClick="this.setSelectionRange(0, this.value.length)" /><br />
				</div>
				<div class="row" onClick="this.setSelectionRange(0, this.value.length)">
					<label for="password" class="label-width">Password:</label>
					<input id="password" class="input" name="password" type="password" value="" size="30" placeholder="Password" onClick="this.setSelectionRange(0, this.value.length)" /><br />
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