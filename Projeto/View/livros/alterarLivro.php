<?php
require './header.html';
require './footer.html';
include_once '../Controller/livrosController.php';


$cod = $_GET['cod'];
$control = new LivrosController();
$livro = $control->detalharLivro($cod);
$reg = $livro->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
</head>
<body>
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Alterar Livro</span>


<form method="POST" action="../Controller/c_cadastrar_livros.php" class="container">
    <div class="form-group">
        <label for="exampleInputEmail1">Código Biblioteca</label>
        <input type="number" class="form-control col-md-1" name="codLivro"  value=<?php echo $reg['codLivro'] ?>>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Título do Livro</label>
        <input type="text" class="form-control" name="titulo" value="<?php echo $reg['titulo'] ?>" required>
    </div>           
    <div class="form-group">
        <label for="exampleInputEmail1">Ano de publicação</label>
        <input type="number" max-lenght="4" name="anoPublic" min="1900" max="2030" class="form-control col-md-5 mb-4" placeholder="<?php echo $reg['anoPublic'] ?>">
        <label for="exampleInputEmail1">Edição</label>
        <input type="number" max-lenght="2" name="edicao" class="form-control col-md-5 mb-4" value="<?php echo $reg['edicao'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">isbn</label>
        <input type="text" max-lenght="13" name="isbn" class="form-control" value="<?php echo $reg['isbn'] ?>" required>
    </div>       
    <button type="reset" class="btn btn-outline-primary">Limpar</button>
    <a href="./livros.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-primary btn-lg" style="float: right; width: 300px; height: 40px;">Salvar</button>
</form>
</div>

    
</body>
</html>