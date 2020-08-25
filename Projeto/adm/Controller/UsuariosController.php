<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/UsuarioDAO.php';
    include_once '../Model/Usuario.php';
    
    class UsuarioController{
        public function __construct(){}

        public function cadastrarUsuario($nome, $telefone, $email, $senha, $rua, $numero,
        $compl, $bairro, $cidade, $matricula, $serie, $turma, $nasc,
        $nomeResp, $telResp){
            $turmaUsuario = $serie.'-'.$turma;
            $endereco = "$rua nº $numero $compl, Bairro: $bairro, $cidade";

            $Usuario = new Usuario($nome, $telefone, $endereco, $email, $senha, 
            $turmaUsuario, $nomeResp, $telResp, $matricula, $nasc);

            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new UsuarioDao();
            $res = $dao->CadastrarBibliotecario($conn, $Usuario);

        }

        public function alterarUsuario($idUsuario, $idUsuario, $nome, $telefone, $email, $endereco, 
        $serie, $turma, $nasc, $nomeResp, $telResp){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new UsuarioDao();
            $res = $dao->alterarUsuario($conn,$idUsuario, $idUsuario, $nome, $telefone, $email, $endereco, 
            $serie, $turma, $nasc, $nomeResp, $telResp);
        }

        public function listar(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new UsuarioDao();
            $res = $dao->listarUsuario($conn);
            return $res;
            
        }

        public function detalharUsuario ($codUsuario){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new UsuarioDao();
            $res = $dao->detalharUsuario($conn, $codUsuario);
            return $res;
        }

        public function pesquisaUsuario($valor){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new UsuarioDao();

            $param = $valor['param'];
            $val = $valor['valor'];
            
            $res = $dao->pesquisaUsuario($conn,$param,$val);
            return $res;
        }

        public function excluirUsuario($idUsuario, $idUsuario){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new UsuarioDao();
            if($dao->ExcluiUsuario($conn,$idUsuario, $idUsuario)){
                return "Usuario excluido com sucesso!";
            }
            return "falha ao excluir Usuario";
        }

    }
