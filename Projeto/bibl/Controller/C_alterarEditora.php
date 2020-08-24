<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/EditoraDAO.php';
    
    $editora = $_POST;

    $connection = new Connection();
    $conn = $connection->getConnection();

    $dao = new editoraDao();
    $dao->alterarEditora($conn, $editora);   

    header('Location: ../view/editoras.php'); // Error
  
    
?>

