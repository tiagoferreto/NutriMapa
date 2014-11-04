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
		<?php
			$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
			$img = $db->query('SELECT * FROM img_icones') or die('Query db failed');
			$imgrow = $img->fetchArray();


			echo "<a href=\"index.php\"><img  style=\"margin-top:20px;margin-left:30px;widht:130px;height:130px\" src=\"icones/logo.png\"></a>";
			echo "<a href=\"sobre.html\"><img align=\"right\" style=\"margin-top:40px;margin-right:50px\" src=\"icones/sobre_escuro.png\"></a>";
			echo "<a href=\"favoritos.html\"><img align=\"right\" style=\"margin-top:37px;margin-right:40px\" src=\"icones/favoritos_escuro.png\"></a>";
			echo "<a href=\"locais.php\"><img align=\"right\" style=\"margin-top:34px;margin-right:40px\" src=\"icones/locais_claro.png\"></a>";
			echo "a href=\"receitas.php\"><img align=\"right\" style=\"margin-top:38px;margin-right:40px\" src=\"icones/receitas_escuro.png\"></a>";
			echo "<a href=\"mapas.html\"><img align=\"right\" style=\"margin-top:42px;margin-right:40px\" src=\"icones/mapa_escuro.png\"></a>";
		?>
	</header>
	<div class="local">
		<?php
		$id = $_GET["id"];
		$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		$statement = $db->prepare('SELECT * FROM locais WHERE id = :id;');
		$statement->bindValue(':id', $id);
		$result = $statement->execute();
		$row = $result->fetchArray();
		echo "<div id=\"imagem_local\">";
		echo "<h1 id=\"plocal\">{$row['nome']}</h1><br>";
		echo "<img src=\"imglojas/{$row['imagem']}\" width =\"300\" height=\"267\">";
		echo "</div>";
		echo "<div id=\"description\">";
		echo "<h2 id=\"textlocal\"> {$row['categoria']} </h2>";
		echo "<p id=\"intro\">“{$row['descricao']}”<br><br><br></p>";
		echo "<p id=\"address\">{$row['endereco']}</p>";
		echo "</div>";
		?>
	</div>

</body>
</html>