<?php

class LivroDao {

    public function salvarLivro($livro, $conn){
        $sql = "INSERT INTO livros(isbn, titulo, anoPublic, autor, codEditora, edicao) VALUES ('".
        $livro->getIsbn() ."','" . 
        $livro->getTitulo()."'," .
        $livro->getAnoPublic().",'" .
        $livro->getAutor()."','" .
        (int)$livro->getCodEditora()."'," .
        $livro->getEdicao() . ");";

        $conn->query($sql);

        $quant = $livro->getQuant();
        $isbn = $livro->getIsbn();

        $res = $conn->query("SELECT codLivro 
        FROM livros 
        WHERE isbn = $isbn");
        $codLivro = $res->fetch_assoc();
        
        $res = $conn->query("SELECT MAX(idExemplar) 
        FROM exemplar NATURAL JOIN livros
        WHERE codLivro = {$codLivro['codLivro']}");

        $ultimoExemplar = $res->fetch_assoc();
        
        for($i = 0; $i < $quant; $i++){
            $id = $i + (int)$ultimoExemplar + 1;
            $sql = "INSERT INTO exemplar VALUES($id, {$codLivro['codLivro']},'s')";
            $conn->query($sql);
        }

        return true;

    }

    public function listarLivros ($conn) {
        $sql = "SELECT codLivro, titulo, isbn, anoPublic, edicao, autor, 
        COUNT(codLivro) AS quantTotal 
        FROM livros NATURAL JOIN exemplar GROUP BY codLivro ORDER BY titulo";

        $res = $conn->query($sql);
        return $res;
    }

    public function detalharLivro ($conn, $codLivro){
        $sql = "SELECT * FROM livros INNER JOIN editora WHERE codLivro = '$codLivro';";
        $res = $conn->query($sql);
        return $res;
    }

    public function buscaEditora($conn, $codLivro){
        $sql = "SELECT nomeEditora 
        FROM livros NATURAL JOIN editora WHERE codLivro = $codLivro";
        return $conn->query($sql);
    }

    public function buscaDisponiveis($conn, $codLivro){
        $sql = "SELECT COUNT(idExemplar) AS quant
        FROM livros NATURAL JOIN exemplar
        WHERE disponibilidade = 's' AND codLivro = $codLivro";
        return $conn->query($sql);
    }

    public function alterarLivro($conn, $livro){
        $cod = $livro ['codLivro'];
        $titulo = $livro['titulo'];
        $ano = (int) $livro['anoPublic'];
        $edicao = (int) $livro['edicao'];
        $isbn = $livro['isbn'];

        $sql = "UPDATE Livros SET isbn='$isbn', titulo='$titulo', anoPublic=$ano, edicao=$edicao WHERE codLivro=$cod";
        
        $res = $conn->query($sql);
    }

    public function pesquisaLivro($conn,$param,$valor){

        $sql = "SELECT codLivro, titulo, isbn, anoPublic, edicao, autor,
        COUNT(codLivro) AS quantTotal 
        FROM livros NATURAL JOIN exemplar
        WHERE $param LIKE '%$valor%'
        GROUP BY codLivro ORDER BY titulo";        
        
        $res = $conn->query($sql);
        return $res;
    }

    public function excluiLivro($conn,$cod){
        $sql = "DELETE FROM Livros WHERE codLivro=$cod";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }        
    }
}
