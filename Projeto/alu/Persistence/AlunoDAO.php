<?php
include_once '../Model/Aluno.php';
class AlunoDao {

    function cadastrarAluno($conn, $aluno){
        
        $sql = "CALL insereAluno('".
        $aluno->getNome()."','".
        $aluno->getTipo()."','".
        $aluno->getTelefone()."','".
        $aluno->getEndereco()."','".
        $aluno->getEmail()."','".
        $aluno->getSenha()."','".
        $aluno->getTurma()."','".
        $aluno->getNomeResp()."','".
        $aluno->getTelResp()."','".
        $aluno->getMatricula()."','".
        $aluno->getNasc()."','".
        $aluno->getDataCadastro()."');";
        $conn->query($sql);
    }

    function listarAlunos ($conn) {
        $sql = "SELECT * FROM Aluno NATURAL JOIN usuario ORDER BY nome;";
        $res = $conn->query($sql);
        return $res;
    }

    function detalharAluno ($conn, $codAluno){
        $sql = "SELECT * FROM Aluno NATURAL JOIN usuario WHERE idUsuario = '$codAluno';";
        $res = $conn->query($sql);
        return $res;
    }

    function alterarAluno($conn, $idUsuario, $idAluno, $nome, $telefone, $email, $endereco, 
    $serie, $turma, $nasc, $nomeResp, $telResp){
        
        $sql = "UPDATE Usuario
        SET nome = '$nome', telefone = '$telefone', email = '$email', endereco = '$endereco', nascimento = '$nasc'
        WHERE idUsuario = $idUsuario";
        $conn->query($sql);
        $sql2 = "UPDATE Aluno
        SET turma = '".$serie."-".$turma."', nomeResp = '$nomeResp', telResp = '$telResp'
        WHERE idAluno = $idAluno";
        $conn->query($sql2);
    }

    function pesquisaAluno($conn,$param,$valor){
        $sql = "SELECT * FROM Aluno NATURAL JOIN usuario WHERE $param LIKE '%$valor%' ORDER BY nome";
        $res = $conn->query($sql);

        return $res;
    }

    function excluiAluno($conn,$idAluno, $idUsuario){
        $sql = "DELETE FROM Aluno WHERE idAluno=$idAluno";
        $sql2 = "DELETE FROM Usuario WHERE idUsuario=$idUsuario";
        if($conn->query($sql)){
            if($conn->query($sql2)){
                return true;
            }            
        }
        return false;      
    }

    function listarLivros($conn, $codAluno){
        $sql = "SELECT * FROM Aluno INNER JOIN livros where Aluno.idAluno=livros.CodAluno
        AND idAluno = $codAluno;";
        return $conn->query($sql);

    }

    function autenticarAluno($conn, $email){
        $sql = "SELECT *
        FROM Aluno
        WHERE email = '$email'";
        $id = $conn->query($sql);
        $res = $id->fetch_assoc();        
        return $res;        
    }
}



?>