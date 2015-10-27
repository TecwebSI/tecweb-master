<?php 
	$title = "Perfil de Consumo";
	include "header.php";
	
	$login_required = 1;
	include "login.php";
?>
  
  
  <div id="maincol">
 
	<input class="btm" type="button" value="Criar novo Perfil" />
    <div class="rule">
      <h1>Perfil de Consumo 1</h1>
    </div>
	
	<ul class="produtos rig columns-3 no-margin">

<?php for($i = 0; $i < 5; $i++) { ?>
		<li>
			<img src="images/produtos/1.jpg" />
			<h3>Liquidificador</h3>
			Liquidificador x 2<br />
			<a href="#">Editar</a> | <a href="#">Excluir</a>
		</li>
<?php } ?>
	</ul>
	
	
	<br/><br/><br/>
	
  </div>


<?php include "footer.php"; ?>
 
  
