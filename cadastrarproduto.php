<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Produtos</title>
<style>
<!--
.textBox { border:1px solid gray; width:200px;} 
-->
</style>
</head>
<body>
<h2>Cadastro de Produtos </h2>
<form id="form1" name="form1" method="post" action="salvar.php">
<table width="400" border="0">
<tr>
<td width="145">Nome do produto:</td>
<td width="245"><input name="nome" type="text" id="nome" maxlength="45" class="textBox" /></td>
</tr>
<tr>
<td>Descricão:</td>
<td><input name="descricao" type="text" id="descricao" maxlength="64" class="textBox" /></td>
</tr>
<tr>
<td>Potência:</td>
<td><input name="potencia" type="text" id="potencia" maxlength="64" class="textBox" /></td>
</tr>
<tr>
<td>Potência Standby:</td>
<td><input name="potenciastandby" type="text" id="potenciastandby" maxlength="64" class="textBox" /></td>
</tr>
<td><input type="submit" name="Submit" value="Salvar" style="cursor:pointer;" /></td>
    </tr>
  </table>
</form>
</body>
</html>


