<?php
require './header.html';
require './footer.html';
include_once '../Controller/editoraController.php';


$cod = $_GET['cod'];
$control = new EditoraController();
$editora = $control->detalharEditora($cod);
$reg = $editora->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Editora</title>
</head>
<body>
<span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Alterar Editora</span>


<form method="POST" action="../Controller/C_alterarEditora.php" class="container">
    <div class="form-group">
        <label for="exampleInputEmail1" >Código da Editora</label>
        <input type="number"  name="idEditora"  value="<?= $cod ?>" hidden>
        <input type="number" class="form-control col-md-1" value="<?= $cod ?>" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nome da editora</label>
        <input type="text" class="form-control" name="nomeEditora" value="<?php echo $reg['nomeEditora'] ?>" required>
    </div>           
    <div class="form-group">
        <label for="exampleInputEmail1">CNPJ</label>
        <input type="text" max-lenght="14" name="cnpj" class="form-control col-md-5 mb-4" placeholder="<?php echo $reg['cnpj'] ?>"value="<?php echo $reg['cnpj'] ?>"required>
        <label for="exampleInputEmail1">Site</label>
        <input type="text" max-lenght="2" name="site" class="form-control col-md-5 mb-4" value="<?php echo $reg['site'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Telefone</label>
        <input type="text" max-lenght="13" name="telefone" class="form-control" value="<?php echo $reg['telefone'] ?>">
        <label for="exampleInputEmail1">email</label>
        <input type="email"  name="email" class="form-control" value="<?php echo $reg['email'] ?>">
    </div>       
    <button type="reset" class="btn btn-outline-primary">Limpar</button>
    <a href="./editoras.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-primary btn-lg" style="float: right; width: 300px; height: 40px;">Salvar</button>
</form>
</div>


    
</body>
</html>