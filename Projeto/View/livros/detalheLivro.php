<?php
include './header.html';
include './footer.html';
include_once '../Controller/livrosController.php';

$param = $_GET;
$chave = key($param);
$valor = $param[$chave];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Detalhe do Livro</span>
<?php
$control = new LivrosController();
$liv = $control->detalharLivro($valor);
$reg = $liv->fetch_assoc();
?>
<div class="card container center" style="width: 18rem;">
  <img src="../img/wiki.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $reg['titulo'] ?></h5>
    <p class="card-text">código ISBN <?php echo $reg['isbn'] ?></p>
    <p class="card-text">código Biblioteca <?php echo $reg['codLivro'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Editora <?php echo $reg['codEditora'] ?></li>
    <li class="list-group-item">Edição <?php echo $reg['edicao'] ?></li>
    <li class="list-group-item">Publicado em <?php echo $reg['anoPublic'] ?></li>
  </ul>
  <div class="card-body">
    <a href="./excluirLivro.php?cod=<?php echo $reg['codLivro']?>" class="card-link">Excluir</a>
    <a class="card-link" href="./alterarLivro.php?cod=<?php echo $reg['codLivro'] ?>">Alterar</a>
    <input type='button' value='Voltar' onclick='history.go(-1)' />
  </div>
</div>    
</body>
</html>
