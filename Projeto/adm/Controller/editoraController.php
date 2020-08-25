<?php
include_once '../Model/Editora.php';
include_once '../Persistence/EditoraDAO.php';
include_once '../Persistence/connection.php';

class EditoraController {
    function __construct(){}

    function listarEditoras(){
        $connection = new Connection();
        $conn = $connection->getConnection();

        $dao = new EditoraDao();
        $res = $dao->listarEditoras($conn);
        
        return $res;
    }
    
    function pesquisaEditora($valor){
        $connection = new Connection();
        $conn = $connection->getConnection();   
        $dao = new EditoraDao();
        $res = $dao->pesquisaEditora($conn,$valor['param'],$valor['valor']);
        return $res;
    }

    function detalharEditora ($codEditora){
        $connection = new Connection();
        $conn = $connection->getConnection();   
        $dao = new EditoraDao();
        $res = $dao->detalharEditora($conn, $codEditora);
        
        return $res;
    }

    function excluirEditora($cod){
        $connection = new Connection();
        $conn = $connection->getConnection();   
        $dao = new EditoraDao();
        if($dao->ExcluiEditora($conn,$cod)){
            return "Editora excluida com sucesso!";
        }
        return "falha ao excluir editora";
    }

    function listarLivros($codEditora){
        $connection = new Connection();
        $conn = $connection->getConnection();   
        $dao = new EditoraDao();
        $res = $dao->listarLivros($conn,$codEditora);
        return $res;
    }
}


?>