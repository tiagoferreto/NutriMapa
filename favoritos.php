<DOCTYPE! hmtl>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<link href="default.css" rel="stylesheet" type="text/css" media="all">
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<title>
		NutriMapa
	</title>
</head>

<body>
	<header>
		<a href="mapas.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
		<a href="favoritos.php"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_claro.png"></a>
		<a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_escuro.png"></a>
		<a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_escuro.png"></a>
	</header>
	<h1 style = "font-size: 48px; position: relative;">Favoritos</h1>
	<?php
		$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		$id = $_COOKIE['cookieNome'];
		$pos1=true;
		$pos2=false;
		$favoritos = $db ->query('SELECT * FROM favoritos WHERE uid ='.$id);
		
		while ($row = $favoritos->fetchArray()) {
			if($pos1)
			{
				$pos="top1";
				$pos1=!($pos1);
				$pos2=!($pos2);
			}
			elseif ($pos2) {
				$pos="left1";
				$pos2=!($pos2);
			}
			else{
				$pos="left2";
				$pos1=!($pos1);
			}
			$loja2=$row['lid'];
			
			$loja = $db ->query('SELECT * FROM locais WHERE id ='.$loja2);
			$row2= $loja->fetchArray();
			echo "<div class= \"{$pos}\">\n";
			echo "<div class =\"locais\">\n";
			echo "<a href=\"local.php?id={$row2['id']}\"><img src=\"imglojas/{$row2['imagem']}\" width=\"148\" height=\"156\"></a>\n";
			echo "<p class = \"nome_local\">{$row2['nome']}</p>\n";
				
			echo "</div>\n";
			echo "</div>\n";
			
			
			}
		
	?>

	<div id="cookieUsuarioFavoritos">
  <p id = "cookieTextoFavoritos">Olá <?php
        $veri = $_COOKIE['cookieNome'];
        $nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
        $selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = '.$veri);
        $row = ($selectQuery -> fetchArray());
        echo $row['nome'];
     ?>
     ! <div id= 'sairFavoritos'><a href ="http://192.168.10.10/index2.php">(Sair)</a></div>
   </p>
 </div>

	
</body>
</html>