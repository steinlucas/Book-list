<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if (isset($_POST['lembrar']) && $_POST['lembrar']=='on') {
	setcookie('login', $login);
} else {
	setcookie('login', null, -1);
}

session_start();

if ($login == 'admin' && $senha=='admin') {
	$_SESSION['autenticado'] = true;
	$_SESSION['login'] = $login;
	header('Location: ../index.php');
} else {
	header('Location: telaLogin.php?');
	$_SESSION['erro'] = "Login ou senha inválido!";
}