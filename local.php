<DOCTYPE! hmtl>
<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

	<title>
		NutriMapa
	</title>
	<?php 	$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');?>
</head>
<body>
	<script type="text/javascript">
$(':radio').onClick(
  function(){
    $('.choice').text( this.value + ' Pimentas' );
  } 
)
</script>
<?php 
if(isset($_POST['estrela_x']))
{
	$id = $_GET["id"];
	$veri=$_COOKIE['cookieNome'];
	$statement2 = $db->prepare('SELECT * FROM favoritos WHERE uid = :usuid and lid='.$id);
	$statement2->bindValue(':usuid', $veri);
	$result2 = $statement2->execute();
	$row=$result2->fetchArray();
	if($row['uid']!=null)
	{
		$db ->query('DELETE FROM favoritos WHERE uid='.$veri.' and lid='.$id);
	}
	else
	{
		$db->exec('INSERT INTO favoritos(uid, lid) VALUES ('.$veri.','.$id.')');
	}
}
?>




	<header>
		<a href="mapas.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
		<a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
		<a href="favoritos.php"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
		<a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_claro.png"></a>
		<a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
		<a href="mapas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_escuro.png"></a>
	</header>
	<div class="local">
		<?php
		$id = $_GET["id"];
		$db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
		$statement = $db->prepare('SELECT * FROM locais WHERE id = :id;');
		$endereco = $db ->query('SELECT * FROM enderecos WHERE lid ='.$id);
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
		while ($row2= $endereco->fetchArray()) {
			echo "<p id=\"address\">{$row2['endereco']} -</p>";
			echo "<p id=\"address2\">{$row2['horario']}<br><br></p>";
		}
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

	<form action="local.php?id=<?= $id;?>" method="post" />
		<div id="estre_fav">
		<?php
			$id = $_GET["id"];
			$veri=$_COOKIE['cookieNome'];
			$statement2 = $db->prepare('SELECT * FROM favoritos WHERE uid = :usuid and lid='.$id);
			$statement2->bindValue(':usuid', $veri);
			$result2 = $statement2->execute();
			$row4=$result2->fetchArray();
			if($row4['uid']!=null){
		?>
	<input type="image" style="width:100px;" name="estrela" src="icones/estrela_claro.png">
	<?php }; if($row4['uid']==null){
	?>
	<input type="image" style="width:100px;" name="estrela" src="icones/estrela_branca.png">
	<?php }; ?>
	</div>	
	</form>

<div id="cookieUsuarioLocal">
  	<p id = "cookieTextoLocal">Olá, <?php
        $veri = $_COOKIE['cookieNome'];
        $nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
        $selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = '.$veri);
        $row = ($selectQuery -> fetchArray());
        echo $row['nome'];
     ?>
     ! <div id= 'sairLocal'><a href ="http://192.168.10.10/index2.php">(Sair)</a></div>
   </p>
</div>



	<div class = "com">
		<div class="comentario">
			Comentários
		</div>
		
		<div class="caixacomment"> 
			<textarea style="margin-bottom: 0px; resize:none; margin-right: 150px; font-size: 15px; font-family: 'Abel', sans-serif;" cols="100" rows="10" placeholder="Deixe aqui seu comentário!"></textarea>
		</div>
	
		<div class="enviar" style = "width: 0; height: 0; padding: 0px 50px 0 0px;"  > 
			<input type="submit" class="button_entrar" style = "margin-left: 882px; margin-top: 160px;" value="Post"></br>
			<!--<input type="submit" value="Enviar" style="width:60px; height:30px;">-->
		</div>
	</div>
</body>
</html>