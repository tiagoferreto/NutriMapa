<?php
	$var1 = $_GET['id'];
	$var2 = $_GET['uid'];
	$db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
	$db ->query('INSERT INTO favoritos(uid, lid) VALUES('.$var2.', '.$var1.')');
	header("Location: http://192.168.10.10/local2.php?id=".$var1);
?>