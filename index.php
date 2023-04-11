<?php

session_start();

if(isset($_SESSION['autenticado']) == false && $_SESSION['autenticado'] != true){
	header('Location: telaLogin.php');
}

$login = $_SESSION['login'];

include_once "criaObjetos.php";
include_once "conexao.php";

$opa = obterConexao();
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    
    </head>
    <body>
    <div class="container">

        <div>
			Bem-vindo, <?php echo $login ?>
		</div>

        <div>
			<button type="button" onclick="window.location='session/logout.php'">Sair</button>
		</div>

        <h1>Listagem de livros</h1>
        
        <table class="table">
        <tr>
            <th scope="col">Nome livro</th>
            <th scope="col">Nome autor</th>
            <th scope="col">Nome editora</th>
            <th scope="col">Detalhes</th>
        </tr>

        <?php
        foreach($livros as $umLivro){ ?>
        <tr>
            <td>
                <?php echo $umLivro->getTitulo();?>
            </td>

            <td>
                <?php echo $umLivro->getAutor()->getNome();?>
            </td>

            <td>
                <?php echo $umLivro->getEditora()->getNome();?>
            </td>
        </tr>
        <?php } ?>

        </table>
    </div>
    </body>
</html>