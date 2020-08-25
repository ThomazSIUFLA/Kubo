<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/AlunoDAO.php';
    include_once '../Model/Aluno.php';
    
    class AlunosController{
        public function __construct(){}

        public function cadastrarAluno($nome, $telefone, $email, $senha, $rua, $numero,
        $compl, $bairro, $cidade, $matricula, $serie, $turma, $nasc,
        $nomeResp, $telResp){
            $turmaAluno = $serie.'-'.$turma;
            $endereco = "$rua nº $numero $compl, Bairro: $bairro, $cidade";

            $aluno = new Aluno($nome, $telefone, $endereco, $email, $senha, 
            $turmaAluno, $nomeResp, $telResp, $matricula, $nasc);

            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new AlunoDao();
            $res = $dao->CadastrarAluno($conn, $aluno);

        }

        public function alterarAluno($idUsuario, $idAluno, $nome, $telefone, $email, $endereco, 
        $serie, $turma, $nasc, $nomeResp, $telResp){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new AlunoDao();
            $res = $dao->alterarAluno($conn,$idUsuario, $idAluno, $nome, $telefone, $email, $endereco, 
            $serie, $turma, $nasc, $nomeResp, $telResp);
        }

        public function listar(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new AlunoDao();
            $res = $dao->listarAlunos($conn);
            return $res;
            
        }

        public function detalharAluno ($codAluno){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new AlunoDao();
            $res = $dao->detalharAluno($conn, $codAluno);
            return $res;
        }

        public function pesquisaAluno($valor){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new AlunoDao();

            $param = $valor['param'];
            $val = $valor['valor'];
            
            $res = $dao->pesquisaAluno($conn,$param,$val);
            return $res;
        }

        public function excluirAluno($idAluno, $idUsuario){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new AlunoDao();
            if($dao->ExcluiAluno($conn,$idAluno, $idUsuario)){
                return "Aluno excluido com sucesso!";
            }
            return "falha ao excluir Aluno";
        }

    }
