<?php

class Livro{
    private $isbn;
    private $titulo;
    private $codEditora;
    private $anoPublic;
    private $edicao;
    
    function __construct($isbn, $titulo, $codEditora, $anoPublic, $edicao) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->codEditora = $codEditora;
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