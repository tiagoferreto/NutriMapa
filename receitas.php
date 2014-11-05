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
		<a href="index.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
		<a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_escuro.png"></a>
		<a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_claro.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_escuro.png"></a>
	</header>
	<!-- seção para ser gerada de forma dinâmica -->

	<div id= "caixa">
		<div class = "tipo_receita">
			<?php
				$top = TRUE;
				$pos = "top";
				$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
			
				$result = $db->query('SELECT * FROM receitas;') or die('Query db failed');
				$restaurante = $db->query('SELECT * FROM locais WHERE rest = 1') or die('Query db failed');

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
	</div>
</body>
</html>
