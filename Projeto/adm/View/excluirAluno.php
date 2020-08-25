<?php
include './header.php';
include_once '../Controller/alunosController.php';

$param = $_GET;
$chave = key($param);
$valor = $param[$chave];
echo $valor;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <script src="../node_modules/jquery/dist/jquery.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escluir Aluno</title>

</head>

<body style="background-image: url('../img/quadro.jpg');">
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Exluir Aluno</span>
    <?php
    $control = new AlunosController();
    $liv = $control->detalharAluno($valor);
    $reg = $liv->fetch_assoc();
    ?>
    <form method="POST">
        <div class="card container center" style="width: 50%;">
            <div class="card-body  bg-danger font-weight-bold">
                <h5 class="card-title h1">Deseja excluir o Aluno <?php echo $reg['nome'] ?></h5>
                <p class="card-text">Codigo Usuario <?php echo $reg['idUsuario'] ?></p>
                <p class="card-text">código Aluno <?php echo $reg['idAluno']; ?></p>
            </div>
            <div class="card-body bg-dark" id="op">
                <input type="hidden" value="<?php echo $reg['idAluno']; ?>" name="cod" />
                <input type='button' id="btn" value='Voltar' onclick='history.back()' />
                <button type="submit" class="btn btn-danger justify-content-end" id="btn1">Excluir</a>
            </div>
    </form>

    <?php
    $val = isset($_POST['cod']) ? $valor = $_POST['cod'] : null;

    if ($val != null) {
        $control = new AlunosController();

        $res = $control->excluirAluno($reg['idAluno'], $reg['idUsuario']);
    ?>
        <div class="container custom-range::-ms-fill-upper">
            <h1><?php echo $res . " ' " . $reg['nome'] . "'" ?></h1>
            <a class='btn btn-primary btn-lg' href='./Alunos.php'>Voltar</a>
        </div>


    <?php

    }

    ?>

    </div>
</body>

</html>