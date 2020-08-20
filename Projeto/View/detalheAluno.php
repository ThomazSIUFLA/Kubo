<?php
include './header.php';
include_once '../Controller/alunosController.php';

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
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Detalhe do Aluno</span>
<?php
$control = new AlunosController();
$liv = $control->detalharAluno($valor);
$reg = $liv->fetch_assoc();
?>
<div class="card container center col-md-4" style="background: #007bff linear-gradient(180deg, #268fff, #007bff) repeat-x">
  <img src="../img/aluno.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $reg['nome'] ?></h5>
    <p class="card-text">código Geral:  <?php echo $reg['idUsuario'] ?></p>
    <p class="card-text">código aluno:  <?php echo $reg['idAluno'] ?></p>
    <li class="list-group-item font-weight-bold">Matricula:  <?php echo $reg['numMatricula'] ?></li>
  </div>
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Turma:  <?php echo $reg['turma'] ?></li>
    <li class="list-group-item">Telefone:  <?php echo $reg['telefone'] ?></li>
    <li class="list-group-item">email: <?php echo $reg['email'] ?></li>
    <li class="list-group-item">Data nascimento: <?php echo date("d/m/Y", strtotime($reg['nascimento']))?></li>
    <li class="list-group-item">Cadastrado em: <?php echo date("d/m/Y", strtotime($reg['dataCadastro'])) ?></li>
    <li class="list-group-item">Responsável: <?php echo $reg['nomeResp'] ?></li>
    <li class="list-group-item">Telefone Responsável: <?php echo $reg['telResp'] ?></li>
  </ul>
  </div>
  <div class="card-body">
    <a href="./excluirAluno.php?cod=<?php echo $reg['idUsuario']?>" class="card-link btn btn-outline-danger">Excluir</a>
    <a class="card-link btn btn-outline-success" href="./alterarAluno.php?cod=<?php echo $reg['idUsuario'] ?>">Alterar</a>
    <input type='button' class="btn btn-success" value='Voltar' onclick='history.back()' />
  </div>
</div>    
</body>
</html>
