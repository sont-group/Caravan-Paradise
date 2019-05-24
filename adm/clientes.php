<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100%, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caravan Paradise - Clientes</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- estilos -->
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Custom fonts-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- tabela CSS-->
  <link href="tabela/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <?php

  include_once "class/setup.php";
  $setup = new Setup();

  include_once "class/user.php";
  $user = new User();
  $userNome = $user->status();

  ?>
</head>


<body id="page-top">

  <?php $setup->nav_top($userNome); ?>
  <div id="wrapper">
    <?php $setup->nav_lat("clientes"); ?>
    <div id="content-wrapper">
      <!-- Conteudo... -->
      <div class="container">
        <h2>Tabela de Clientes</h2>
        <br>
        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Telefone</th>
                  <th>Cpf</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $setup->tabClientes();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

  <!-- tabela plugin JavaScript-->
  <script src="tabela/datatables/jquery.dataTables.js"></script>
  <script src="tabela/datatables/dataTables.bootstrap4.js"></script>
  <script src="tabela/demo/datatables-demo.js"></script>


</body>

</html>