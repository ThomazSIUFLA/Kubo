<?php

class Livro{
    private $isbn;
    private $codLivro;
    private $titulo;
    private $codEditora;
    private $anoPublic;
    private $edicao;
    
    function __construct($isbn, $codLivro, $titulo, $codEditora, $anoPublic, $edicao) {
        $this->isbn = $isbn;
        //$this->codLivro = $codLivro;
        $this->titulo = $titulo;
        //$this->codEditora = $codEditora;
        $this->anoPublic = $anoPublic;
        $this->edicao = $edicao;
    }

    function getIsbn(){
        return $this->isbn;
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getCodLivro(){
        return $this->codLivro;
    }

    function getCodEditora(){
        return $this->codEditora;
    }

    function getAnoPublic(){
        return $this->anoPublic;
    }

    function getEdicao(){
        return $this->edicao;
    }
}
?>