<?php
    include_once '../Persistence/connection.php';
    include_once '../Model/Livro.php';
    include_once '../Persistence/LivroDAO.php';
    
    $isbn = $_POST ['isbn'];
    $titulo = $_POST ['titulo'];
    $anoPublic = $_POST ['anoPublic'];
    $edicao = $_POST ['edicao'];

    $liv = new Livro($isbn, null, $titulo, null, $anoPublic, $edicao);


    $connection = new Connection();
    $conn = $connection->getConnection();

    $dao = new LivroDao();
    $dao->salvarLivro($liv, $conn);   
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