<DOCTYPE! hmtl>

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
		<a href="mapas.html"><img  style="margin-top:20px;margin-left:30px" src="icones/claros/Logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/claros/Sobre.png"></a>
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/claros/Favoritos.png"></a>
		<a href="locais.html"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/claros/Locais.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/claros/Mapa.png"></a>
		<a href="receitas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/claros/Receitas.png"></a>
	</header>
	<div>
		<p style = "margin-top: 300px;">
			<?php
			echo $_COOKIE[$cookieId];
			echo nl2br("\n");
			echo $_COOKIE[$cookieId2];
			echo nl2br("\n");
			echo $_COOKIE[$cookieId3];
			echo nl2br("\n");
			?>
		</p>

	</div>

</body>
</html>
