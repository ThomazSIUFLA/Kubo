<?php
include './header.php';
include_once '../Controller/EditoraController.php';

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

<body style="background-image: url('../img/quadro.jpg');">
  <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Detalhe da Editora</span>
  <?php
  $control = new EditoraController();
  $liv = $control->detalharEditora($valor);

  $reg = $liv->fetch_assoc();

  ?>
  <div class="card container center col-md-4" style="background: #007bff linear-gradient(180deg, #268fff, #007bff) repeat-x">
    <img src="../img/download.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $reg['nomeEditora'] ?></h5>
      <p class="card-text">CNPJ:<?php echo $reg['cnpj'] ?></p>
      <p class="card-text">código da Editora <?php echo $reg['idEditora'] ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">@ email <?php echo $reg['email'] ?></li>
      <li class="list-group-item">Telefone <?php echo $reg['telefone'] ?></li>
      <li class="list-group-item">Site <?php echo $reg['site'] ?></li>
    </ul>
    <div class="card-body">
      <a href="./excluirEditora.php?cod=<?php echo $reg['idEditora'] ?>" class="card-link btn btn-outline-danger">Excluir</a>
      <a class="card-link btn btn-outline-success" href="./alterarEditora.php?cod=<?php echo $reg['idEditora'] ?>">Alterar</a>
      <input type='button' value='Voltar' class="btn btn-success" onclick='history.back()' />
    </div>
  </div>
</body>

</html>