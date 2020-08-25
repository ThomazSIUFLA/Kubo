<?php
require_once '../../bibl/Persistence/LivroDao.php';
require_once '../../bibl/Persistence/connection.php';
require_once '../../bibl/Model/Livro.php';

class TestLivrosDAO extends PHPUnit\Framework\TestCase {
    
    public function testCadastrarLivro(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $liv = new Livro('123123', 'titulo2', 'editora55', 1994, 5, 'autor', 2);
        $obj = new LivroDao();        
        $this->assertTrue($obj->salvarLivro($liv,$conn));

    }

    public function testListarLivros(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->listarLivros($conn));        
    }

    public function testDetalharLivro(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->detalharLivro ($conn, 52));
        
    }

    public function testBuscaEditora(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->buscaEditora($conn, 46));        
    }

    public function testBuscaDisponiveis(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->buscaDisponiveis($conn, 52));        
    }

    public function testAlterarLivro(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->alterarLivro($conn, 52));        
    }

    public function testPesquisaLivro(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->pesquisaLivro($conn,'titulo','livro'));        
    }
    
    public function testExcluiLivros(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $obj = new LivroDao();        
        $this->assertTrue($obj->excluiLivro($conn, 52)); 
        
    }

    
}

?>