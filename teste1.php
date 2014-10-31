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
<?php
$db = new SQLite3('nutrimapa.sqlite') or echo 'Unable to open database';
  
      $result = $db->query('SELECT * FROM enderecos;') or die('Query db failed');
      
?>
function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(-30.034971, -51.209816),
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap")
  ,mapProp);
/*
<?php
  
  $inserido=$inserido2=$inserido3=$inserido4="";
  if (isset($_POST['checkbox1'])) {
      if ($_POST['checkbox1']){
      $inserido=$_POST['checkbox1'];
      $sql = "SELECT * FROM locais WHERE teste=$inserido";
    }
   }
   else{
    $sql = "SELECT * FROM locais";
   }
  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_assoc($result)):
?>
*/
var marker<?= $row['id']?>=new google.maps.Marker({
  position:new google.maps.LatLng(<?= $row['lat']?>,<?= $row['lng']?>),
  });

marker<?= $row['id']?>.setMap(map);

var infowindow<?= $row['id']?> = new google.maps.InfoWindow({
  content:"<?=$row['name']?>"
  });
google.maps.event.addListener(marker<?= $row['id']?>, 'click', function() {
  infowindow<?= $row['id']?>.open(map,marker<?= $row['id']?>);
  });

<?php endwhile; ?>

}
google.maps.event.addDomListener(window, 'load', initialize);



</script>


</head>

<body>
<header>
        <a href="index.html"><img  style="margin-top:20px;margin-left:30px" src="icones/claros/Logo.png"></a>
        <a href="sobre.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/claros/Sobre.png"></a>
        <a href="favoritos.html"><img align="right" style="margin-top:37px;margin-right:40px" src="icones/claros/Favoritos.png"></a>
        <a href="locais.html"><img align="right" style="margin-top:34px;margin-right:40px" src="icones/claros/Locais.png"></a>
        <a href="mapas.html"><img align="right" style="margin-top:38px;margin-right:40px" src="icones/escuros/Mapa2.png"></a>
        <a href="receitas.html"><img align="right" style="margin-top:42px;margin-right:40px" src="icones/claros/Receitas.png"></a>
</header>

<form action="" method="post">
<label>Teste1: <input type="checkbox" value="1"  name="checkbox1"></input></label>
<label>Teste2: <input type="checkbox" value="1"  name="n1"></input></label>
<label>Teste3: <input type="checkbox" value="1"  name="n2"></input></label>
<label>Teste4: <input type="checkbox" value="1"  name="n3"></input></label>
 
 
<label><input type="submit" name="ok" value="Ok" /></label>
</form>


<div id="googleMap" style="width:1400px;height:600px;"></div>



</body>
</html> 

