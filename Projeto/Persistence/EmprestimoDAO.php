<?php
include_once '../Model/Emprestimo.php';
class EmprestimoDao {

    function cadastrarEmprestimo($conn, $Emprestimo){
        
        $sql = "CALL insereEmprestimo('".
        $Emprestimo->getNome()."','".
        $Emprestimo->getTipo()."','".
        $Emprestimo->getTelefone()."','".
        $Emprestimo->getEndereco()."','".
        $Emprestimo->getEmail()."','".
        $Emprestimo->getSenha()."','".
        $Emprestimo->getTurma()."','".
        $Emprestimo->getNomeResp()."','".
        $Emprestimo->getTelResp()."','".
        $Emprestimo->getMatricula()."','".
        $Emprestimo->getNasc()."','".
        $Emprestimo->getDataCadastro()."');";
        $conn->query($sql);
    }

    function listarEmprestimos ($conn) {
        $sql = "SELECT * 
        FROM Emprestimo 
        NATURAL JOIN usuario NATURAL JOIN livrosemprestimo NATURAL JOIN livros 
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

    function detalharEmprestimo ($conn, $codEmprestimo){
        $sql = "SELECT * FROM Emprestimo NATURAL JOIN usuario NATURAL JOIN livrosEmprestimo NATURAL JOIN livros
        WHERE idEmprestimo = '$codEmprestimo';";
        $res = $conn->query($sql);
        return $res;
    }

    function alterarEmprestimo($conn, $idUsuario, $idEmprestimo, $nome, $telefone, $email, $endereco, 
    $serie, $turma, $nasc, $nomeResp, $telResp){
        
        $sql = "UPDATE Usuario
        SET nome = '$nome', telefone = '$telefone', email = '$email', endereco = '$endereco', nascimento = '$nasc'
        WHERE idUsuario = $idUsuario";
        $conn->query($sql);
        $sql2 = "UPDATE Emprestimo
        SET turma = '".$serie."-".$turma."', nomeResp = '$nomeResp', telResp = '$telResp'
        WHERE idEmprestimo = $idEmprestimo";
        $conn->query($sql2);
    }

    function pesquisaEmprestimo($conn,$param,$valor){
        $sql = "SELECT * FROM Emprestimo NATURAL JOIN usuario WHERE $param LIKE '%$valor%' ORDER BY nome";
        $res = $conn->query($sql);

        return $res;
    }

    function finalizaEmprestimo($conn, $codEmprestimo){
        $hoje = date("Y-m-d");
        $sql = "UPDATE emprestimo 
        SET dataDevolucao = '$hoje' WHERE idEmprestimo = $codEmprestimo";
        $conn->query($sql);
    }

    function renovaEmprestimo($conn, $codEmprestimo, $dataVencimento){
        $sql = "UPDATE emprestimo 
        SET dataVencimento = '$dataVencimento' WHERE idEmprestimo = $codEmprestimo";
        $conn->query($sql);
    }

    function excluiEmprestimo($conn,$idEmprestimo, $idUsuario){
        $sql = "DELETE FROM Emprestimo WHERE idEmprestimo=$idEmprestimo";
        $sql2 = "DELETE FROM Usuario WHERE idUsuario=$idUsuario";
        if($conn->query($sql)){
            if($conn->query($sql2)){
                return true;
            }            
        }
        return false;      
    }

    function listarLivros($conn, $codEmprestimo){
        $sql = "SELECT * FROM Emprestimo INNER JOIN livros where Emprestimo.idEmprestimo=livros.CodEmprestimo
        AND idEmprestimo = $codEmprestimo;";
        return $conn->query($sql);

    }

    function autenticarEmprestimo($conn, $email){
        $sql = "SELECT *
        FROM Emprestimo
        WHERE email = '$email'";
        $id = $conn->query($sql);
        $res = $id->fetch_assoc();        
        return $res;        
    }
}



?>