<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/EmprestimoDAO.php';
    include_once '../Model/Emprestimo.php';
    
    class EmprestimoController{
        public function __construct(){}

        public function cadastrarEmprestimo($bibl, $aluno, $livros, $dataDevolucao){
            $livrosArray = explode(",", $livros);      

            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->CadastrarEmprestimo($conn, $bibl, $aluno, $dataDevolucao,$livrosArray);

        }

        public function alterarEmprestimo($novoidEmprestimo, $novaDataVencimento, $novaDataEmprestimo, $novoLivros){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $dataEmp = date("Y-m-d", strtotime($novaDataEmprestimo));
            $dataVenc = date("Y-m-d", strtotime($novaDataVencimento));
            $dao->alterarEmprestimo($conn, $novoidEmprestimo, $dataVenc, $dataEmp , $novoLivros);
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

        public function listarCodigosLivrosEmprestimo($codEmprestimo){
            $connection = new Connection();
            $conn = $connection->getConnection();
            $dao = new EmprestimoDao();
            $res = $dao->listarCodigosLivrosEmprestimo($conn, $codEmprestimo);
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

        public function listarTurmas(){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();

            $res = $dao->listarTurmas($conn);
            return $res;
        }

        public function listarAlunos($turma){
            $connection = new Connection();
            $conn = $connection->getConnection();   
            $dao = new EmprestimoDao();

            $res = $dao->listarAlunos($conn, $turma);
            return $res;
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
