<?php
include './header.php';
include_once '../Controller/EditoraController.php';

$edit = $_GET['cod'];
$control = new EditoraController();
$res = $control->detalharEditora((int)$edit);
$editora = mysqli_fetch_assoc($res);

?>
<!doctype html>
<html lang="pt-br">


<body>
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Livros da editora<?= $editora['nomeEditora']?>
</span>
<nav class=" container navbar navbar-expand-md navbar-dark bg-dark">
<input type='button' value='Voltar' onclick='history.go(-1)' />
    
    <form class="form-inline my-2 my-lg-0 ml-auto" method="POST" action="">
    <div class="form-group col-md-4 mr-auto">
      <select id="inputState" class="form-control" name="param">
        <option value="titulo">Pesquise por.</option>
        <option value="titulo">Título</option>
        <option value="isbn">ISBN</option>
        <option value="cod">Código biblioteca</option>
        <option value="autor">Autor</option>
      </select>
    </div>
      <input class="form-control mr-sm-2" type="text" id="pesquisa" name="valor" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php

$valor = isset($_POST)?$valor=$_POST:null;
$reg = $control->listarLivros($editora['idEditora']);;
   
    if ($reg->num_rows > 0){?>
    
        <table class="table container">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Título</th>
      <th scope="col">Isbn</th>
      <th scope="col">Ano Public.</th>
      <th scope="col">Edição</th>
      <th scope="col">Editora</th>
    </tr>
  </thead><tbody class="table-secondary">
    <tr><?php
    
        while($registro = $reg->fetch_assoc()){;?>
            <tr>
            <td><a href="./detalheLivro.php?codLivro=<?php echo $registro['codLivro']?>"><?php echo $registro['codLivro']?></a></td>
            <td><a href="./detalheLivro.php?codLivro=<?php echo $registro['codLivro']?>""><?php echo $registro['titulo']?></a></td>
            <td><?php echo $registro['isbn']?></td>
            <td><?php echo $registro['anoPublic']?></td>
            <td><?php echo $registro['edicao']?></td>
            <td><?php echo $registro['nomeEditora']?></td>
            </tr><?php
        }
    }else{
        echo "<h1 class='container'>NÃO EXISTE REGISTROS</h1>";
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