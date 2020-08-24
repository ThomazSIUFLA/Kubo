<?php
class Usuario{
    protected $nome;
    protected $tipo;
    protected $telefone;
    protected $endereco;
    protected $email;
    protected $senha;
    protected $nasc;
    protected $dataCadastro;

    
    function __construct($nome, $tipo, $telefone, $endereco, $email, $senha, $nasc) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->senha = $senha;
        $this->nasc = $nasc;
        $this->dataCadastro = date('Y/m/d');
    }

    function getnome(){
        return $this->nome;
    }

    function getTipo(){
        return $this->tipo;
    }

    function gettelefone(){
        return $this->telefone;
    }

    function getCodLivro(){
        return $this->codLivro;
    }

    function getendereco(){
        return $this->endereco;
    }

    function getemail(){
        return $this->email;
    }

    function getsenha(){
        return $this->senha;
    }

    function getNasc(){
        return $this->nasc;
    }

    function getDataCadastro(){
        return $this->dataCadastro;
    }
}
?>