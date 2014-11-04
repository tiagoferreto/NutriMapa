<DOCTYPE! hmtl>

<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

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

  $db = new SQLite3('nutrimapa.sqlite') or die('Unable to open database');
  
  $result = $db->query('SELECT * FROM enderecos;') or die('Query db failed');

  while ($row = $result->fetchArray())
  {
    echo "var marker{$row['id']}=new google.maps.Marker({
      position:new google.maps.LatLng({$row['latitude']},{$row['longitude']})});";
  echo "marker{$row['id']}.setMap(map); \n";

 echo "var infowindow = new google.maps.InfoWindow({
  content:"olaa"
  });";
echo "google.maps.event.addListener(marker{$row['id']}, 'click', function() {
  infowindow.open(map,marker{$row['id']});
  });";
      }

?>

}


google.maps.event.addDomListener(window, 'load', initialize); 

</script>


<div id="googleMap" style="width:1400px;height:600px;"></div>

</body>
</html> 

