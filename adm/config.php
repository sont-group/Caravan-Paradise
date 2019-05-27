<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100%, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caravan Paradise - Configuções</title>

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
              <input name='nome' id="nome" class="form-control" placeholder="Nome" required="required">
              <label for="nome">Nome</label>
            </div>

            <div class="form-label-group mt-2">
              <input type="email" name='email' id="email" class="form-control" placeholder="Email" required="required">
              <label for="email">Email</label>
            </div>

            <div class="form-label-group mt-2">
              <input name='cpf' id="cpf" class="form-control" placeholder="CPF" required="required">
              <label for="cpf">CPF</label>
            </div>

            <div class="form-label-group mt-2">
              <input type="password" name='senha' id="senha" class="form-control" placeholder="Senha" required="required">
              <label for="senha">Senha</label>
            </div>

            <div class="form-label-group mt-2">
              <input type="password" name='novasenha' id="novasenha" class="form-control" placeholder="Nova Senha" required="required">
              <label for="novasenha">Nova senha (opcional)</label>
            </div>

          </div>




          <button class="btn btn-primary btn-block mt-4" type="submit">Confirmar</button>
        </form>
      
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>