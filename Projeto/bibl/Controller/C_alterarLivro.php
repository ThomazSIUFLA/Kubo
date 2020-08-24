<?php
    include_once '../Persistence/connection.php';
    include_once '../Persistence/LivroDAO.php';
    
    $livro = $_POST;
    


    $connection = new Connection();
    $conn = $connection->getConnection();

    $dao = new LivroDao();
    $dao->alterarLivro($conn, $livro);   
    
    header('Location: ../view/livros.php'); // Error

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../view/livros.php" class="btn btn-primary">voltar</a>
</body>
</html>
