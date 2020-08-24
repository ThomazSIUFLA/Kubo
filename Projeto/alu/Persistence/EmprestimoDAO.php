<?php
include_once '../Model/Emprestimo.php';

class EmprestimoDao {

    public function CadastrarEmprestimo($conn, $bibl, $aluno, $dataDevolucao,$livrosArray){
        $hoje = date("Y-m-d");
        $sql = "INSERT INTO emprestimo(idUsuario, idBibliotecario, dataEmprestimo, dataVencimento) 
        VALUES ($aluno, $bibl, '$hoje', '$dataDevolucao')";
        $conn->query($sql);
        $idEmp = mysqli_insert_id($conn);
        
        foreach ($livrosArray as $livro){
            $conn->query("INSERT INTO livrosemprestimo(idEmprestimo, codLivro) 
            VALUES ($idEmp,$livro)");
        }
        
        
    }

    public function solicitarEmprestimo($conn, $idUsuario, $livros){

        $sql = "INSERT INTO solicitacao (idUsuario,livros)
        VALUES ($idUsuario, '$livros')";

        $res = $conn->query($sql);        
    }

    public function verificarPendencia($conn, $idUsuario){
        $hoje = date("Y-m-d");
        $sql = "SELECT *
        FROM emprestimo
        WHERE dataVencimento < '$hoje' AND dataDevolucao IS NULL AND idUsuario = $idUsuario";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    public function listarTodosLivros ($conn) {
        $sql = "SELECT * FROM livros ORDER BY titulo;";

        $res = $conn->query($sql);
        return $res;
    }

    public function listarTurmas($conn){
        $sql = "SELECT turma
        FROM aluno
        GROUP BY turma ORDER BY turma";
        $res = $conn->query($sql);
        return $res;
    }

    public function listarAlunos($conn, $turma){
        if ($turma){
            $sql = "SELECT idUsuario, nome
            FROM aluno NATURAL JOIN usuario
            WHERE turma = '$turma'
            ORDER BY nome";
        } else {
            $sql = "SELECT idUsuario, nome
            FROM aluno NATURAL JOIN usuario
            ORDER BY nome";
        }
        $res = $conn->query($sql);
        return $res;
    }

    public function listarEmprestimos ($conn, $idUsuario) {
        $sql = "SELECT * 
        FROM Emprestimo 
        NATURAL JOIN usuario NATURAL JOIN livrosemprestimo NATURAL JOIN livros 
        WHERE idUsuario = $idUsuario
        GROUP BY idEmprestimo
        ORDER BY dataEmprestimo DESC;";

        $res = $conn->query($sql);
        return $res;
    }

    public function listarLivrosEmprestimo($conn, $codEmprestimo){
        $sql = "SELECT codLivro, titulo 
        FROM livros NATURAL JOIN livrosEmprestimo
        WHERE idEmprestimo = $codEmprestimo";
        $res = $conn->query($sql);
        return $res;
    }

    public function listarCodigosLivrosEmprestimo($conn, $codEmprestimo){
        $sql = "SELECT codLivro 
        FROM livros NATURAL JOIN livrosEmprestimo
        WHERE idEmprestimo = $codEmprestimo";
        $res = $conn->query($sql);
        return $res;
    }

    public function detalharEmprestimo ($conn, $codEmprestimo){
        $sql = "SELECT * FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN livrosEmprestimo NATURAL JOIN livros
        WHERE idEmprestimo = '$codEmprestimo';";
        $res = $conn->query($sql);
        return $res;
    }

    public function alterarEmprestimo($conn, $idEmprestimo, $novaDataVencimento, $novaDataEmprestimo, $novoLivros){
        
        $sql = "UPDATE emprestimo
        SET dataVencimento = '$novaDataVencimento' , dataEmprestimo = '$novaDataEmprestimo'
        WHERE idEmprestimo = $idEmprestimo";
        $sql2 = "DELETE FROM livrosemprestimo
        WHERE idEmprestimo = $idEmprestimo";
        $conn->query($sql);
        $conn->query($sql2);
        $livrosArray = explode(",", $novoLivros);

        foreach ($livrosArray as $livro) {
            $conn->query("INSERT INTO livrosemprestimo(idEmprestimo, codLivro) 
            VALUES ($idEmprestimo, $livro)");
        }
    }

    public function pesquisaEmprestimo($conn,$param,$valor){
        if ($valor == 'finalizado'){
            $sql = "SELECT * 
            FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN aluno 
            WHERE dataDevolucao <= dataVencimento
            ORDER BY nome";
        } elseif ($valor == 'comAtraso'){
            $sql = "SELECT * 
            FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN aluno 
            WHERE dataDevolucao > dataVencimento
            ORDER BY nome";            
        } elseif ($valor == 'pendente'){
            $hoje = date("Y-m-d");
            $sql = "SELECT * 
            FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN aluno 
            WHERE dataDevolucao IS NULL
            AND dataVencimento >= '$hoje'
            ORDER BY nome";
        } elseif ($valor == 'atrasado'){
            $hoje = date("Y-m-d");
            $sql = "SELECT * 
            FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN aluno 
            WHERE dataDevolucao IS NULL
            AND dataVencimento < '$hoje'
            ORDER BY nome";
        }  else {
            $sql = "SELECT * 
            FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN aluno 
            WHERE $param 
            LIKE '%$valor%' 
            ORDER BY nome";
        }

        $res = $conn->query($sql);

        return $res;
    }

    

    public function finalizaEmprestimo($conn, $codEmprestimo){
        $hoje = date("Y-m-d");
        $sql = "UPDATE emprestimo 
        SET dataDevolucao = '$hoje' WHERE idEmprestimo = $codEmprestimo";
        $conn->query($sql);
    }

    public function renovaEmprestimo($conn, $codEmprestimo, $dataVencimento){
        $sql = "UPDATE emprestimo 
        SET dataVencimento = '$dataVencimento' WHERE idEmprestimo = $codEmprestimo";
        $conn->query($sql);
    }

    public function excluiEmprestimo($conn,$idEmprestimo){
        $sql = "DELETE FROM livrosEmprestimo WHERE idEmprestimo=$idEmprestimo";
        $sql2 = "DELETE FROM emprestimo WHERE idEmprestimo = $idEmprestimo";
        if($conn->query($sql)){
            if($conn->query($sql2)){
                return true;
            }            
        }
        return false;      
    }

    public function listarLivros($conn, $codEmprestimo){
        $sql = "SELECT * FROM Emprestimo INNER JOIN livros where Emprestimo.idEmprestimo=livros.CodEmprestimo
        AND idEmprestimo = $codEmprestimo;";
        return $conn->query($sql);

    }

}
