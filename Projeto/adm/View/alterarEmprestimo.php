<?php
require './header.php';
include_once '../Controller/emprestimosController.php';


$cod = $_GET['cod'];
$control = new EmprestimoController();
$Emprestimo = $control->detalharEmprestimo($cod);
$reg = $Emprestimo->fetch_assoc();
$dataEmprestimo = date("d/m/Y", strtotime($reg['dataEmprestimo']));
$dataVencimento = date("d/m/Y", strtotime($reg['dataVencimento']));
$dataDevolucao = date("d/m/Y", strtotime($reg['dataDevolucao']));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Empréstimo</title>
</head>

<body style="background-image: url('../img/quadro.jpg');">
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Alterar Emprestimo</span>

    <form method="POST" action="" class="container table-primary">
        <div class="form-group row mb-2 bg-success">
            <div class="col-md-2">
                <label for="exampleInputEmail1">Código Emprestimo</label>
                <input type="number" name="idEmprestimo" value="<?= $cod ?>" hidden>
                <input type="number" class="form-control text-primary font-weight-bold" value="<?= $cod ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Aluno</label>
                <input type="text" name="nome" value="<?= $reg['nome'] ?>" hidden>
                <input type="text" class="form-control" value="<?= $reg['nome'] ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Data do Empréstimo</label>
                <input type="date" name="dataEmprestimo" value="<?= $reg['dataEmprestimo'] ?>">
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Data Vencimento</label>
                <input type="date" name="dataVencimento" value="<?= $reg['dataVencimento'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Livros</label>
                <input type="text" name="livros" class="form-control" value="<?php
                                                                                $livrosEmprestimo =  $control->listarCodigosLivrosEmprestimo($reg['idEmprestimo']);
                                                                                $liv = mysqli_fetch_assoc($livrosEmprestimo);
                                                                                echo $liv['codLivro'];
                                                                                while ($livro = $livrosEmprestimo->fetch_assoc()) {
                                                                                    echo ',' . $livro['codLivro'];
                                                                                }
                                                                                ?>">
            </div>
        </div>
        <button type="reset" class="btn btn-outline-primary">Limpar</button>
        <a onclick="window.history.back()" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg" style="float: right; width: 300px; height: 40px;">Salvar</button>
    </form>
    </div>
</body>

</html>

<?php

if ($_POST) {
    $idEmprestimo = $_POST["idEmprestimo"];
    $novaDataVencimento = $_POST["dataVencimento"];
    $novaDataEmprestimo = $_POST['dataEmprestimo'];
    $novoLivros = $_POST["livros"];
    $control->alterarEmprestimo($idEmprestimo, $novaDataVencimento, $novaDataEmprestimo, $novoLivros);

?>
    <script>
        alert("Emprestimo Alterado")
        window.location.href = "./detalheEmprestimo.php?cod=<?= $idEmprestimo ?>";
    </script>
<?php
}
?>