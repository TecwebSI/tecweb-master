<?php 
	$title = "Registrar";
	include "header.php";
	
	$login_required = -1;
	include "login.php";
?>
  
  
  <div id="maincol">
  
    <div class="rule">
      <h1>Registrar</h1>
    </div>
	<form class="registrar">
		<p><strong>Nome</strong><input type="text" /></p>
		<p><strong>CPF</strong><input type="text" /></p>
		<p><strong>Email</strong><input type="text" /></p>
		<p><strong>Senha</strong><input type="password" /></p>
		<p><strong>Confirme Senha</strong><input type="password" /></p>
		<p><strong>Endereço</strong><input type="text" /></p>
		<p><strong>Data de nascimento</strong><input type="text" /></p>
		<p><input class="btn" type="submit"/> </p>
	</form>
  </div>


<?php include "footer.php"; ?>
 
  
