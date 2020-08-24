<?php
    include './header.php';
    include_once '../Controller/editoraController.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>Cadastro de editora</title>
</head>

<body style="background-image: url('../img/quadro.jpg');">    
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Cadastrar editora</span>


    <form method="POST" action="../Controller/C_cadastrarEditora.php" class="container card">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome da editora:</label>
            <input type="text" class="form-control" name="nomeEditora" placeholder="Digite o nome da editora" required>
        </div>      
        <div class="row">     
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1">CNPJ:</label>
                <input type="text" max-lenght="14" name="cnpj" class="form-control col-md-5 mb-4" placeholder="Digite o CNPJ" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" >Telefone:</label>
                <input type="text" max-lenght="2" name="telefone" default="000" class="form-control col-md-5 mb-4" placeholder="Digite o telefone">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" >Site:</label>
                <input type="text" max-lenght="13" name="site" default="000" class="form-control" placeholder="Digite o site">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1">E-mail::</label>
                <input type="email" max-lenght="13" name="email" default="000" class="form-control" placeholder="@ e-mail">
            </div>
        </div>    
        <div class="row justify-content-center">   
            <button type="reset" class="btn btn-outline-primary col-md-3 mb-3 mr-3 ml-2">Limpar</button>
            <a  class="btn btn-secondary col-md-3 mb-3 mr-3 ml-2" onclick='history.go(-1)'>Voltar</a>
            <button type="submit" class="btn btn-primary col-md-3 mb-3 btn-lg mr-3 ml-2" style="float: right; width: 300px; height: 40px;">Salvar</button>
        </div>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>