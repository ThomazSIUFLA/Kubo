<?php

class Exemplar {
    private $codInterno;
    private $codLivro;
    private $tipoEmprestimo;
    private $local = Array(['secao'],['corredor'],['prateleira']);

    function __construct($codInterno, $codLivro, $tipoEmprestimo, $local){
        $this->codInterno = $codInterno;
        $this->codLivro = $codLivro;
        $this->tipoEmprestimo = $tipoEmprestimo;
        $this->local = $local;
    }

    function getCodExemplar () {
        return $this->codInterno;
    }

    function getCodLivro () {
        return $this->codLivro;
    }

    function getTipoEmprestimo (){
        return $this->tipoEmprestimo;
    }

    function getLocal(){
        return $this->local;
    }

}


?>