<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/LivroDAO.php';
    
    class LivrosController{
        public function __construct(){}

        public function listar(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new LivroDao();
            $res = $dao->listarLivros($conn);

            return $res;   
        }

        public function buscaNomeEditora($codLivro){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            $res = $dao->buscaEditora($conn, $codLivro);
            $nome = $res->fetch_assoc();
            return $nome['nomeEditora'];
        }

        public function buscaDisponiveis($codLivro){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();            
            $res = $dao->buscaDisponiveis($conn, $codLivro);
            $disp = $res->fetch_assoc();
            return $disp['quant'];
        }

        public function detalharLivro ($codLivro){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            $res = $dao->detalharLivro($conn, $codLivro);
            return $res;
        }

        public function pesquisaLivro($valor){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            
            $res = $dao->pesquisaLivro($conn,$valor['param'],$valor['valor']);
            
            return $res;
        }

        public function excluirLivro($cod){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new LivroDao();
            if($dao->ExcluiLivro($conn,$cod)){
                return "Livro excluido com sucesso!";
            }
            return "falha ao excluir livro";
        }

    }
