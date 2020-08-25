<?php
include './header.php';
include_once '../Controller/EditoraController.php';

$param = $_GET;
$chave = key($param);
$valor = $param[$chave];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Exluir Editora</span>
    <?php
    $control = new EditoraController();
    $liv = $control->detalharEditora($valor);
    $reg = $liv->fetch_assoc();
    ?>
    <form method="POST">
        <div class="card container center " style="width: 50%;">
            <div class="card-body  bg-danger font-weight-bold">
                <h5 class="card-title h1">Deseja excluir a editora <?php echo $reg['nomeEditora'] ?></h5>
                <p class="card-text">CNPJ <?php echo $reg['cnpj'] ?></p>
                <p class="card-text">código Editora <?php echo $reg['idEditora']; ?></p>
            </div>
            <div class="card-body bg-dark" id="op">
                <h2 class="text-white">Esta operação é irreversível</h2>
                <input type="hidden" value="<?php echo $reg['idEditora']; ?>" name="cod" />
                <input type='button' id="btn" value='Voltar' onclick='history.go(-2)' />
                <button type="submit" class="btn btn-danger justify-content-end" id="btn1">Excluir</a>
            </div>
    </form>

    <?php

    $val = isset($_POST['cod']) ? $valor = $_POST['cod'] : null;

    if ($val != null) {
        
        $control = new EditoraController();

        $res = $control->excluirEditora($reg['idEditora']);
    ?>
    <div class="container ">
    <h1><?php echo $res . " ' " . $reg['nomeEditora'] . "'" ?></h1>
        <a class='btn btn-primary btn-lg' href='./editoras.php'>Voltar</a>
    </div>
    <script>
        $('#op').hide();
    </script>
    <?php
    }
    ?>
    </div>
</body>

</html>