<?php
include './header.html';
include_once '../Controller/emprestimosController.php';

$cod = $_GET['cod'];
?>
<!doctype html>
<html lang="pt-br">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/compiler/style.css">
    <title>Livros</title>

</head>

<body style="background-image: url('../img/sug.jpg');">
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">FINALIZAR EMPRÉSTIMO
    </span>

    <div class="card w-75 container">
        <div class="card-body">
            <h5 class="card-title">Cofira os títulos emprestados</h5>
            <?php
            $control = new EmprestimoController();

            $livrosEmprestimos = $control->listarLivrosEmprestimo($cod);
            ?>
            <form action="" class="formulario" method="post">
                <input type="text" name="cod" value="<?= $cod?>" hidden>
                <?php
                while ($livro = $livrosEmprestimos->fetch_assoc()) { ?>
                    <li>
                        <input class="chk" type="checkbox" onchange="Inibe()" required>
                        <label for="chk"><?= $livro['codLivro'] ?> - <?= $livro['titulo'] ?></label><br>
                    </li>
                <?php
                }
                ?>
                <button type="submit" value="<?= $cod?>" id="btn" name="btn" class="btn btn-primary">Finalizar
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <script>
        $(document).ready(function() {
            $('#btn').hide();
            $('.chk').on('change', function() {
                var checkbox = $('input:checkbox[class=chk]:checked');
                var offcheck = $('input:checkbox[class=chk]')
                if (checkbox.length == offcheck.length) {
                    $('#btn').show();
                }
            });
        });
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>

<?php
if($_POST){
    unset($_POST);
    $control->finalizaEmprestimo($cod);
    ?>
    <script>
      alert('Emprestimo Finalizado');
        window.location.href = "./emprestimos.php";
    </script><?php
}
?>