<?php
include './header.php';
include_once '../Controller/emprestimosController.php';

$usuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['idUsuario'];

$control = new EmprestimoController();

$pend = $control->verificarPendencia($idUsuario);
if(!$pend){
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
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">SOLICITAR EMPRÉSTIMO
    </span>

    <div class="card w-75 container">
        <div class="card-body">
            <h3 class="card-title text-center">Solicitar novo Empréstimo</h3>
            <form action="" class="" method="post">
                <div class="form-group table-primary row container">
                    <div class="col-md-2">
                        <label for="exampleInputEmail1">Seu Código</label>
                        <input type="text" class="form-control" id="campoNome" name="idUsuario" placeholder="Código" hidden value="<?=$idUsuario?>">
                        <input type="text" class="form-control" id="campoNome" placeholder="Código" value="<?=$idUsuario?>" disabled>
                    </div>
                    <div class="col-md-8">
                        <label for="exampleInputEmail1">Código dos livros, separados por vírgula</label>
                        <input type="text" class="form-control" id="campoLivros" name="livros" placeholder="EX:12,25,45" required>
                        <a onclick="javascript: window.open('./livros.php', 'janela1', 'width=1000, height=300, top=0, left=300');" class="btn btn-outline-info"> pesquisar Livro</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-success justify-contents-end" style="float: right; width: 300px; height: 40px;" value="continuar" id="btn">RESERVAR
                </button>
            </form>
        </div>
    </div>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>

<?php
if ($_POST) {
    $codAluno = $_POST['idUsuario'];
    $livros = $_POST['livros'];
    $control = new EmprestimoController();
    $control->solicitarEmprestimo($idUsuario, $livros);
    ?>
    <script>
        alert('Solicitação efetuada');
        //window.location.href = "./emprestimos.php";
    </script>
    <?php
}
} else {
    die("<script>alert('Você possui pendências\\nPOR FAVOR REGULARIZE SUA SITUAÇÃO');window.location='./emprestimos.php';\n</script>");
}
?>