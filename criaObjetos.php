<?php

include_once "autor.php";
include_once "editora.php";
include_once "livro.php";

/* Classe para instanciar os objetos usados */
$autor = new Autor();
$autor->setNome("Lucas");
$autor->setEmail("stein.lucas@icloud.com");
$autor->setWebsite("www.meusite.com");

$editora = new Editora();
$editora->setNome("Abril");
$editora->setTelefone("47 99123 4567");
$editora->setEmail("editora@gmail.com");
$editora->setWebsite("www.editora.com.br");

$livro = new Livro();
$livro->setTitulo("Título: o livro.");
$livro->setISBN("1234");
$livro->setNumPaginas("12");
$livro->setAnoPublicacao("2023");
$livro->setNumEdicao("1");
$livro->setAutor($autor);
$livro->setEditora($editora);

$livros = array($livro);

?>