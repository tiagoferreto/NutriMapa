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
	<div class ="divs">

		<?php echo "Teste"?>
		<?php
			$db = new SQLite3('nutrimapa.sqlite') or echo 'Unable to open database';
	
			$result = $db->query('SELECT * FROM locais;') or die('Query db failed');
			while ($row = $result->fetchArray())
			{
				echo "<a href=\"{$row['pagina']}\"><img src=\"icones/locais/{$row['icone']}\" width =\"148\" height=\"156\"></a>";
				echo "<p class = \"local\">{$row['nome']}</p>";				
			}
		?>



		<div class="caixa_lojas">
			<div class=""></div>

		</div>
<!--
		TODO: Criar uma classe para div de locais genérica! Não pode ser um para cada local!
		
		<div id="grao_natural">
		<a href="locais-grao.html"><img src="icones/locais/grao_natural.png" width ="148" height="156"></a>
		<p class = "local">GRÃO NATURAL</p>
		</div>
		<div id="mundo_verde">
		<img src="icones/locais/mundo_verde.png" width ="148" height="156">
		<p class = "local">MUNDO VERDE</p>
		</div>
		<div id="reino_saudavel">
		<img src="icones/locais/reino_saudavel.png" width ="148" height="156">
		<p class = "local">REINO SAÙDAVEL</p>
		</div>
-->		
	</div>
</body>
</html>
