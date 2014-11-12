<?php
$ver = $_GET['username'];
unset($_COOKIE['cookieNome']);
setcookie('cookieNome', '', time() - 3600, "/");
echo 'REDIRECIONANDO';
echo nl2br("\n");
echo "teste";
$DB = new SQLite3('nutrimapa.sqlite') or die ('Unable to open DB');
$selectQuery = $DB -> query('SELECT * FROM usuarios');
while($row = $selectQuery -> fetchArray() ){
    $valor = $row ['id'];
    if($ver == $row['user_name']){
       $value = $valor;
    }
    
}
if(!isset($_COOKIE['cookieNome'])) {
    $cookieNome = 'usuarioCookie';
    setcookie('cookieNome', $value, time() + 3600, "/");
    echo "condicao 1";
    echo nl2br("\n");
    header("Location: http://192.168.10.10/redireciona.php");
} else {
    $cookieNome = 'usuarioCookie';
    unset($_COOKIE['cookieNome']);
    setcookie('cookieNome', '', time() - 3600, "/");
    setcookie('cookieNome', $value, time() + 3600, "/");
    echo "condicao 2";
    header("Location: http://192.168.10.10/redireciona.php");
}
?>