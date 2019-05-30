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

    session_start();
    $login = $_SESSION['caravanlogin'];
    $senha = $_SESSION['caravansenha'];
    $dados = $cvbd->userSelect($login, $senha);


    $reservas = $cvbd->reservations($dados['id']);
    if ($reservas) {


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
            <?php $setup->menu(); ?>
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
                                        <tr>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th>Qnt</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($reservas as $row) {
                                            $cod = $row['cod_viagem'];
                                            $viagem = $cvbd->viageminfo($cod);

                                            $nome = $viagem['nome'];
                                            $valor =  $viagem['preco'];

                                            $quant = $row['quantidade'];
                                            $subtotal = $valor * $quant;
                                            $total = $total + $subtotal;
                                            $subtotal = number_format($subtotal, 2, ',', '.');
                                            $valor = number_format($valor, 2, ',', '.');
                                                                                 
                                            ?>
                                            <tr>
                                                <td><?= $nome ?></td>
                                                <td>R$ <?= $valor ?></td>
                                                <td><a href='#'><i class='fas fa-minus-circle'></i></a><b> <?= $quant ?> </b><a href='#'><i class='fas fa-plus-circle'></i></a></td>
                                                <td>R$ <?= $subtotal ?></td>
                                            </tr>
                                            <?php
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
                                <h2 class="card-title">Confirmar</h2>
                                <p class="card-text">
                                    <div><b>Total <?= number_format($total, 2, ',', '.') ?> </div>
                                    <br>
                                    <a class="btn btn-primary" href="pagamento.php"> pagar </a>
                                  

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
} else {
    echo "<script>alert('Nenhum Pacote Adquirido');</script>";
    echo "<script>javascript:history.go(-1)</script>";
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

        $cvbd->reserve($id_cliente, $cod_viagem, $quantidade);
        echo "<script>alert('Adicionado a lista de reservas');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    } else {
        echo "<script>alert('Faça o login para continuar');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
}

?>