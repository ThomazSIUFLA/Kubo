<?php
function cadastrar(){
    echo "iiiiii";
}


    include_once '../Persistence/connection.php';
    include_once '../Model/Editora.php';
    include_once '../Persistence/EditoraDAO.php';
    
    $nome = $_POST ['nomeEditora'];
    $cnpj = $_POST ['cnpj'];
    $telefone = isset($_POST ['telefone']) ? $telefone = $_POST['telefone'] : null;
    $site = isset($_POST ['site']) ? $site = $_POST['site'] : null;
    $email = isset($_POST ['email']) ? $email = $_POST['email'] : null;

    $edit = new Editora($cnpj,$nome,$email,$telefone,$site);
    
    $connection = new Connection();
    $conn = $connection->getConnection();

    $dao = new EditoraDao();
    $dao->salvarEditora($edit, $conn);   

   // header('Location: ../view/cadastrarEditora.php');
?>


