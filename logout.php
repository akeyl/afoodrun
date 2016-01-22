<?php 
	$past = time() - 100;

	setcookie(iA, gone, $past);
	setcookie(uB, gone, $past);
	setcookie(tC, gone, $past);
	header("Location: index.php");
?>