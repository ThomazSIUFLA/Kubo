<?php
include_once '../Controller/UsuariosController.php';
include './header.php';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="../node_modules/bootstrap/compiler/style.css">

  <title>Usuarios</title>
</head>

<body style="background-image: url('../img/sug.jpg');">
  <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">USUÁRIOS
  </span>
  <nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
    <a href="./cadastraralunos.php" class="btn btn-lg btn-primary" role="button">Cadastrar novo</a>

    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
      <div class="form-group col-md-4 mr-auto">
        <select id="inputState" class="form-control" name="param">
          <option value="nome">Pesquise por.</option>
          <option value="nome">Nome</option>
          <option value="idUsuario">Código Usuario</option>
        </select>
      </div>
      <input class="form-control mr-sm-2" type="text" id="pesquisa" name="valor" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
  </nav>
  <?php

  $valor = isset($_POST) ? $_POST : null;

  $reg = null;
  $res = new usuariosController();
  if (!$valor) {
    $reg = $res->listar();
  } else {
    $reg = $res->pesquisaUsuario($valor);
  }
  if ($reg->num_rows > 0) { ?>

    <table class="table table-hover container">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Nome</th>
          <th scope="col">Tipo</th>
          <th scope="col">Telefone</th>
          <th scope="col">email</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        <tr><?php

            while ($registro = $reg->fetch_assoc()) {; ?>
        <tr>
          <td class="font-weight-bold"><a href="./detalhealuno.php?codaluno=<?php echo $registro['idUsuario'] ?>"><?php echo $registro['idUsuario'] ?></a></td>
          <td class="font-weight-bold"><a href="./detalhealuno.php?codaluno=<?php echo $registro['idUsuario'] ?>"><?php echo $registro['nome'] ?></a></td>
          <td><?php echo $registro['telefone'] ?></td>
          <td><?php echo $registro['email'] ?></td>
        </tr><?php
            }
          } else {
            echo "<h1 class='text-white text-center container bg-dark'>NÃO EXISTE REGISTROS</h1>";
          }

              ?>

      </tbody>
    </table>


</body>

</html>