<?php

session_start();

require_once 'MakeShorter.php';

$s = new MakeShorter;

if(isset($_POST['url'])) {
	$url = $_POST['url'];

	if($code = $s->makeCode($url)) {
		$_SESSION['feedback'] = "Done! The short version of URL is: <a href=\"http://livenatal.com/URLShortener/redirect.php?code={$code}\">http://livenatal.com/URLShortener/{$code}</a>";

	}	else {
		$_SESSION['feedback'] = "WARNING, PROBLEM!";
	}

}

header('Location: index.php'); // Redirects to the index page
