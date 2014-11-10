<DOCTYPE! hmtl>

<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<title>
        NutriMapa
    </title>

<script language="JavaScript">

document.onkeydown=enter; //Para o navegador reconhecer o comando da tecla 'enter'
    function Login(){ // Função que efetua o login
        var concluido=false;    
        var caixadigi=document.pesquisa.caixadigi.value; //Vai NESTE documento (document), na form de name "Login", no input de name "username" e "password" e pega o valor deles (value);
        caixadigi=caixadigi.toLowerCase(); //toLowerCase() = transforma as letras, se existentes, do valor em minúsculas; 
        if (caixadigi=="nutrimapa") { 
            map.setZoom(9);
            map.setCenter(banca13.getPosition());
            } //window.location = envia para  outra página.
        if (concluido==false) { alert("Estabelecimento nao encontrado"); }
    }
     function enter(){
        if (event.keyCode == 13){ //Se o usuário teclar o botão 'Enter' (de código '13'), executa a função Login();
            Login();
        }
    }
</script>
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

  $db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
  
  if(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check3'])  AND  isset($_POST['check4']))
  {
    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 and lactose=1 and light=1 and diet=1') or die('Query db failed1');
  }
  elseif(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and gluten=1 and light=1 ') or die('Query db failed1');  
  
  }
  elseif(isset($_POST['check2'])  AND isset($_POST['check3']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 and light=1 and diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check2']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and gluten=1 and diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check3']) AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and light=1 and diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check2']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and gluten=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and light=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check1'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE lactose=1 and diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check2'])  AND isset($_POST['check3']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 and light=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check2'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE gluten=1 and diet=1 ') or die('Query db failed1');  
  
  }
   elseif(isset($_POST['check3'])  AND isset($_POST['check4']))
  {

    $result = $db->query('SELECT * FROM enderecos WHERE light=1 and diet=1 ') or die('Query db failed1');  
  
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
  //$idlocais = $db->query('SELECT locais.id,enderecos.lid,locais.nome,locais.url, locais.diet FROM enderecos, locais WHERE locais.id=enderecos.lid and enderecos.id=1') or die('Query db failed');

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
        <a href="index.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
        <a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
        <a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/favoritos_escuro.png"></a>
        <a href="locais.php"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/locais_escuro.png"></a>
        <a href="receitas.php"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/receitas_escuro.png"></a>
        <a href="mapas.php"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/mapa_claro.png"></a>
</header>

<div id="pesquisa">
    <p id="pbusca">Digite o nome do estabelecimento</p>
    <form name=pesquisa>
    <input type=text class="caixainput" name=caixadigi placeholder=" Digite aqui">
    <input type=button class="botaobusca" value="Busca" onClick="Busca()">
    </form>


</div>
<div id="checkboxMapa">
<form action="mapas.php" method="post">
<input type="checkbox" name="check1" value="1">Sem Lactose
<input type="checkbox" name="check2" value="1">Sem Gluten
<input type="checkbox" name="check3" value="1">Light
<input type="checkbox" name="check4" value="1">Diet
<input type="submit" name="ok" value="ok">
</form>
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