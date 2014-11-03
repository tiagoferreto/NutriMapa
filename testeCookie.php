<DOCTYPE! hmtl>

<?php
$nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = 1');
$row = ($selectQuery -> fetchArray());
$cookieValor = $row ['nome'];
$cookieId = "cookieUsuario";
$cookieTempo = time() + (3600 * 24);
setcookie($cookieId, $cookieValor, $cookieTempo, "/");
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
		<a href="index.html"><img  style="margin-top:20px;margin-left:30px" src="icones/claros/Logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/claros/Sobre.png"></a>
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/claros/Favoritos.png"></a>
		<a href="locais.html"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/escuros/Locais2.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/claros/Mapa.png"></a>
		<a href="receitas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/claros/Receitas.png"></a>
	</header>
	<div>
		<p style = "margin-top: 300px;">
			<?php
			if(count($_COOKIE) > 0) {
  				  echo "Cookies are enabled";
			} else {
   				  echo "Cookies are disabled";
			}
			
			echo $_COOKIE[$cookieId];
			?>
		</p>

	</div>

</body>
</html>
