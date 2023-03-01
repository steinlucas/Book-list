<?php

class Livro{
    public $titulo;
    public $isbn;
    public $nPaginas;
    public $anoPublicacao;
    public $numEdicao;
    public $autor; /* Recebe objeto Autor */
    public $editora; /* Recebe objeto Editora */

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setISBN($isbn){
        $this->isbn = $isbn;
    }

    public function getISBN(){
        return $this->isbn;
    }

    public function setNumPaginas($nPaginas){
        $this->nPaginas = $nPaginas;
    }

    public function getNumPaginas(){
        return $this->nPaginas;
    }

    public function setAnoPublicacao($anoPublicacao){
        $this->anoPublicacao = $anoPublicacao;
    }

    public function getAnoPublicacao(){
        return $this->anoPublicacao;
    }

    public function setNumEdicao($numEdicao){
        $this->numEdicao = $numEdicao;
    }

    public function getNumEdicao(){
        return $this->numEdicao;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setEditora($editora){
        $this->editora = $editora;
    }

    public function getEditora(){
        return $this->editora;
    }
}

?>