<?php
session_start();
ob_start();
include './header.php';

?>

<body style="background-image: url('../img/sug.jpg');">

    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">HOME</span>
    <h1 class="container text-white text-center">Página Inicial</h1>

    <div class="card-deck container m-4 mb-3 text-center">
    <div class="card w-25 m-2">
        <a href="./editoras.php" class="btn btn-outline-primary my-2"><img src="../img/download.png" style="width:250px;height:100px;" alt="va para editoras">
            <h2>vá para editoras</h2>
        </a>
    </div>

    <div class="card w-25 m-2">
        <a href="./livros.php" class="btn btn-outline-primary my-2"><img src="../img/livros.jpg" style="width:250px;height:100px;" alt="va para Livros">
            <h2>vá para Livros</h2>
        </a>
    </div>
    <div class="card w-25 m-2">
        <a href="./alunos.php" class="btn btn-outline-primary my-2"><img src="../img/alunos.jpg" style="width:250px;height:100px;" alt="va para Livros">
            <h2>vá para Alunos</h2>
        </a>
    </div>
    </div>
    <div class="card-deck  m-2 text-center">
    <div class="card w-25 m-2">
        <a href="./emprestimos.php" class="btn btn-outline-primary my-2"><img src="../img/emp.jpg" style="width:250px;height:100px;" alt="va para editoras">
            <h2>vá para Empréstimos</h2>
        </a>
    </div>

    <div class="card w-25 m-2">
        <a href="./livros.php" class="btn btn-outline-primary my-2"><img src="../img/wiki.jpg" style="width:250px;height:100px;" alt="va para Livros">
            <h2>vá para Livros</h2>
        </a>
    </div>
    <div class="card w-25 m-2">
        <a href="./livros.php" class="btn btn-outline-primary my-2"><img src="../img/wiki.jpg" style="width:250px;height:100px;" alt="va para Livros">
            <h2>vá para Alunos</h2>
        </a>
    </div>
    </div>
</body>