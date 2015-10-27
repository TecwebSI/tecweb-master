<?php 
	session_start();
	$_SESSION["login"] = $_SESSION["nome"] = NULL;
	session_destroy();
	header("Location: index.php");
?>
