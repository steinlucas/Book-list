
<?php

session_start();

if(isset($_SESSION['autenticado']) == true && $_SESSION['autenticado'] == true){
	header('Location: index.php');
}

$mensagem = "";

if (isset($_SESSION['erro'])==true) {
	$mensagem  = $_SESSION['erro'];
	session_destroy();
}

$login = '';
$selecionado = '';

if (isset($_COOKIE['login'])) {
	$login = $_COOKIE['login'];
	$selecionado = 'checked';
}

?>
<html>
<body>
	<div style="width: 100%; height:100%">
		<form method="POST" action="session/login.php">

		<div style="text-align: center">
			<div>Login</div>
			<div><input type="text" name="login" value="<?=$login?>"></div>
			<div>Senha</div>
			<div><input type="password" name="senha"></div>
			<div><input type="checkbox" name="lembrar" <?=$selecionado?>>Lembrar meu nome<br></div>
			<div><?php echo $mensagem; ?></div>
			<button type="submit">Acessar</button>
		</div>
		</form>
	</div>
</body>
</html>

<?php