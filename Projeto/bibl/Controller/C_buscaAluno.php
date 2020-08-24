<?php
include_once '../Persistence/connection.php';

$connection = new Connection();
$conn = $connection->getConnection();

$livros = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);
//$busca = $_POST['busca'];
$res = mysqli_query($conn, "SELECT codLivro, titulo
FROM livros WHERE titulo LIKE '%$livros%' ORDER BY titulo");

$num = mysqli_num_rows($res);

if($num > 0){
    while($row = mysqli_fetch_assoc($res)){
        echo $row['codLivro']." - ".$row['titulo']."<button onclick='javascript: enche(".$row['titulo'].")'class='btn btn-outline-primary 
        justify-content-end btn-sm mb-2' id='sel' value=".$row['codLivro'].">adicionar</button><br>";
    }
} else {
    echo "Livro Não encontrado";
}