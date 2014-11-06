<?php
$ver = $_GET['username'];
echo 'REDIRECIONANDO';
echo nl2br("\n");
echo nl2br("\n");
$nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios');
$row = ($selectQuery -> fetchArray());
$valor = $row ['id'];
if($ver == $row['user_name']){
	$value = $valor;
}
$time = time() + 3600;
setcookie('usuarioCadastro', $value, $time);
//echo $_COOKIE['usuarioCadastro'];
?>