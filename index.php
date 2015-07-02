<?php

session_start();

//======================================================================
// URL-Shortener
//======================================================================

//-----------------------------------------------------
// Main file of a front-end
// Do you like the simplicity, like I do? 
// By Lukas Navickas
//-----------------------------------------------------

?>

<html> 
<head> 
	<meta charset='utf-8'>
	<title>URL-Shortener</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
	<div class="container">
		<h1 class="title">Shorten your URL with us</h1>

		<?php
		if(isset($_SESSION['feedback'])) {
			echo "<p>{$_SESSION['feedback']}</p>";
			
			unset($_SESSION['feedback']); // Unset, because user should not see the same feedback every time
		}
		?>

		<p></p>

		<form action="pending.php" method="post">
			<input type="url" name="url" placeholder="Enter your URL right here!">
			<input type="submit" value="Shorten">
		</form>
	</div>
</body>
</html>