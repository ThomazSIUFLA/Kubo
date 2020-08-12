<?php
include './header.html';
include './footer.html';
include_once '../Controller/livrosController.php';
include_once '../Controller/C_pesquisaLivro.php';
?>
<!doctype html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/style.css">
    <title>Livros</title>
</head>

<body>
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">LIVROS
</span>
<nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
<a href="./cadastrarLivros.php" class="btn btn-lg btn-primary" role="button">Cadastrar novo</a>
    
    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
    <div class="form-group col-md-4 mr-auto">
      <select id="inputState" class="form-control" name="param">
        <option value="titulo">Pesquise por.</option>
        <option value="titulo">Título</option>
        <option value="isbn">ISBN</option>
        <option value="cod">Código biblioteca</option>
        <option value="autor">Autor</option>
        <option value="editora">Editora</option>
      </select>
    </div>
      <input class="form-control mr-sm-2" type="text" id="pesquisa" name="valor" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php

$valor = isset($_POST)?$valor=$_POST:null;

$reg = null;
$res = new LivrosController();
if(!$valor){    
    $reg = $res->listar();
}else{
    $reg = $res->pesquisaLivro($valor);
}    
    if ($reg->num_rows > 0){?>
    
        <table class="table container">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Título</th>
      <th scope="col">Isbn</th>
      <th scope="col">Ano Public.</th>
      <th scope="col">Edição</th>
    </tr>
  </thead><tbody class="table-secondary">
    <tr><?php
        while($registro = $reg->fetch_assoc()){?>
            <tr>
            <td><a href="./detalheLivro.php?codLivro=<?php echo $registro['codLivro']?>"><?php echo $registro['codLivro']?></a></td>
            <td><a href="./detalheLivro.php?codLivro=<?php echo $registro['codLivro']?>""><?php echo $registro['titulo']?></a></td>
            <td><?php echo $registro['isbn']?></td>
            <td><?php echo $registro['anoPublic']?></td>
            <td><?php echo $registro['edicao']?></td>
            </tr><?php
        }
    }else{
        echo "<h1>NÂO EXISTE REGISTROS</h1>";
    }

?>
    
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>