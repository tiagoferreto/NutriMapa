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
			echo "<a href=\"locais.php\"><img align=\"right\" style=\"margin-top:34px;margin-right:40px\" src=\"icones/locais_escuro.png\"></a>";
			echo "a href=\"receitas.php\"><img align=\"right\" style=\"margin-top:38px;margin-right:40px\" src=\"icones/receitas_claro.png\"></a>";
			echo "<a href=\"mapas.html\"><img align=\"right\" style=\"margin-top:42px;margin-right:40px\" src=\"icones/mapa_escuro.png\"></a>";
		?>
	</header>

	<div class="rece_esque">
		<?php
		$id = $_GET["id"];
		$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		$statement = $db->prepare('SELECT * FROM receitas WHERE id = :id;');
		$statement->bindValue(':id', $id);
		$result = $statement->execute();
		$row = $result->fetchArray();
		

		//DIV IMAGEM DA RECEITA
		echo "<div id=\"rece_img\">";
		echo "<img src=\"imgreceitas/{$row['imagem']}\" width =\"300\" height=\"267\">";
		echo "</div>";
		
		//DIV TABELA DA RECEITA
		echo "<div id=\"rece_tab\">";
		echo "<p> Tabela Nutricional </p>";
		echo "<img src=\"imgreceitas/{$row['tabela']}\" width =\"345\" height=\"460\">";
		echo "</div>";

		//DIV INFORMAÇÕES DA RECEITA
		echo "<div id=\"rece_info\">";
		echo "<h1>{$row['nome']}</h1></br>";
		echo "<p id=\"ing\">{$row['ingredientes']}</p></br>";
		echo "<p id=\"ing\">{$row['modo_fazer']}</p></br>";
		echo "<h2> Origem: </h2></br>";
		echo "<p id=\"origem\">";
		echo "<a href=\"{$row['origem_url']}\">{$row['nome_origem']}</a>";
		echo "</p>";
		echo "</div>";
		?>
	</div>

</body>
</html>