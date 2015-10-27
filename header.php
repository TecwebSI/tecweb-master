<?php 
   session_start();
   $login_required = 0;
?>
<!--xml version="1.0" encoding="UTF-8"!-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title." - Energy Economy"; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="container">
  <div id="navarea">
    <ul id="nav">
	  <li><a href="index.php" title="inicio">Inicio</a></li>
      <li><a href="produtos.php" title="produtos">Produtos</a></li>
	  <?php
		 if(isSet($_SESSION["login"]) && $_SESSION["login"] != "" && $_SESSION["login"] != NULL) {
	  ?>
      <li><a href="perfil.php" title="perfil">Meus Perfis</a></li>
      <li><a href="contas.php" title="contas">Contas</a></li>
      <li><a href="relatorios.php" title="relatorios">Relat√≥rios</a></li>
	 <?php } else { ?>
	  <li><a href="registrar.php" title="registrar">Registrar</a></li>
	 <?php } ?>
    </ul>
  </div>
  <div id="hdr"> <span id="sitetitle">Energy Economy Æ</span> <br />
    <span id="subtitle">Economize energia!</span></div>