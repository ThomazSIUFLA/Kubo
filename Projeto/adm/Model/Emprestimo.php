<?php
include '../Model/Usuario.php';

class Emprestimo{
    private $turma;
    private $nomeResponsavel;
    private $telResponsavel;
    private $matricula;

    
    
    function __construct($nome, $telefone, $endereco, $email, $senha, 
    $turma,$nomeResponsavel, $telResponsavel, $matricula, $nasc) {
        
        $this->turma = $turma;
        $this->nomeResponsavel = $nomeResponsavel;
        $this->telResponsavel = $telResponsavel;
        $this->matricula = $matricula;
    }

    public function getNome () {
        return $this->nome;
    }

    public function getTelefone () {
        return $this->telefone;
    }

    public function getEndereco () {
        return $this->endereco;
    }

    public function getEmail () {
        return $this->email;
    }

    public function getSenha () {
        return $this->senha;
    }

    public function getTurma () {
        return $this->turma;
    }

    public function getNomeResp () {
        return $this->nomeResponsavel;
    }

    public function getTelResp () {
        return $this->telResponsavel;
    }
    public function getMatricula () {
        return $this->matricula;
    }
}
?>