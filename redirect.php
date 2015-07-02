<?php 

//======================================================================
// Redirect the URL that is passed trough
//======================================================================

require_once 'MakeShorter.php';

if(isset($_GET['code'])) {
	$s = new MakeShorter;
	$code = $_GET['code'];

	if($url = $s->getUrl($code)) {
		header("Location: {$url}");
		die();

	}
}

header('Location: index.php');