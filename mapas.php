<DOCTYPE! hmtl>

<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<?php $db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database'); ?>
<?php
function remover($str){
  $remover = array("à" => "a","á" => "a","ã" => "a","â" => "a","é" => "e","ê" => "e","ì" => "i","í" => "i","ó" => "o","õ" => "o","ô" => "o","ú" => "u","ü" => "u","ç" => "c","À" => "A","Á" => "A","Ã" => "A","Â" => "A","É" => "E","Ê" => "E","Í" => "I","Ó" => "O","Õ" => "O","Ô" => "O","Ù" => "U","Ú" => "U","Ü" => "U"," " => "_");
  return strtr($str, $remover);
 }
?>
<title>
        NutriMapa
    </title>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCVJqGdm03cFzk8Ea6Cl_EFKRFD8nIHa2U&amp;sensor=false">
</script>

<script>

function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(-30.034971, -51.209816),
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap")
  ,mapProp);


<?php

  if(!empty($_POST['Estabelecimento']))
  {
  $controle=1;
  $y=$_POST['Estabelecimento'];
  $palavra=strtr(strtolower($y),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
  $palavra=remover($palavra);
  $resultBusca = $db->query('SELECT * FROM locais ') or die('Query db failed1');
  while ($rowBusca = $resultBusca->fetchArray()){
    $banco= strtr(strtolower($rowBusca['nome']),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    $banco=remover($banco);
    if($banco==$palavra)
    {
      $controle=0;
      $idBusca=$rowBusca['id'];
      $result= $db->query('SELECT * FROM enderecos WHERE lid='.$idBusca) or die('Query db failed1');
      $fail="";
    }
  }
  if ($controle==1)
  {
    $result= $db->query('SELECT * FROM enderecos') or die('Query db failed1');
    $fail="Estabelecimento não encontrado";
  }
  }
  elseif(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check3'])  AND  isset($_POST['check4']))
  {
    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 or lactose=1 or light=1 or diet=1') or die('Query db failed1');
  }
  elseif(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or gluten=1 or light=1 ') or die('Query db failed1');  
  
  }
  elseif(isset($_POST['check2'])  AND isset($_POST['check3']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 or light=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or gluten=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check3']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or light=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check2']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or gluten=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or light=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check2'])  AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 or light=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check2'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check3'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE light=1 or diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1') or die('Query db failed1');  
  
  }
  elseif(isset($_POST['check2']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1') or die('Query db failed1');  
  
  }
  elseif(isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE light=1') or die('Query db failed1');  
  
  }
  elseif(isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE diet=1') or die('Query db failed1');  
  
  }
  else{

    $result = $db->query('SELECT * FROM enderecos ') or die('Query db failed1');
  
  }

  while ($row = $result->fetchArray()){
      echo "var marker{$row['id']}=new google.maps.Marker({
            position:new google.maps.LatLng({$row['latitude']},{$row['longitude']}),icon:'carrot_cartoonII.png'});";
      echo "marker{$row['id']}.setMap(map); \n";
?>

var infowindow<?=$row['id']?> = new google.maps.InfoWindow({
  content:"<?=$row['nome']?><br><?=$row['endereco']?><br><?=$row['url']?>"
  });

google.maps.event.addListener(marker<?=$row['id']?>, 'click', function() {
  infowindow<?=$row['id']?>.open(map,marker<?=$row['id']?>);
  });
<?php }; ?>

}


google.maps.event.addDomListener(window, 'load', initialize); 

</script>
</head>
<body>
<header>
        <a href="mapas.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
        <a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
        <a href="favoritos.php"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
        <a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_escuro.png"></a>
        <a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
        <a href="mapas.php"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_claro.png"></a>
</header>

<div id="pesquisa">
    <p id="pbusca">Digite o nome do estabelecimento</p>
  <form action="" method="post">
<input type="text" name="Estabelecimento"/> 
<label><input type="submit" name="buscar" value="Busca" nClick="<?php $funcao; ?>" /></label>
</form>
</div>
<div id="checkboxMapa" >
<form action="mapas.php" method="post">
<input type="checkbox" name="check1" value="1">Sem Lactose
<input type="checkbox" name="check2" value="1">Sem Gluten
<input type="checkbox" name="check3" value="1">Light
<input type="checkbox" name="check4" value="1">Diet
<input type="submit" name="ok" value="ok">
</form>
</div>
<div id="errodepesquisa">
  <?php echo $fail; ?>
</div>


<div id="googleMap" style="max-width:1400px; min-width:1280px; height:600px;"></div>



<div id="cookieUsuarioMapa">
  <p id = "cookieTextoMapa">Olá <?php
        $veri = $_COOKIE['cookieNome'];
        $nutrimapa_db = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
        $selectQuery = $nutrimapa_db ->query('SELECT * FROM usuarios WHERE id = '.$veri);
        $row = ($selectQuery -> fetchArray());
        echo $row['nome'];
     ?>
     ! <div id= 'sairMapa'><a href ="http://192.168.10.10/index2.php">(Sair)</a></div>
   </p>
 </div>


</body>
</html> 