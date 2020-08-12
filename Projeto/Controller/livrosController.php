<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/LivroDAO.php';
    
    class LivrosController{
        function __construct(){}

        function listar(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new LivroDao();
            $res = $dao->listarLivros($conn);

            return $res;
            
        }

        function detalharLivro ($codLivro){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            $res = $dao->detalharLivro($conn, $codLivro);
            return $res;
        }

        function pesquisaLivro($valor){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            $res = $dao->pesquisaLivro($conn,$valor['param'],$valor['valor']);
            return $res;
        }

        function excluirLivro($cod){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            if($dao->ExcluiLivro($conn,$cod)){
                return "Livro excluido com sucesso!";
            }
            return "falha ao excluir livro";
        }
    }
