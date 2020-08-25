<?php
include './header.php';
include_once '../Controller/emprestimosController.php';
include_once '../Controller/livrosController.php';

if (!isset($_SESSION)) {
    session_start();
}

$usuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['idUsuario'];

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
    <title>Emprestimos</title>

</head>

<body style="background-image: url('../img/sug.jpg');">
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">CADASTRAR EMPRÉSTIMO
    </span>

    <div class="card w-75 container">
        <div class="card-body">
            <h3 class="card-title text-center">Cadastrar novo Empréstimo ETAPA-1</h3>

            <form action="" class="formulario" method="post">
                <p class="card-sub-title text-center">Selecione o aluno</p>
                <div class="row">
                    <div id="alunoSelect" class="col-md-5">
                        <p class="card-sub-title">Selecione a turma do aluno</p>
                        <select id="turma" class="form-control mb-3 ml-2">
                            <option value="">Todas turmas</option>
                            <?php
                            $control = new EmprestimoController();

                            $turmas = $control->listarTurmas();
                            while ($row = mysqli_fetch_assoc($turmas)) {
                            ?><a href="./cadastrarEmprestimo?turma=<?= $row['turma'] ?>">
                                    <option value="<?= $row['turma'] ?>">
                                        <?= $row['turma'] ?></option>
                                </a>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <?php
                        if ($_GET) {
                            echo "<p>Lista de alunos da Turma {$_GET['turma']}</p>";
                        } else {
                            echo "<p>Lista com todos alunos</p>";
                        }
                        ?>

                        <select id="alu" class="form-control mb-3 ml-2" name="aluno" required>
                            <option value="">Selecione...</option>
                            <?php

                            $alunos = $control->listarAlunos($_GET['turma']);
                            while ($row = mysqli_fetch_assoc($alunos)) {
                            ?>
                                <option value="<?= $row['idUsuario'] ?>"><?= $row['idUsuario'] . ' - ' . $row['nome'] ?></option>

                            <?php } ?>
                        </select>
                        Entre com o código dos Livros separados por ,
                        <input type="text" name="livros" id="livrosEmp" placeholder="EX: 1,2,5,78,54" require>
                        <a onclick="javascript: window.open('./livros.php', 'janela1', 'width=1000, height=300, top=0, left=300');" class="btn btn-outline-info"> pesquisar Livro</a>
                    </div>
                </div>

        </div>
        <button type="submit" class="btn btn-success justify-contents-end" style="float: right; width: 300px; height: 40px;" value="continuar" id="btn">CONTINUAR</button>
        </form>
        <div id="lista">
        <h3 class="card-title text-center">Títulos Selecionados</h3>
        <ul>
            <?php
            if ($_POST['aluno']) {
                $aluno = $_POST['aluno'];
                $livros = $_POST['livros'];
                $livrosArray = explode(",", $livros);

                $livroControl = new LivrosController();
            ?>
                <table title="<?= $aluno ?>">
                    <thead>
                        <th>livro</th>
                        <th>código</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach ($livrosArray as $li) {
                                $r = $livroControl->detalharLivro($li);
                                $reg = mysqli_fetch_assoc($r);
                                if ($reg) {
                                    echo "<td>{$reg['codLivro']}</td>";
                                    echo "<td>{$reg['titulo']}</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <a href="" class="btn btn-primary">Salvar</a>

        </div>
        
        <?php

            }
        }
        ?>
        </ul>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <script>

    </script>
    <script>
        $(document).ready(function() {
            $('#btn').hide();
            $('#lista').hide();
            var query = location.search.slice(1);
            var partes = query.split('&');
            partes.forEach(function(parte) {
                var chaveValor = parte.split('=');
                var chave = chaveValor[0];
                var valor = chaveValor[1];
                $('#turma').val(valor);
            });
            $("#alu").change(function() {
                aluno = $(this).val();
                if (aluno) {
                    $('#btn').show();
                    $('#lista').show();
                } else {
                    $('#btn').hide();
                    $('#lista').hide();
                }
            });
            $("#turma").change(function() {
                turma = $(this).val();
                window.location.href = "./cadastrarEmprestimo.php?turma=" + turma;
            });
        });
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>