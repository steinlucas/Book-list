<?php

include_once "autor.php";
include_once "editora.php";
include_once "livro.php";

$autor1 = new Autor();
$autor1->setNome("Lucas");
$autor1->setEmail("stein.lucas@icloud.com");
$autor1->setWebsite("www.meusite.com");

$autor2 = new Autor();
$autor2->setNome("Marcelo");
$autor2->setEmail("fulano@gmail.com");
$autor2->setWebsite("www.meusite2222.com");

$autor3 = new Autor();
$autor3->setNome("Felipe");
$autor3->setEmail("felipe@gmail.com");
$autor3->setWebsite("www.meusite3.com");

$editora = new Editora();
$editora->setNome("Abril");
$editora->setTelefone("47 99123 4567");
$editora->setEmail("editora@gmail.com");
$editora->setWebsite("www.editora.com.br");

$livro1 = new Livro();
$livro1->setTitulo("O primeiro livro.");
$livro1->setISBN("1234");
$livro1->setNumPaginas("12");
$livro1->setAnoPublicacao("2023");
$livro1->setNumEdicao("1");
$livro1->setAutor($autor1);
$livro1->setEditora($editora);

$livro2 = new Livro();
$livro2->setTitulo("O segundo livro.");
$livro2->setISBN("4321");
$livro2->setNumPaginas("27");
$livro2->setAnoPublicacao("1927");
$livro2->setNumEdicao("2");
$livro2->setAutor($autor2);
$livro2->setEditora($editora);

$livro3 = new Livro();
$livro3->setTitulo("O terceiro livro.");
$livro3->setISBN("4321");
$livro3->setNumPaginas("27");
$livro3->setAnoPublicacao("1927");
$livro3->setNumEdicao("2");
$livro3->setAutor($autor2);
$livro3->setEditora($editora);

$livro4 = new Livro();
$livro4->setTitulo("O quarto livro.");
$livro4->setISBN("4321");
$livro4->setNumPaginas("27");
$livro4->setAnoPublicacao("1927");
$livro4->setNumEdicao("3");
$livro4->setAutor($autor3);
$livro4->setEditora($editora);

$livros = array($livro1, $livro2, $livro3, $livro4);

?>