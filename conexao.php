<?php

function obterConexao() {
    $conexao = new PDO("mysql:host=localhost;dbname=estante", "root", "aluno");
    return $conexao;
}

function pesquisarLivro($idLivro) {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM LIVRO WHERE ID = ?;";
    
    $stmt = mysqli_prepare($conexao, $comandoSQL);
    mysqli_stmt_bind_param($stmt, "s", $idLivro);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $resultado_array = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    return $resultado_array;
}

function pesquisarEditora($nomeEditora) {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM EDITORA WHERE NOME LIKE ?;";
    $stmt = mysqli_prepare($conexao, $comandoSQL);
    mysqli_stmt_bind_param($stmt, "s", $nomeEditora);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $resultado_array = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    return $resultado_array;
}

function pesquisarAutor($nomeAutor) {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM AUTOR WHERE NOME LIKE '".$nomeAutor."';";
    $query = mysqli_query($conexao, $comandoSQL);
    $resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $resultado;
}

function pesquisarListaAutores() {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM AUTOR;";
    $query = mysqli_query($conexao, $comandoSQL);
    $resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $resultado;
}

function pesquisarListaLivros() {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM LIVRO;";
    $query = mysqli_query($conexao, $comandoSQL);
    $resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $resultado;
}

function pesquisarListaEditoras() {
    $conexao = obterConexao();
    $comandoSQL = "SELECT * FROM EDITORA;";
    $query = mysqli_query($conexao, $comandoSQL);
    $resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $resultado;
}

function pesquisarEstanteLivros() {
    $conexao = obterConexao();
    $comandoSQL = "SELECT L.ID,
                          L.TITULO,
                          A.NOME as nomeAutor,
                          E.NOME as nomeEditora
                    FROM LIVRO_AUTOR LA, LIVRO L, AUTOR A, EDITORA E
                   WHERE LA.ID_LIVRO = L.ID
                     AND LA.ID_AUTOR = A.ID
                     AND L.ID_EDITORA = E.ID
                ORDER BY L.ID;";
    $query = mysqli_query($conexao, $comandoSQL);
    $resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $resultado;
}

function gravarLivro($titulo, $ISBN, $numPaginas, $numEdicao, $anoPublicacao, $idEditora){
    $conexao = obterConexao();
    $comandoSQL = "INSERT INTO LIVRO (TITULO, ISBN, NUMPAGINAS, NUMEDICAO, ANOPUBLICACAO, ID_EDITORA) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($conexao, $comandoSQL);
    mysqli_stmt_bind_param($stmt, "siiiii", $titulo, $ISBN, $numPaginas, $numEdicao, $anoPublicacao, $idEditora);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    return $resultado;
}

function gravarLivroAutor($idAutor){
    $conexao = obterConexao();
    $comandoSQL = "INSERT INTO LIVRO_AUTOR (ID_LIVRO, ID_AUTOR) VALUES ((SELECT MAX(ID) FROM LIVRO), ?);";
    $stmt = mysqli_prepare($conexao, $comandoSQL);
    mysqli_stmt_bind_param($stmt, "i", $idAutor);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    return $resultado;
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
?>

?>