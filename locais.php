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
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
		<a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_claro.png"></a>
		<a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
		<a href="mapas.php"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_escuro.png"></a>
	</header>
	<!-- seção para ser gerada de forma dinâmica -->


	<div id= "caixa_lojas">
		<h3> Lojas</h3>
		<?php
			$top = TRUE;
			$pos = "top";
			$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		
			$result = $db->query('SELECT * FROM locais;') or die('Query db failed');
			$loja = $db->query('SELECT * FROM locais WHERE loja = 1') or die('Query db failed2');
			$restaurante = $db->query('SELECT * FROM locais WHERE rest = 1') or die('Query db failed2');

			while ($row = $loja->fetchArray())
			{	
				if($top) {
					$pos = "top";
				}else {
					$pos = "left";
				}
					
				echo "<div class= \"{$pos}\">\n";
				echo "<div class =\"locais\">\n";
				echo "<a href=\"local.php?id={$row['id']}\"><img src=\"imglojas/{$row['imagem']}\" width=\"148\" height=\"156\"></a>\n";
				echo "<p class = \"nome_local\">{$row['nome']}</p>\n";
				
				echo "</div>\n";
				echo "</div>\n";				
				$top = !($top);
			}
		?>
	</div>
	<div id= "caixa_restaurantes">
		<h3> Restaurantes </h3>
		<?php
			$top = TRUE;
			$pos = "top";
			$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		
			$result = $db->query('SELECT * FROM locais;') or die('Query db failed');
			$loja = $db->query('SELECT * FROM locais WHERE loja = 1') or die('Query db failed2');
			$restaurante = $db->query('SELECT * FROM locais WHERE rest = 1') or die('Query db failed2');
			while ($row = $restaurante->fetchArray())
			{	
				if($top) {
					$pos = "top";
				}else {
					$pos = "left";
				}
					
				echo "<div class= \"{$pos}\">\n";
				echo "<div class =\"locais\">\n";
				echo "<a href=\"local.php?id={$row['id']}\"><img src=\"imglojas/{$row['imagem']}\" width=\"148\" height=\"156\"></a>\n";
				echo "<p class = \"nome_local\">{$row['nome']}</p>\n";
				
				echo "</div>\n";
				echo "</div>\n";				
				$top = !($top);
			}
		?>	
	</div>


	<div id="cookieUsuarioLocais">
  <p id = "cookieTextoLocais">Olá <?php
        $veri = $_COOKIE['cookieNome'];
        $nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
        $selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = '.$veri);
        $row = ($selectQuery -> fetchArray());
        echo $row['nome'];
     ?>
     ! <div id= 'sairLocais'><a href ="http://192.168.10.10/index2.php">(Sair)</a></div>
   </p>
 </div>


</body>
</html>
