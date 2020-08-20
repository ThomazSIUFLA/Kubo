<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/EmprestimoDAO.php';
    include_once '../Model/Emprestimo.php';
    
    class EmprestimoController{
        public function __construct(){}

        public function cadastrarEmprestimo($nome, $telefone, $email, $senha, $rua, $numero,
        $compl, $bairro, $cidade, $matricula, $serie, $turma, $nasc,
        $nomeResp, $telResp){
            $turmaEmprestimo = $serie.'-'.$turma;
            $endereco = "$rua nº $numero $compl, Bairro: $bairro, $cidade";

            $Emprestimo = new Emprestimo($nome, $telefone, $endereco, $email, $senha, 
            $turmaEmprestimo, $nomeResp, $telResp, $matricula, $nasc);

            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->CadastrarEmprestimo($conn, $Emprestimo);

        }

        public function alterarEmprestimo($idUsuario, $idEmprestimo, $nome, $telefone, $email, $endereco, 
        $serie, $turma, $nasc, $nomeResp, $telResp){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->alterarEmprestimo($conn,$idUsuario, $idEmprestimo, $nome, $telefone, $email, $endereco, 
            $serie, $turma, $nasc, $nomeResp, $telResp);
        }

        public function listar(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->listarEmprestimos($conn);
            return $res;
            
        }

        public function listarLivrosEmprestimo($codEmprestimo){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->listarLivrosEmprestimo($conn, $codEmprestimo);
            return $res;
        }

        public function detalharEmprestimo ($codEmprestimo){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();
            $res = $dao->detalharEmprestimo($conn, $codEmprestimo);
            
            return $res;
        }

        public function pesquisaEmprestimo($valor){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();

            $param = $valor['param'];

            if($param == 'turma'){
                $val = $valor['serie'].'-'.$valor['turma'];
            } elseif ($param == 'situacao') {
                $val = $valor['status'];
            }else{
                $val = $valor['valor'];
            }
            
            $res = $dao->pesquisaEmprestimo($conn,$param,$val);
            return $res;
        }

        public function finalizaEmprestimo($codEmprestimo){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();
           
            $dao->finalizaEmprestimo($conn,$codEmprestimo);            
        }

        public function renovaEmprestimo($codEmprestimo, $dados){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();

            $novaData = $dados['data'];
            $dias = $dados['tempo'];
            if($dias != 0){
                $novaData = date('Y-m-d', strtotime("+$dias days"));
            }
            $dao->renovaEmprestimo($conn,$codEmprestimo, $novaData);            
        }

        public function excluirEmprestimo($idEmprestimo, $idUsuario){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();
            if($dao->ExcluiEmprestimo($conn,$idEmprestimo, $idUsuario)){
                return "Emprestimo excluido com sucesso!";
            }
            return "falha ao excluir Emprestimo";
        }

    }
