<?php
require_once '../../bibl/Model/Livro.php';

class TestLivroModel extends PHPUnit\Framework\TestCase {

    function testGetIsbn(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals('123',$obj->getIsbn());
    }

    function testGetQuant(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals('3',$obj->getQuant());
    }

    function testGetTitulo(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals('Livro teste',$obj->getTitulo());
    }

    function testGetCodEditora(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals('ed1',$obj->getCodEditora());
    }

    function testGetAnoPublic(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals(2020,$obj->getAnoPublic());
    }

    function testGetEdicao(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals(3,$obj->getEdicao());
    }

    function testGetAutor(){
        $obj = new Livro('123', 'Livro teste', 'ed1', 2020, 3, 'Pero vaz caminha', 3);
        $this->assertEquals('Pero vaz caminha',$obj->getAutor());
    }    
}

?>