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
        <!-- tabela CSS-->
        <link href="tabela/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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


        ?>
        <div class="container mt-5">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Req</th>
                                <th>Cliente</th>
                                <th>Viagem</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reservas as $row) {
                                $cod = $row['cod_viagem'];
                                $viagem = $cvbd->viageminfo($cod);

                                $nome = $viagem['nome'];
                                $origem = $viagem['origem'];
                                $destino = $viagem['destino'];
                                $quantidade = $row['quantidade'];
                                $total = $viagem['preco'] * $row['quantidade'];

                                echo "<tr> <td>$nome</td> <td>$origem</td> <td>$destino</td>
                                <td>$quantidade</td> <td>$total</td> </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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