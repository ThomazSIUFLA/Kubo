<?php

class LivroDao {

    function salvarLivro($livro, $conn){
        $sql = "INSERT INTO livros(isbn, titulo, anoPublic, edicao) VALUES ('".
        $livro->getIsbn() ."','" . 
        $livro->getTitulo()."'," .
        $livro->getAnoPublic()."," .
        $livro->getEdicao() . ");";
        $conn->query($sql);

    }

    function listarLivros ($conn) {
        $sql = "SELECT * FROM livros;";
        $res = $conn->query($sql);
        return $res;
    }

    function detalharLivro ($conn, $codLivro){
        $sql = "SELECT * FROM livros WHERE codLivro = '$codLivro';";
        $res = $conn->query($sql);
        return $res;
    }

    function alterarLivro($conn, $livro){
        $cod = $livro ['codLivro'];
        $titulo = $livro['titulo'];
        $ano = (int) $livro['anoPublic'];
        $edicao = (int) $livro['edicao'];
        $isbn = $livro['isbn'];

        $sql = "UPDATE Livros SET isbn='$isbn', titulo='$titulo', anoPublic=$ano, edicao=$edicao WHERE codLivro=$cod";
        
        $res = $conn->query($sql);
    }

    function pesquisaLivro($conn,$param,$valor){
        $sql = "SELECT * FROM Livros WHERE $param LIKE '%$valor%'";
        $res = $conn->query($sql);
        return $res;
    }

    function excluiLivro($conn,$cod){
        $sql = "DELETE FROM Livros WHERE codLivro=$cod";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }        
    }
}



?>