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
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">RENOVAR EMPRÉSTIMO
    </span>

    <div class="card w-75 container">
        <div class="card-body">
            <h5 class="card-title">Títulos emprestados</h5>
            <?php
            $control = new EmprestimoController();

            $livrosEmprestimos = $control->listarLivrosEmprestimo($cod);
            ?>
            <form action="" class="formulario" method="post">
                <input type="text" name="cod" value="<?= $cod ?>" hidden>
                <?php
                while ($livro = $livrosEmprestimos->fetch_assoc()) { ?>
                    <li><?= $livro['codLivro'] ?> - <?= $livro['titulo'] ?></li>
                <?php
                }
                ?>
                <label for="data">Escolha por mais quanto tempo deseja renovar a partir de hoje</label>
                <div>
                    <input type="radio" class="radio" name="tempo" value="10">
                    <label for="10">10 dias</label><br>
                    <input type="radio" class="radio" name="tempo" value="15">
                    <label for="15">15 dias</label><br>
                    <input type="radio" class="radio" name="tempo" value="30">
                    <label for="30">1 mês</label><br>
                    <input type="radio" class="radio" name="tempo" value="0">
                    <label for="escolher">escolher outra data</label>
                </div>
                <div id="calendar">
                    <input type="date" name="data" value="<?php echo date('Y-m-d'); ?>" min="<?= date('Y-m-d')?>" >
                </div>
                <button type="submit" value="<?= $cod ?>" id="btn" name="btn" class="btn btn-success">Renovar
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <script>
        $(document).ready(function() {
            $('#calendar').hide();
            $('#btn').hide();            
            $('.radio').on('change', function() {
                var selectValor = $(this).val();
                $('#btn').show();
                if (selectValor == 0) {
                    $('#calendar').show();
                }else{
                    $('#calendar').hide();
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
/*if ($_POST) {        
    
    $control->renovaEmprestimo($cod, $_POST);
?>
    <script>
        alert('Emprestimo Renovado');
        window.location.href = "./emprestimos.php";
    </script><?php
            }
                */?>