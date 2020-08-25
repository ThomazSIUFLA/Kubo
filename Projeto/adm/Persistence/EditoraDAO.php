<?php

class EditoraDao {

    function salvarEditora($edit, $conn){
        $sql = "INSERT INTO editora(cnpj, nomeEditora, telefone, email, site) VALUES ('".
        $edit->getCnpj() ."','" . 
        $edit->getNome()."','" .
        $edit->getTelefone()."','" .
        $edit->getEmail()."','" .
        $edit->getSite() . "');";
        $conn->query($sql);
    }

    function listarEditoras ($conn) {
        $sql = "SELECT * FROM editora ORDER BY nomeEditora;";
        $res = $conn->query($sql);
        return $res;
    }

    function detalharEditora ($conn, $codEditora){
        $sql = "SELECT * FROM editora WHERE idEditora = '$codEditora';";
        $res = $conn->query($sql);
        return $res;
    }

    function alterarEditora($conn, $editora){
        $cod = (int)$editora ['idEditora'];
        $nome = $editora['nomeEditora'];
        $cnpj = $editora['cnpj'];
        $site = $editora['site'];
        $email = $editora['email'];
        $tel = $editora ['telefone'];

        $sql = "UPDATE editora SET email='$email', nomeEditora='$nome', site='$site', cnpj='$cnpj', telefone='$tel' WHERE idEditora=$cod";

        $conn->query($sql);
    }

    function pesquisaEditora($conn,$param,$valor){
        $sql = "SELECT * FROM Editora WHERE $param LIKE '%$valor%' ORDER BY nomeEditora";
        $res = $conn->query($sql);

        return $res;
    }

    function excluiEditora($conn,$cod){
        $sql = "DELETE FROM Editora WHERE idEditora=$cod";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }        
    }

    function listarLivros($conn, $codEditora){
        $sql = "SELECT * FROM editora INNER JOIN livros where editora.idEditora=livros.CodEditora
        AND idEditora = $codEditora;";
        return $conn->query($sql);

    }
}



?>