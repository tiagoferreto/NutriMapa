<?php
$teste2 = $_GET["username"];
echo 'REDIRECIONANDO';
$nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE user_name == username');
$row = ($selectQuery -> fetchArray());
	$id = $row['id'];
	$time = time() + (3600 * 24);
	setcookie('Usuario', $id, $time);		
?>