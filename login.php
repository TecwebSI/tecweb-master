<?php
if(!isSet($_SESSION["login"]) || $_SESSION["login"] == "" || $_SESSION["login"] == NULL){//pessoa não está logada
	if($login_required > 0){
		header("Location: index.php");
	}
}
else { //pessoa está logada
	if($login_required == -1){
		header("Location: index.php");
	}
}
?>

  <div id="lftcol">
    <div class="leftcolbox">
      <div class="leftcolboxtop"></div>
	  
      <?php
		 if(isSet($_SESSION["login"]) && $_SESSION["login"] != "" && $_SESSION["login"] != NULL) {
	  ?>
	
      <h2>Bem vindo(a) <?php echo $_SESSION["nome"]; ?></h2>
      <p><a href="logout.php">Sair<a/></p>
	
      <?php
         }
         else { 
	  ?>
	  
	  <form action="logon.php" method="post">
		<p><strong>Login: </strong><input name="login" type="text" /></p>
		<p><strong>Senha: </strong><input name="password" type="password" /></p>
		<p><input class="btn" type="submit"/></p>
	  </form>
	  <br /><br />
      <?php
		 }
	  ?>
	
    </div>
  </div>