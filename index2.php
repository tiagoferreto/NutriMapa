<!DOCTYPE html>

<html lang="PT-BR"> <!-- Faz o HTML identificar o site no idioma PT-BR -->
	
<head>
<script language="JavaScript">
document.onkeydown=enter; //Para o navegador reconhecer o comando da tecla 'enter'
	function Login(){ // Função que efetua o login
		var concluido=false;	
		var username=document.login.username.value; //Vai NESTE documento (document), na form de name "Login", no input de name "username" e "password" e pega o valor deles (value);
		username=username.toLowerCase(); //toLowerCase() = transforma as letras, se existentes, do valor em minúsculas;	
		var password=document.login.password.value;
		password=password.toLowerCase();
		if (username=="nutrimapa" && password=="nutrimapa") { window.location="http://www.google.com.br/"; concluido=true; } //window.location = envia para  outra página.
		if (username=="ferreto" && password=="701") { window.location="http://www.google.com.br/"; concluido=true; }
		if (concluido==false) { alert("Seu login ou senha é inválido"); }
	}
	 function enter(){
    	if (event.keyCode == 13){ //Se o usuário teclar o botão 'Enter' (de código '13'), executa a função Login();
      		Login();
    	}
	}
</script>
<meta charset="UTF-8"> <!-- Código para que o HTML identifique a codificação dos caracteres como Unicode -->
<link href="default.css" rel="stylesheet" type="text/css" media="all"> <!-- Faz um link deste HTML com o CSS chamado "default.css" -->
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'> <!-- Faz um link deste HTML com uma fonte do Google chamada "Abel" -->
	<title>
		Nutri Mapa
	</title>
</head>
<body>
	<header>
		<a href="index2.php"><img  style="margin-top:20px;margin-left:30px;widht:130px;height:130px" src="icones/logo.png"></a>
		<a href="sobre2.html"><img align="right" style="margin-top:40px;margin-right:50px" src="icones/sobre_escuro.png"></a>
	</header>
<div id = "login">
	<p>FAÇA SEU LOGIN</p>
	<form name=login>
	<input type=text class="caixa_inf" name=username placeholder="Usuário"></br>
	<input type=password class="caixa_inf" name=password placeholder="Senha"></br>
	<input type=button class="button_entrar" value="Entrar" onClick="Login()"></br>
	</form>
</div>	
</body>
</html>
