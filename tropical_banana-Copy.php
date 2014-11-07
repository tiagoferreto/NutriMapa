<?php
$nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = 2');
$row = ($selectQuery -> fetchArray());
$cookieValor = $row ['nome'];
$cookieId = "cookieNome";
$cookieTempo = time() + (3600 * 24);
setcookie($cookieId, $cookieValor, $cookieTempo, "/");
$cookieValor2 = $row ['user_name'];
$cookieId2 = "cookieUsuario";
setcookie($cookieId2, $cookieValor2, $cookieTempo, "/");
$cookieValor3 = $row ['senha'];
$cookieId3 = "cookieSenha";
setcookie($cookieId3, $cookieValor3, $cookieTempo, "/");
?>
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
	<div class="local">

		<div id="imagem_local">
			<h1 id="plocal"> Tropical Banana </h1><br>
			<img src="imglojas/tropicalbanana.jpg" width ="300" height="267">
		</div>

		<div id="description">
			<h2 id="textlocal"> Sobre </h2>
			<p id="intro">
				“Com a proposta de trazer inovação no preparo de sucos e sanduíches naturais, utilizando equipamentos de ponta em um ambiente temático e agradável, a Tropical Banana obteve imediata aprovação do público, o que se mostrou significativo para o sucesso do negócio.
				<?php
				echo $_COOKIE[$cookieId];
				?>

			Em 2007, a rede já contava com três unidades na capital paranaense. Sempre em shoppings locais, com a notoriedade de sua marca consolidada no mercado, a Tropical Banana duplicou seu número de operações em 2008.
			No ano seguinte, em 2009, a Tropical Banana abriu a sua primeira loja fora de Curitiba. O estado escolhido foi o Rio Grande do Sul, que atualmente conta com três franquias.
			<br><br></p>
			

			<p id="address">Av. Cristóvão Colombo, 545-Floresta;<br>Av. Diário de Notícias, 300 - Cristal;<br>Av. Assis Brasil, 2611 -Cristo Redentor<br>Diariamente, das 11:00h às 22:00h;<br>Tel: (41) 8479-2379<br>Mais informações:
			<a href="http://www.tropicalbanana.com.br/"> Tropical Banana<br></p>
		</div>	
	</div>
</body>
</html>