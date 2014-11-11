<DOCTYPE! hmtl>
<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<script type="text/javascript">
$(':radio').change(
  function(){
    $('.choice').text( this.value + ' Pimentas' );
  } 
)
</script>
<title>
		NutriMapa
	</title>
</head>
<body>
<script type="text/javascript">
$(':radio').change(
  function(){
    $('.choice').text( this.value + ' Pimentas' );
  } 
)
</script>
	<header>
		<a href="mapas.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
		<a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
		<a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_claro.png"></a>
		<a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
		<a href="mapas.php"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_escuro.png"></a>
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
<div id="body">
<span class="star-rating">
  <input type="radio" name="rating1" value="1" id="rating"><i id="item2"></i>
  <input type="radio" name="rating2" value="2" id="rating"><i id="item2"></i>
  <input type="radio" name="rating3" value="3" id="rating"><i id="item2"></i>
  <input type="radio" name="rating4" value="4" id="rating"><i id="item2"></i>
  <input type="radio" name="rating5" value="5" id="rating"><i id="item2"></i>
</span>
</div>


</body>
</html>