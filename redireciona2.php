<?php
$uid = $_GET['uid'];
$var = $_GET['id'];
$com = "'".$_GET['com']."'";
$date=date_create(NULL, timezone_open("America/Sao_Paulo"));
$dateP = "'".date_format($date,"d/m/Y H:i")."'";
echo $dateP;
$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
$db -> query('INSERT INTO comentarios (uid, lid, coment, datahora) VALUES ('.$uid.','.$var.','.$com.','.$dateP.')');
header ('Location: http://192.168.10.10/local.php?id='.$var);
?>