<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caravan Paradise - Busca</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- estilos -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Custom fonts-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    html,
    body {
        height: 100%;
    }
</style>

<body>


    <div id="tudo">
        <div id="conteudo">
            <?php include_once('class/setup.php');
            $setup = new Setup();
            $setup->menu();

            include_once("class/cvbd.php");
            $cvbd = new Cvbd();

            $busca = $_GET['busca'];

            $dados = $cvbd->search($busca);

            ?>

            <br><br>


            <div class="container">

                <div class="card mt-5">
                    <div class="card-body card">
                        <h2 class="card-title">Pacotes de Viagens</h2>
                        <p class="card-text">

                        </p>
                    </div>
                </div>
            </div>


            <br><br>
            <div class="container">
                <div class="center">

                    <?php

                    if ($dados) {
                        foreach ($dados as $value) {
                            $setup->cards(array($value['cod']));
                        }
                    } else {
                        echo "Nenhum resultado encontrado para: <br>";
                        echo "<b style='color:red;'>$busca</b>";
                    }



                    ?>

                </div>
            </div>
            <br><br><br>


            <br>

        </div>
    </div>
    <div id="rodape"><?php $setup->footer(); ?></div>


    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>