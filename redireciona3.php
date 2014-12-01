<?php
$var3 = $_GET['id'];
$db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$db ->query('DELETE FROM favoritos WHERE lid='.$var3);
header("Location: http://192.168.10.10/local.php?id=".$var3);
?>