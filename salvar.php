<?php
$dbhost = '172.22.4.232';
$dbusername = 'p804863';
$dbuserpassword = 'p804863';
$default_dbname = 'tecweb_tp';
$MYSQL_ERRNO = '';
$MYSQL_ERROR = '';
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$potencia = $_POST["potencia"];
$potenciastandby = $_POST["potenciastandby"];


function db_connect($dbname) {
	global $dbhost, $dbusername, $dbuserpassword, $default_dbname;
	global $MYSQL_ERRNO, $MYSQL_ERROR;

	$link_id = mysql_connect($dbhost, $dbusername, $dbuserpassword);
	if(!$link_id) die("Conexão falhou ao host $dbhost base $default_dbname.<br>");
	elseif(empty($dbname)) {
		if (!mysql_select_db($default_dbname,$link_id)) die(sql_error($link_id));
	}
	elseif(!mysql_select_db($dbname,$link_id)) die(sql_error($link_id));
	return $link_id;
}

function sql_error($link_id) {
	$message = mysql_errno($link_id).": ".mysql_error($link_id);
	mysql_query("ROLLBACK");
	return $message;
}



$sql  = "INSERT INTO produto (nome,descricao,potencia,potenciastandby) values ('$nome','$descricao','$potencia','$potenciastandby') ";



echo "<br> sql=$sql";
echo "<br>";
echo "<br>";
echo "<br>";
$linkId = db_connect($default_dbname);
$get = mysql_query($sql,$linkId) or die($sql." erro ".sql_error($linkId));

/*while($dados = mysql_fetch_assoc($get) )
{
	echo"<br> dados= ";
	print_r($dados);
	
}
*/



echo "$nome','$descricao','$potencia','$potenciastandby'";

/* include 'conexao.php';
include 'mysql.php';

$banco = db_connect();



//$query = " INSERT INTO produto (nome,descricao,potencia,potenciastandby) values ($nome,$descricao,$potencia,$potenciastandby)";


$result = mysql_query($query,$banco);

echo "<br>$query"; */
echo "<a href=\"index.php\">Voltar</a>";	

?>