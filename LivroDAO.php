<?php

include_once "conexao.php";

class LivroDAO {
    function create(){
        // recebe um objeto e insere no banco.
    }

    function delete(){
        // recebe um objeto e dropa do banco.
    }

    function update(){
        // recebe um objeto e atualiza no banco.
    }

    function excluirLivro($id){
        $conexao = obterConexao();
        $comandoSQL = "SELECT * FROM LIVRO WHERE ID = ?;";
        $stmt = mysqli_prepare($conexao, $comandoSQL);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
    
        return $resultado;
    }
    
    function excluirLivroAutor($id){
        $conexao = obterConexao();
        $comandoSQL = "DELETE FROM LIVRO_AUTOR WHERE ID_LIVRO = ?;";
        $stmt = mysqli_prepare($conexao, $comandoSQL);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
                
        return $resultado;
    }
    
    function atualizarLivro($idLivro, $titulo, $isbn, $numpaginas, $numedicao, $anopublicacao, $idEditora){
        $conexao = obterConexao();
        $comandoSQL = "UPDATE LIVRO
                          SET TITULO = ?,
                              ISBN = ?,
                              NUMPAGINAS = ?,
                              NUMEDICAO = ?,
                              ANOPUBLICACAO = ?,
                              ID_EDITORA = ?
                        WHERE ID = ?;";
        $stmt = mysqli_prepare($conexao, $comandoSQL);
        mysqli_stmt_bind_param($stmt, "siiiiii", $titulo, $isbn, $numpaginas, $numedicao, $anopublicacao, $idEditora, $idLivro);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
    
        return $resultado;
    }
    
    function atualizarLivroAutor($idLivro, $idAutor){
        $conexao = obterConexao();
        $comandoSQL = "UPDATE LIVRO_AUTOR
                          SET ID_AUTOR = ?
                        WHERE ID_LIVRO = ?;";
        $stmt = mysqli_prepare($conexao, $comandoSQL);
        mysqli_stmt_bind_param($stmt, "ii", $idAutor, $idAutor);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
    
        return $resultado;
    }

}

?>