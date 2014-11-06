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
}
initialize();

function carregarPontos()
{

var marker=new google.maps.Marker({
  position:new google.maps.LatLng(<?= $row['lat']?>,<?= $row['lng']?>),
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"<?=$row['name']?>"
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });

}
}

carregarPontos();
google.maps.event.addDomListener(window, 'load', initialize);

</script>

<?php endwhile; ?>
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

<div id="pesquisa">
    <p id="pbusca">Digite o nome do estabelecimento</p>
    <form name=pesquisa>
    <input type=text class="caixainput" name=caixadigi placeholder=" Digite aqui">
    <input type=button class="botaobusca" value="Busca" onClick="Busca()">
    </form>


</div>
<div id="googleMap" style="width:1400px;height:600px;"></div>


</body>
</html> 