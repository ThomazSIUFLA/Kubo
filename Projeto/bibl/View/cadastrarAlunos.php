<?php
include './header.php';
include_once '../Controller/alunosController.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <title>Cadastro de Alunos</title>
</head>

<body>
    <span class="d-block p-2 bg-gradient-dark text-info font-weight-bold h2 text-center">Cadastrar novo aluno</span>

    <form method="POST" action="">
        <div class="row table-primary">
            <label for="serie">Selecione a série</label>
            <div class="form-group col-md-3">
                <select id="turma" class="form-control" name="serie" required>
                    <option value="null">Selecione...</option>
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
            <label for="turma">Selecione a turma</label>
            <div class="form-group col-md-3">
                <select id="turma" class="form-control" name="turma" required>
                    <option value="null">Selecione...</option>
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
        <div class="form-group formulario table-primary row">
            <div class="col-md-8">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Digite o nome do aluno" required>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">Número de Matricula</label>
                <input type="text" max-lenght="10" name="numMatricula" class="form-control" placeholder="Digite o numero de matrícula" required>
            </div>
        </div>
        <div class="form-group formulario table-primary row">
            <div class="col-md-3">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="number" name="telefone" class="form-control" placeholder="Digite o telefone">
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">email</label>
                <input type="text" name="email" class="form-control " placeholder="@email" required>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">data de Nascimento</label>
                <input type="date" name="nascimento" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">Senha</label>
                <input type="password" max-lenght="10" name="senha" class="form-control" placeholder="Digite sua senha" required>
            </div>
        </div>
        <div class="form-group formulario row table-secondary">
            <div class="col-md-4">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" name="rua" class="form-control" placeholder="Logradouro" required>
            </div>
            <div class="col-md-1">
                <label for="exampleInputEmail1">Número</label>
                <input type="number" name="numero" class="form-control" placeholder="00" required>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Complemento</label>
                <input type="text" name="compl" class="form-control" placeholder="Compl.">
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">Bairro</label>
                <input type="text" name="bairro" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="exampleInputEmail1">Cidade</label>
                <input type="text" name="cidade" class="form-control" required>
            </div>
            <div class="form-group formulario row col-md-12">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Nome responsável</label>
                    <input type="text" name="nomeResp" class="form-control" placeholder="nome Responsável" required>
                </div>
                <div class="col-md-4">
                    <label for="exampleInputEmail1">Telefone Responsável</label>
                    <input type="text" name="telResp" class="form-control" placeholder="telefone" required>
                </div>
            </div>
        </div>
        <button type="reset" class="btn btn-outline-primary ml-0">Limpar</button>
        <a onclick="history.back()" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg mr-0" style="float: right; width: 300px; height: 40px;">Salvar</button>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>

<?php
$nome = isset($_POST['name']) ? $_POST['name'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$rua = isset($_POST['rua']) ? $_POST['rua'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$compl = isset($_POST['compl'])? $_POST['compl'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$matricula = isset($_POST['numMatricula']) ? $_POST['numMatricula'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$turma = isset($_POST['turma']) ? $_POST['turma'] : '';
$nasc = isset($_POST['nascimento']) ? $_POST['nascimento'] : '';
$nomeResp = isset($_POST['nomeResp']) ? $_POST['nomeResp'] : '';
$telResp = isset($_POST['telResp']) ? $_POST['telResp'] : '';

if($_POST){
    $control = new AlunosController();
    $control->cadastrarAluno($nome, $telefone, $email, $senha, $rua, $numero, 
    $compl, $bairro, $cidade, $matricula, $serie, $turma, $nasc, $nomeResp, $telResp);
    ?>
    <script>
      if (confirm("Deseja cadastrar outro aluno?")) {
        alert('entre com os dados');
      } else {
        window.location.href = "./alunos.php";
      }
    </script><?php
}
?>