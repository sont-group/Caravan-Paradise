<?php


if(isset($_GET['login'])){
  $op = $_GET['login'];
}else{
  $op = "login";
}


if ($op == "login") {
  ?>


  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caravan Paradise - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- estilos -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Custom fonts-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">


  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post" action="login.php?login=sim">
            <div class="form-group">
              <div class="form-label-group">
                <input name='login' id="inputEmail" class="form-control" placeholder="Login" required="required" autofocus="autofocus">
                <label for="inputEmail">Login</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group ">
                <input name='senha' type="password" id="senha" class="form-control" placeholder="Senha" required="required">
                <label for="senha">Senha</label>
              </div>
            </div>
          
  
            <button class="btn btn-primary btn-block mt-4" type="submit">Confirmar</button>
          </form>
          <div class="text-center">
           <!-- <a class="d-block small mt-3" href="register.html">Registar Conta</a> -->
           <br>
            <a onclick="javascript:alert('Enviaremos um email para alteração da senha')"class="d-block small" href="">Esqueceu a Senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

  </body>

  </html>
<?php
}

if ($op == 'sim') {
  include_once "class/user.php";
  $user = new User();

  session_start();
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  if ($user->check($login, $senha)[0]) {
    $_SESSION['caravanlogin'] = $login;
    $_SESSION['caravansenha'] = $senha;
    echo "<script>location.href = 'index.php'</script>";
  } else {
    unset($_SESSION['caravanlogin']);
    unset($_SESSION['caravansenha']);
    echo "<script>javascript:alert('Não foi possivel realizar o Login\\nPor favor, verifique seu login e senha')</script>";
    echo "<script>javascript:history.go(-1)</script>";
  }
}
if ($op == 'nao') {
  session_start();
  session_destroy();
  echo "<script>location.href = 'login.php'</script>";
}
?>