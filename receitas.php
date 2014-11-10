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
			<p>Diet</p>
			<?php

				$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
				$diet = $db->query('SELECT * FROM receitas WHERE diet = 1') or die('Query failed2');
				
				//VARIÁVEIS DE CONTROLE DA POSIÇÃO DAS DIVS
				$qtd = 0;
				$ml = 0;
				$mt = 0;



				while ($row = $diet->fetchArray())
				{
					switch ($qtd) {
						case '0':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt; margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						
						case '1':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '2':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '3':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = 0;
							$ml = 0;
							$mt = $mt + 220;
						break;
						
						default:
							# code...
						break;
					}
				}
			?>
		</div>
		<div class = "tipo_receita">
			<p>Light</p>
			<?php

				$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
				$light = $db->query('SELECT * FROM receitas WHERE light = 1') or die('Query failed2');
				
				//VARIÁVEIS DE CONTROLE DA POSIÇÃO DAS DIVS
				$qtd = 0;
				$ml = 0;
				$mt = 0;



				while ($row = $light->fetchArray())
				{
					switch ($qtd) {
						case '0':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt; margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						
						case '1':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '2':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '3':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = 0;
							$ml = 0;
							$mt = $mt + 220;
							break;
						
						default:
							# code...
							break;
					}
				}
			?>
		</div>
		<div class = "tipo_receita">
			<p>Sem Glúten</p>
			<?php

				$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
				$ngluten = $db->query('SELECT * FROM receitas WHERE n_gluten = 1') or die('Query failed2');				
				//VARIÁVEIS DE CONTROLE DA POSIÇÃO DAS DIVS
				$qtd = 0;
				$ml = 0;
				$mt = 0;



				while ($row = $ngluten->fetchArray())
				{
					switch ($qtd) {
						case '0':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt; margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
							break;
						
						case '1':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '2':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '3':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = 0;
							$ml = 0;
							$mt = $mt + 220;
						break;
						
						default:
							# code...
							break;
					}
				}
			?>
		</div>
		<div class = "tipo_receita">
			<p>Sem Lactose</p>
			<?php

				$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
				$nlactose = $db->query('SELECT * FROM receitas WHERE n_lactose = 1') or die('Query failed2');
				
				//VARIÁVEIS DE CONTROLE DA POSIÇÃO DAS DIVS
				$qtd = 0;
				$ml = 0;
				$mt = 0;



				while ($row = $nlactose->fetchArray())
				{
					switch ($qtd) {
						case '0':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt; margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						
						case '1':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '2':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = $qtd+1;
							$ml = $ml + 370;
						break;
						case '3':
							echo "<a href=\"receita.php?id={$row['id']}\" >";
							echo "<div class=\"receita\" style= \"margin-top: $mt;margin-left: $ml;\">";
							echo "<img src=\"imgreceitas/{$row['imagem']}\" width=\"250\" height=\"150\">";
							echo "<p> {$row['nome']}";
							echo "</div>";
							echo "</a>\n";
							$qtd = 0;
							$ml = 0;
							$mt = $mt + 220;
							break;
						
						default:
							# code...
						break;
					}
				}
			?>
		</div>
	</div>
</body>
</html>
