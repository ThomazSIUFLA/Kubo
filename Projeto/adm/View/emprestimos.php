<?php
include './header.php';
include_once '../Controller/emprestimosController.php';
?>
<!doctype html>
<html lang="pt-br">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="../../node_modules/bootstrap/compiler/style.css">
  <title>Livros</title>
</head>

<body style="background-image: url('../img/sug.jpg');">
  <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">EMPRÉSTIMOS
  </span>
  <nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
    <a href="./cadastrarEmprestimo.php" class="btn btn-lg btn-primary m-2" role="button">Criar novo</a>
    <a href="" class="btn btn-primary m-2" role="button">Ver Solicitações</a>
    <div>

    </div>

    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
      <div class="form-group col-md-3 mr-auto">
        <select id="inputState" class="form-control" name="param">
          <option value="nome">Pesquise por...</option>
          <option value="idEmprestimo">código Empréstimo</option>
          <option value="nome">Nome do Aluno</option>
          <option value="turma">Turma</option>
          <option value="situacao">Situação</option>
          <option value="codLivro">Código Livro</option>
          <option value="titulo">Titulo do Livro</option>
          <option value="dataEmprestimo">Data Empréstimo</option>
          <option value="dataVencimento">Data Vencimento</option>
          <option value="dataDevolucao">Data Devolução</option>
        </select>
      </div>
      <div id="situacao" class="container col-md-6 ml-auto">
        <div class="form-group ">
          <select id="status" class="form-control" name="status">
            <option value="finalizado">FINALIZADO</option>
            <option value="comAtraso">FINALIZADO COM ATRASO</option>
            <option value="pendente">PENDENTE</option>
            <option value="atrasado">ATRASADO</option>
          </select>
        </div>
      </div>
      <div id="escolheTurma" class="container col-md-6 ml-auto">
        <div class="form-group ">
          <select id="turm" class="form-control" name="serie">
            <option value="5">5ª Fundam</option>
            <option value="6">6ª Fundam</option>
            <option value="7">7ª Fundam</option>
            <option value="8">8ª Fundam</option>
            <option value="9">9ª Fundam</option>
            <option value="1">1º Médio</option>
            <option value="2">2º Médio</option>
            <option value="3">3º Médio</option>
          </select>
        </div>
        <div class="form-group ">
          <select id="turma" class="form-control" name="turma">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
          </select>
        </div>
      </div>
      <input class="form-control mr-sm-2" type="text" id="pesquisa" name="valor" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
  </nav>

  <?php

  $valor = isset($_POST) ? $valor = $_POST : null;

  $reg = null;
  $control = new EmprestimoController();
  if (!$valor) {
    $reg = $control->listar();
  } else {
    $reg = $control->pesquisaEmprestimo($valor);
  }
  if ($reg->num_rows > 0) {
  ?>

    <table class="table table-hover container">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Aluno</th>
          <th scope="col">Livro</th>
          <th scope="col">Data do Empréstimo</th>
          <th scope="col">Data Vencimento</th>
          <th scope="col">Data Devolvido</th>
          <th scope="col">SITUAÇÂO</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        <tr><?php

            while ($registro = $reg->fetch_assoc()) { ?>

        <tr>
          <td>
            <?php echo $registro['idEmprestimo'] ?>
            <a href="./detalheEmprestimo.php?codEmpr=<?= $registro['idEmprestimo'] ?>" class="btn btn-sm btn-primary m-2">Ver Detalhes</a>
          </td>

          <td><?php echo $registro['nome'] ?></td>
          <td>
            <?php
              $livros = $control->listarLivrosEmprestimo($registro['idEmprestimo']);
            ?>
            <div>
              <?php while ($liv = $livros->fetch_assoc()) { ?>
                <?= $liv['codLivro'] . '-' . $liv['titulo'] ?><br>
              <?php
              }
              ?>
            </div>
          <td><?php echo date('d/m/Y', strtotime($registro['dataEmprestimo'])) ?></td>
          <td><?php echo date('d/m/Y', strtotime($registro['dataVencimento'])) ?></td>
          <td>
            <?php if ($registro['dataDevolucao']) {
                echo date('d/m/Y', strtotime($registro['dataDevolucao']));
              } ?></td></area>
          <td class=" font-weight-bold">
            <?php
              if ($registro['dataDevolucao']) {
                if ($registro['dataDevolucao'] <= $registro['dataVencimento']) {
                  echo "<p class='text-success'>FINALIZADO</p>";
                } else {
                  echo "<p class='text-info'>FINALIZADO COM ATRASO</p>";
                }
              } else {
                if ((strtotime($registro['dataVencimento'])) >= strtotime(date('Y-m-d'))) {
                  echo "<p class='text-warning'>PENDENTE</p>";
                } else {
                  echo "<p class='text-danger'>ATRASADO</p>";
                }
                echo "<a href='./finalizarEmprestimo.php?cod=" . $registro['idEmprestimo'] . "' class='btn btn-sm btn-outline-primary m-2'>finalizar</a>";
                echo "<a href='./renovarEmprestimo.php?cod=" . $registro['idEmprestimo'] . "' class='btn btn-sm btn-outline-success m-2'>renovar</a>";
              }
            ?>
          </td>
        </tr>
    <?php
            }
          } else {
            echo "<h1>NÂO EXISTE REGISTROS</h1>";
          }

    ?>

      </tbody>
    </table>

    <!-- Optional JavaScript -->
    <script>
      $(document).ready(function() {
        $('#escolheTurma').hide();
        $('#situacao').hide()
        $('#inputState').on('change', function() {
          var selectValor = $(this).val();
          if (selectValor == 'turma') {
            $('#escolheTurma').show();
            $('#pesquisa').hide();
            $('#situacao').hide();
          } else if (selectValor == 'situacao') {
            $('#escolheTurma').hide();
            $('#pesquisa').hide();
            $('#situacao').show();
          } else {
            $('#escolheTurma').hide();
            $('#pesquisa').show();
            $('#situacao').hide();
          }
        });
      });
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>