<?php
include_once '../Persistence/connection.php';
include_once '../Model/Livro.php';
include_once '../Persistence/LivroDAO.php';


$param = isset($_POST['param'])? $param = $_POST['param']:null;
$valor = isset($_POST['valor'])? $valor = $_POST['valor']:null;


$connection = new Connection();
$conn = $connection->getConnection();

$dao = new LivroDao();
$res = $dao->pesquisaLivro($conn, $param, $valor);
return $res;
?>
