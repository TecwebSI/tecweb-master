<?php 
	session_start();
	$s = isSet($_POST["login"]) && $_POST["login"] != "" ? $_POST["login"] : "BLANK";
	$_SESSION["login"] = $_SESSION["nome"] = $s;
	header("Location: index.php");
?>
