<?php
require './header.php';
include_once '../Controller/alunosController.php';


$cod = $_GET['cod'];
$control = new AlunosController();
$aluno = $control->detalharAluno($cod);
$reg = $aluno->fetch_assoc();
$srtu = $reg['turma'];
$serieTurma = explode("-", $srtu);
$serie = $serieTurma[0];
$turma = $serieTurma[1];
$nasc = date("Y-m-d", strtotime($reg['nascimento']));
$dataCadastro = date("d/m/Y", strtotime($reg['dataCadastro']));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
</head>

<body style="background-image: url('../img/quadro.jpg');">
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Alterar Aluno</span>

    <form method="POST" action="" class="container table-primary">
        <div class="form-group row mb-2 bg-success">
            <div class="col-md-2">
                <label for="exampleInputEmail1">Código Usuario</label>
                <input type="number" name="idUsuario" value="<?= $cod ?>" hidden>
                <input type="number" class="form-control text-primary font-weight-bold" value="<?= $cod ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Código Aluno</label>
                <input type="number" name="idAluno" value="<?= $reg['idAluno'] ?>" hidden>
                <input type="number" class="form-control" value="<?= $reg['idAluno'] ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Número de Matrícula</label>
                <input type="number" name="matricula" value="<?= $cod ?>" hidden>
                <input type="number" class="form-control" value="<?= $reg['numMatricula'] ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Cadastrado em</label>
                <input type="text" name="dataCadastro" value="<?= $dataCadastro ?>" hidden>
                <input type="text" class="form-control" value="<?= $dataCadastro ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" name="name" value="<?php echo $reg['nome'] ?>" required>
            </div>

            <div class="form-group col-md-2">
                <label for="turma">Selecione a Série</label>
                <select id="turma" class="form-control" name="serie" required>
                    <option value="<?= $serie ?>"><?= $serie ?></option>
                    <option value="5">5ª Fundam</option>
                    <option value="6">6ª Fundam</option>
                    <option value="7">7ª Fundam</option>
                    <option value="8">8ª Fundam</option>
                    <option value="9">9ª Fundam</option>
                    <option value="1">1º Médio</option>
                    <option value="2">2º Médio</option>
                    <option value="3">3º Médio</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="turma">Selecione a turma</label>
                <select id="turma" class="form-control" name="turma" required>
                    <option value="<?= $turma ?>"><?= $turma ?></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select>
            </div>
        </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= $reg['telefone'] ?>">
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">email</label>
                <input type="text" name="email" class="form-control " value="<?= $reg['email'] ?>" required>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">data de Nascimento</label>
                <input type="date" name="nascimento" class="form-control" value="<?= $nasc ?>" required>
            </div>
        </div>
        <div class="form-group formulario row table-secondary">
            <div class="col-md-8">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="<?= $reg['endereco'] ?>" required>
            </div>
            <div class="form-group formulario row col-md-12">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Nome responsável</label>
                    <input type="text" name="nomeResp" class="form-control" value="<?= $reg['nomeResp'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="exampleInputEmail1">Telefone Responsável</label>
                    <input type="text" name="telResp" class="form-control" value="<?= $reg['telResp'] ?>" required>
                </div>
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
    $idUsuario = $_POST['idUsuario'];
    $idAluno = $_POST['idAluno'];
    $nome = $_POST['name'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $serie = $_POST['serie'];
    $turma = $_POST['turma'];
    $nasc = $_POST['nascimento'];
    $nomeResp = $_POST['nomeResp'];
    $telResp = $_POST['telResp'];
    $control = new AlunosController();
    $control->alterarAluno(
        $idUsuario,
        $idAluno,
        $nome,
        $telefone,
        $email,
        $endereco,
        $serie,
        $turma,
        $nasc,
        $nomeResp,
        $telResp
    );
?>
    <script>
        alert("Dados Atualizados");
        window.location.href = "./detalheAluno.php?cod=<?= $idUsuario ?>";
    </script>
<?php
}
?>