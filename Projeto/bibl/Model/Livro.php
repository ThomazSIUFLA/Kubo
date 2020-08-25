<?php

class Livro{
    private $isbn;
    private $titulo;
    private $codEditora;
    private $anoPublic;
    private $edicao;
    private $autor;
    private $quant;
    
    function __construct($isbn, $titulo, $codEditora, $anoPublic, $edicao, $autor, $quant) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->codEditora = $codEditora;
        $this->anoPublic = $anoPublic;
        $this->edicao = $edicao;
        $this->autor = $autor;
        $this->quant = $quant;
    }

    function getIsbn(){
        return $this->isbn;
    }

    function getQuant(){
        return $this->quant;
    }

    function getTitulo(){
        return $this->titulo;
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

    function getAutor(){
        return $this->autor;
    }
}
?>