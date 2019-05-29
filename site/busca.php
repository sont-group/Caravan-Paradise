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

    include_once("class/cvbd.php");
    $cvbd = new Cvbd();

    $busca = $_POST['busca'];

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
   
            
            foreach ($dados as $value) {
                $setup->cards(array($value['cod']));
            }
            
            ?>

        </div>
    </div>
    <br><br><br>


    <br>
    <div class="center">

        <?php
        $setup->footer();
        ?>

    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>




</body>

</html>