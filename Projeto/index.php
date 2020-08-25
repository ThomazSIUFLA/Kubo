<!doctype html>
<html lang="pt-br">

<head>

  <!-- Bootstrap core CSS -->
  <link href="./node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./node_modules/bootstrap/compiler/signin.css" rel="stylesheet">
</head>

<body class="text-center body" style="background-image: url('./bibl/img/sug1.jpg');">

  <div class="form-signin mb-4">
    <form action="./bibl/controller/C_acesso.php" method="POST">
      <img class="mb-4" src="./bibl/img/logo.png" alt="" width="200">
      <h1 class="h3 mb-3 font-weight-400 text-white">LOGIN</h1>
      <label for="inputEmail" class="sr-only">Nome de usuário</label>
      <input type="email" id="inputEmail" class="form-control" name="usuario" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button>
      <a class="btn btn-lg btn-primary btn-block" href="./alu/view/cadastro.php">Cadastrar</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>      
      
    </form>
  </div>
  <nav class="navbar font-weight-bold fixed-bottom navbar-expand-sm navbar-dark bg-dark row justify-content-md-end">
        <p class="text-light">Designed by</p>
        <a class="navbar-brand" href="#">Thomaz &copy</a>
    </nav>
</body>

</html>