<?php
if (isset($_GET['cv'])) {
    $op = $_GET['cv'];
} else {
    $op = "reservas";
}

if ($op == "reservas") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();

    include_once('class/setup.php');
    $setup = new Setup();

        ?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=100%, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Caravan Paradise - Reservas</title>

            <!-- favicon -->
            <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

            <!-- Bootstrap core CSS -->
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
            <!-- estilos -->
            <link rel="stylesheet" href="css/estilos.css">
            <!-- Custom fonts-->
            <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <!-- tabela CSS-->
            <link href="tabela/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        </head>

        <body>
            <?php $ids = $setup->menu();
            $reservas = $cvbd->reservations($ids);
            ?>
            <br> <br>
            <div class=" container mt-4">
                <br>
                <h2 class="card">Pacotes de Reservas</h2>

            </div>


            <br>

            <div class="container mt-5">
                <div class="col-md-12 row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th>Quantidade</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($reservas as $row) {
                                            $req = $row['req'];
                                            $cod = $row['cod_viagem'];
                                            $viagem = $cvbd->viageminfo($cod);

                                            $nome = $viagem['nome'];
                                            $valor =  $viagem['preco'];

                                            $quant = $row['quantidade'];
                                            $subtotal = $valor * $quant;
                                            $total = $total + $subtotal;
                                            $subtotal = number_format($subtotal, 2, ',', '.');
                                            $valor = number_format($valor, 2, ',', '.');
                                            if ($quant > 0) {

                                                ?>
                                                <tr class="text-center">
                                                    <td><?= $nome ?></td>
                                                    <td>R$<?= $valor ?></td>
                                                    <td ><a href='reservas.php?cv=menos&req=<?= $req ?>'><i style='color: blue;' class='fas fa-minus-circle'></i></a><b> <?= $quant ?> </b><a href='reservas.php?cv=mais&req=<?= $req ?>'><i style='color: green;' class='fas fa-plus-circle'></i></a></td>
                                                    <td>R$ <?= $subtotal ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">



                        <div class="card ">
                            <div class="card-body card">
                                <h2 class="card-title">Valor das reservas</h2>
                                <p class="card-text">
                                    <div class="text-center"><b>Total R$<?= number_format($total, 2, ',', '.') ?> </div>
                                    <br>
                                    <div class="text-center"><a class="btn btn-success" href="pagamento.php"> Comprar </a></div>
                                    
                                </p>
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

    <?php

}
if ($op == "check") {

    include_once "class/cvbd.php";
    $cvbd = new Cvbd();

    session_start();
    $login = $_SESSION['caravanlogin'];
    $senha = $_SESSION['caravansenha'];
    $dados = $cvbd->userSelect($login, $senha);

    $reservas = $cvbd->reservations($dados['id']);

    if ($reservas[0]) {
        echo "<script>location.href = 'reservas.php'</script>";
    }else{
        echo "<script>alert('Nenhum Pacote Adquirido');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
}

if ($op == "checks") {

    include_once "class/cvbd.php";
    $cvbd = new Cvbd();

    session_start();
    $login = $_SESSION['caravanlogin'];
    $senha = $_SESSION['caravansenha'];
    $dados = $cvbd->userSelect($login, $senha);

    $reservas = $cvbd->reservations($dados['id']);

    if ($reservas[0]) {
        echo "<script>location.href = 'reservas.php'</script>";
    }else{
        echo "<script>alert('Nenhum Pacote Adquirido');</script>";
        echo "<script>location.href = 'index.php'</script>";
    }
}



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

        $reservetion = $cvbd->reservetion($id_cliente, $cod_viagem);
        if ($reservetion[0]) {
            $req = $reservetion[1]['req'];
            echo "<script>alert('Adicionado (+1) a lista de reservas');</script>";
            echo "<script>location.href = 'reservas.php?cv=add&req=$req&cod=$cod_viagem'</script>";
        } else {
            $cvbd->reserve($id_cliente, $cod_viagem, $quantidade);
            echo "<script>alert('Adicionado a lista de reservas');</script>";
            echo "<script>javascript:history.go(-1)</script>";
        }
    } else {
        echo "<script>alert('Faça o login para continuar');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
}
if ($op == "mais") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    $req = $_GET['req'];
    $cvbd->viagemPlus($req, 1);
    echo "<script>javascript:history.go(-1)</script>";
}
if ($op == "menos") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    $req = $_GET['req'];
    $cvbd->viagemPlus($req, -1);
    echo "<script>location.href = 'reservas.php?cv=checks'</script>";
}

if ($op == "add") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    $req = $_GET['req'];
    $cod = $_GET['cod'];
    $cvbd->viagemPlus($req, 1);
    echo "<script>location.href = 'viagem.php?cod=$cod'</script>";
}


?>