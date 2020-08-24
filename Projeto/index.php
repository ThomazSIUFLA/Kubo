<!doctype html>
<html lang="pt-br">
<!--3380074-->
<head>

  <!-- Bootstrap core CSS -->
  <link href="./bibl/node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
</head>

<body class="text-center body">

  <div class="container">
    <form action="./bibl/controller/C_acesso.php" method="POST">
      <img class="mb-4" src="./img/logo.png" alt="" width="200">
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
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </div>
  <nav class="navbar font-weight-bold fixed-bottom navbar-expand-sm navbar-dark bg-dark row justify-content-md-end">
        <p class="text-light">Designed by</p>
        <a class="navbar-brand" href="#">Thomaz &copy</a>
    </nav>
</body>

</html>