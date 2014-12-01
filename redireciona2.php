<?php
$uid = $_GET['uid'];
$var = $_GET['id'];
$com = "'".($_GET['com'])."'";


$date=date_create(NULL, timezone_open("America/Sao_Paulo"));
$dateP = "'".date_format($date,"d/m/Y H:i")."'";
echo $dateP;
$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
$tcomentarios2 = $db ->query('SELECT * FROM comentarios WHERE lid ='.$var);

$x=0;
while($row10 = $tcomentarios2 -> fetchArray())
{
	$x=$x+1;
}

$x=$x+1;

$db -> query('INSERT INTO comentarios (uid, lid, coment, datahora, numerocom) VALUES ('.$uid.','.$var.','.nl2br($com).','.$dateP.','.$x.')');
header ('Location: http://192.168.10.10/local.php?id='.$var);
?>