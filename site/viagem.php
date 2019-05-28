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
    $dados = $cvbd->viageminfo($_GET['cod']);
    echo "<br><br><br>";
    ?>

    <br>
    <br>
    <div class="container">
        <div class='col-md-12 '>
            <div class="row">
                <div class='col-md-7'>
                    <?php $setup->slide($dados['imagens']['local'], "car1"); ?>
                </div>
                <div class='col-md-5' >
                    <div class="card">
                        <div class="card-body card">
                            <h2 class="card-title">Descrição</h2>
                            <p class="card-text">
                                <div><b>Origem:</b> <?= $dados['origem'] ?> </div>
                                <div><b>Destino:</b> <?= $dados['destino'] ?> </div>
                                <div><b>Hotel:</b> <?= $dados['hotel'] ?> </div>
                                <div style="color:green;"><b>Preço:</b> R$<?= str_replace(".", ",", $dados['preco']); ?> </div>
                              
                                <button onclick="window.location.href='reservas.php?cv=registrar&cod=<?= $_GET['cod'] ?>'" class="btn btn-primary mt-2">Reservar</button>
                             
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body card">
                <h2 class="card-title">Mais Detalhes</h2>
                <b style="text-align:center;">Imagens do Hotel</b>
                <div class="col-6 mx-auto">
                   
                <?php $setup->slide($dados['imagens']['hotels'], "car2"); ?>
                </div>
                <br>
                <p class="card-text">
                   
                
                <?= nl2br($dados['detalhes']) ?>               
                </p>
            </div>
        </div>
    </div>


    <br><br><br>

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