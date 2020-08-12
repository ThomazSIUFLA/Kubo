<?php
    include_once '../Controller/livrosController.php';
    include './header.html';
    include './footer.html';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/compiler/style.css">

    <title>Cadastro de livros</title>
</head>

<body>    
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Cadastrar novo livro</span>


    <form method="POST" action="../Controller/livrosController.php" class="container">
        <div class="form-group">
            <label for="exampleInputEmail1">Título do Livro</label>
            <input type="text" class="form-control" name="titulo" placeholder="Digite o nome do livro" required>
        </div>           
        <div class="form-group">
            <label for="exampleInputEmail1">Ano de publicação</label>
            <input type="number" max-lenght="4" name="anoPublic" min="1900" max="2030" class="form-control col-md-5 mb-4" placeholder="Digite o ano de Publicação" required>
            <label for="exampleInputEmail1">Edição</label>
            <input type="number" max-lenght="2" name="edicao" class="form-control col-md-5 mb-4" placeholder="Digite a edição" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">isbn</label>
            <input type="text" max-lenght="13" name="isbn" class="form-control" placeholder="Digite o código ISBN" required>
        </div>       
        <button type="reset" class="btn btn-outline-primary">Limpar</button>
        <a href="./livros.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg" style="float: right; width: 300px; height: 40px;">Salvar</button>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>