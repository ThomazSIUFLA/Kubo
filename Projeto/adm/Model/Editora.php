<?php

class Editora{
    private $cnpj = null;
    private $nome = null;
    private $email = null;
    private $telefone = null;
    private $site = null;

    public function __construct($cnpj,$nome,$email,$telefone,$site){
        $this->cnpj = $cnpj;
        $this->nome = $nome;
        $this->email = $email;
        $this->site = $site;
        $this->telefone = $telefone;
    }


    public function getCnpj(){
        return $this->cnpj;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSite(){
        return $this->site;
    }

    public function getTelefone(){
        return $this->telefone;
    }
}

?>