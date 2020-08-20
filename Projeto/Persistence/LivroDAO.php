<?php

class LivroDao {

    function salvarLivro($livro, $conn){
        $sql = "INSERT INTO livros(isbn, titulo, anoPublic, codEditora, edicao) VALUES ('".
        $livro->getIsbn() ."','" . 
        $livro->getTitulo()."'," .
        $livro->getAnoPublic().",'" .
        (int)$livro->getCodEditora()."'," .
        $livro->getEdicao() . ");";

        $conn->query($sql);

    }

    function listarLivros ($conn) {
        $sql = "SELECT * FROM livros L INNER JOIN editora E WHERE L.codEditora = E.idEditora ORDER BY titulo;";

        $res = $conn->query($sql);
        return $res;
    }

    function detalharLivro ($conn, $codLivro){
        $sql = "SELECT * FROM livros INNER JOIN editora WHERE codLivro = '$codLivro';";
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
        $sql = "SELECT * FROM Livros L 
        INNER JOIN editora E 
        WHERE $param LIKE '%$valor%' AND L.codEditora=E.idEditora 
        ORDER BY titulo";
        
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