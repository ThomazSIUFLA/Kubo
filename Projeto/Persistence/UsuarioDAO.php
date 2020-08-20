<?php

class usuarioDao {

    function salvarusuario($edit, $conn){
        $sql = "INSERT INTO usuario(cnpj, nomeusuario, telefone, email, site) VALUES ('".
        $edit->getCnpj() ."','" . 
        $edit->getNome()."','" .
        $edit->getTelefone()."','" .
        $edit->getEmail()."','" .
        $edit->getSite() . "');";
        $conn->query($sql);
    }

    function listarusuarios ($conn) {
        $sql = "SELECT * FROM usuario ORDER BY nomeusuario;";
        $res = $conn->query($sql);
        return $res;
    }

    function detalharusuario ($conn, $codusuario){
        $sql = "SELECT * FROM usuario WHERE idusuario = '$codusuario';";
        $res = $conn->query($sql);
        return $res;
    }

    function alterarusuario($conn, $usuario){
        $cod = (int)$usuario ['idusuario'];
        $nome = $usuario['nomeusuario'];
        $cnpj = $usuario['cnpj'];
        $site = $usuario['site'];
        $email = $usuario['email'];
        $tel = $usuario ['telefone'];

        $sql = "UPDATE usuario SET email='$email', nomeusuario='$nome', site='$site', cnpj='$cnpj', telefone='$tel' WHERE idusuario=$cod";

        $conn->query($sql);
    }

    function pesquisausuario($conn,$param,$valor){
        $sql = "SELECT * FROM Usuario WHERE $param LIKE '%$valor%'";
        $res = $conn->query($sql);

        return $res;
    }

    function excluiUsuario($conn,$cod){
        $sql = "DELETE FROM Usuario WHERE idUsuario=$cod";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }        
    }

    function listarLivros($conn, $codUsuario){
        $sql = "SELECT * FROM Usuario INNER JOIN livros where Usuario.idUsuario=livros.CodUsuario
        AND idUsuario = $codUsuario;";
        return $conn->query($sql);

    }

    function autenticarUsuario($conn, $email){
        $sql = "SELECT *
        FROM usuario
        WHERE email = '$email'";
        $id = $conn->query($sql);
        $res = $id->fetch_assoc();        
        return $res;        
    }
}



?>