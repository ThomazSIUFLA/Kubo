<?php
include_once '../Controller/livrosController.php';
include './header.php';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <title>Biblio.tech</title>
</head>

<body style="background-image: url('../img/sug.jpg');">
  <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">LIVROS
  </span>
  <nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
    <a href="cadastrarLivros.php" class="btn btn-lg btn-primary" role="button">Cadastrar novo</a>

    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
      <div class="form-group col-md-4 mr-auto">
        <select id="inputState" class="form-control" name="param">
          <option value="titulo">Pesquise por.</option>
          <option value="titulo">Título</option>
          <option value="isbn">ISBN</option>
          <option value="codLivro">Código biblioteca</option>
          <option value="autor">Autor</option>
        </select>
      </div>
      <input class="form-control mr-sm-2" type="text" id="pesquisa" name="valor" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
  </nav>
  <?php

  $valor = isset($_POST) ? $valor = $_POST : null;

  $reg = null;
  $res = new LivrosController();
  if (!$valor) {
    $reg = $res->listar();
  } else {
    $reg = $res->pesquisaLivro($valor);
  }
  if ($reg->num_rows > 0) { ?>

    <table class="table table-hover container">
      <thead class="thead-dark">
        <tr>
          <th scope="col">quant Total</th>
          <th scope="col">disponível</th>
          <th scope="col">Código</th>
          <th scope="col">Título</th>
          <th scope="col">Autor</th>
          <th scope="col">Isbn</th>
          <th scope="col">Ano Public.</th>
          <th scope="col">Edição</th>
          <th scope="col">Editora</th>
        </tr>
      </thead>
      <tbody class="table-secondary ">
        <tr><?php

            while ($registro = $reg->fetch_assoc()) {
              $editora = $res->buscaNomeEditora($registro['codLivro']);
              $qtdDisp = $res->buscaDisponiveis($registro['codLivro']);            
            ?>
        <tr>
          
          <td><?= $registro ['quantTotal'] ?></td>
          <td class="font-weight-bold"><?= $qtdDisp ?></td>
          <td class="font-weight-bold"><a href="detalheLivro.php?codLivro=<?php echo $registro['codLivro'] ?>"><?php echo $registro['codLivro'] ?></a></td>
          <td class="font-weight-bold"><a href="detalheLivro.php?codLivro=<?php echo $registro['codLivro'] ?>"><?php echo $registro['titulo'] ?></a></td>
          <td><?= $registro['autor']?></td>
          <td><?php echo $registro['isbn'] ?></td>
          <td><?php echo $registro['anoPublic'] ?></td>
          <td><?php echo $registro['edicao'] ?></td>
          <td><?= $editora ?></td>
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