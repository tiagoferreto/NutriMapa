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
		<a href="index.html"><img  style="margin-top:20px;margin-left:30px" src="icones/claros/Logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/claros/Sobre.png"></a>
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/claros/Favoritos.png"></a>
		<a href="locais.html"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/escuros/Locais2.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/claros/Mapa.png"></a>
		<a href="receitas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/claros/Receitas.png"></a>
	</header>
	<!-- seção para ser gerada de forma dinâmica -->

	<div id= "caixa_lojas">
		<h3> Lojas</h3>
	<div class ="divs">
		<?php echo "Teste"
$db = new SQLite3('nutrimapa.sqlite') or echo 'Unable to open database';
?>
		<?php
			$top = TRUE;
			$pos = "top";
			$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
	
			$result = $db->query('SELECT * FROM locais;') or die('Query db failed');
			while ($row = $result->fetchArray())
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
				//echo "<a href=\"{$row['pagina']}\"><img src=\"icones/locais/{$row['icone']}\" width =\"148\" height=\"156\"></a>";
				//echo "<p class = \"local\">{$row['nome']}</p>";				
				$top = !($top);
			}
		?>
	</div>	
</body>
</html>
