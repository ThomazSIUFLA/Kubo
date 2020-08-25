<?php
include './header.php';
include_once '../Controller/editoraController.php';
include_once '../Controller/C_pesquisaEditora.php';
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
    <title>Editoras</title>
</head>

<body style="background-image: url('../img/sug.jpg');">
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">EDITORAS
</span>
<nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
<a href="./cadastrarEditora.php" class="btn btn-lg btn-primary" role="button">Cadastrar nova</a>
    
    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
    <div class="form-group col-md-4 mr-auto">
      <select id="inputState" class="form-control" name="param">
        <option value="nomeEditora">Pesquise por.</option>
        <option value="nomeEditora">Nome</option>
        <option value="telefone">Telefone</option>
        <option value="cnpj">CNPJ</option>
        <option value="email">email</option>
        <option value="codEditora">Código da editora</option>
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
$res = new EditoraController();
if(!$valor){    
    $reg = $res->listarEditoras();
}else{
    $reg = $res->pesquisaEditora($valor);
}    
    if ($reg->num_rows > 0){?>
    
        <table class="table table-hover container">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">CNPJ</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Site</th>
      <th scope="col"></th>
    </tr>
  </thead><tbody class="table-secondary">
    <tr><?php
        while($registro = $reg->fetch_assoc()){?>
            <tr>
            <td><a href="./detalheEditora.php?codEditora=<?php echo $registro['idEditora']?>"><?php echo $registro['idEditora']?></a></td>
            <td><a href="./detalheEditora.php?codEditora=<?php echo $registro['idEditora']?>"><?php echo $registro['nomeEditora']?></a></td>
            <td><?php echo $registro['cnpj']?></td>
            <td><?php echo $registro['email']?></td>
            <td><?php echo $registro['telefone']?></td>
            <td><a href="<?php echo $registro['site']?>"></a><?php echo $registro['site']?></td>
            <td><a href="./editoraVerLivros.php?cod=<?= $registro['idEditora']?>">Ver livros</a></td>
            </tr><?php
        }
    }else{
        echo "<h1 class='text-white text-center container bg-dark'>NÃO EXISTE REGISTROS</h1>";
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