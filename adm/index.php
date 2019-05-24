<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100%, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caravan Paradise - Home</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- estilos -->
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Custom fonts-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">





  <?php
  include_once "class/user.php";
  $user = new User();
  $userNome = $user->status();

  include_once "class/setup.php";
  $setup = new Setup();

  include_once "class/util.php";
  $util = new Util();
  $cont = $util->cont();
  ?>

</head>



<body id="page-top">

  <?php $setup->nav_top($userNome); ?>
  <div id="wrapper">
    <?php $setup->nav_lat("home"); ?>
    <div id="content-wrapper">
      <div class="container">
        <!-- Icon Cards-->
        <div class="row">

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-map-marked-alt"></i>

                </div>
                <div class="mr-5"><?= $cont['viagens'] ?> Viagens Cadastradas</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="viagens.php?req=tabela">
                <span class="float-left">Detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-users"></i>
                </div>
                <div class="mr-5"><?= $cont['clientes'] ?> Clientes Cadastrados</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="clientes.php">
                <span class="float-left">Detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon mt-1">
                <i class="fas fa-shopping-cart mr-3"></i>
                </div>
                <div class="mr-5"><?= $cont['pacotes'] ?> Viagens Adquiridas&nbsp;&nbsp;</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pacotes.php">
                <span class="float-left">Detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          


        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>