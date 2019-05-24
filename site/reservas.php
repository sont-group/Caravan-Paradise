<?php
if (isset($_GET['cv'])) {
    $op = $_GET['cv'];
} else {
    $op = "reservas";
}

if ($op == "reservas") {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=100%, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Caravan Paradise</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- estilos -->
        <link rel="stylesheet" href="css/estilos.css">
        <!-- Custom fonts-->
        <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <?php include_once('class/setup.php');
        $setup = new Setup();
        $setup->menu();

        ?>

        <br> <br>

        <?php
        include_once "class/cvbd.php";
        $cvbd = new Cvbd();
     
        $login = $_SESSION['caravanlogin'];
        $senha = $_SESSION['caravansenha'];
        $dados = $cvbd->userSelect($login, $senha);

        $reservas = $cvbd->reservations($dados['id']);

        foreach ($reservas as $row) {
            ?>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body row col-12">
                    <div class="col-3">req: <?= $row['req']  ?></div>
                    <div class="col-3">id_cliente: <?= $row['id_cliente']  ?></div>
                    <div class="col-3">cod_viagem: <?= $row['cod_viagem']  ?></div>
                    <div class="col-3">quantidade: <?= $row['quantidade']  ?></div>
                    </div>
                </div>
            </div>
        <?php
    }



    ?>


        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.bundle.js"></script>


    </body>

    </html>

<?php }
if ($op == "registrar") {

    include_once "class/cvbd.php";
    $cvbd = new Cvbd();

    $status = $cvbd->loginStatus();
    if ($status[0]) {
        $cvlogin = $_SESSION['caravanlogin'];
        $cvsenha = $_SESSION['caravansenha'];
        $user = $cvbd->userSelect($cvlogin, $cvsenha);

        $cod_viagem =  $_GET['cod'];
        $id_cliente =  $user['id'];
        $quantidade = 1;

        $cvbd->reserve($id_cliente, $cod_viagem, $quantidade);
        echo "<script>alert('Adicionado a lista de reservas');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    } else {
        echo "<script>alert('Faça o login para continuar');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
}

?>