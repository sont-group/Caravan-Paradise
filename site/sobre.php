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
    <div class="container_img">
        <img src="images/nova-experiencia.jpg" alt="Snow" style="width:100%;">
    </div>
    </div>
    <br><br>
    <div class="container">
<div class="card mt-5">
    <div class="card-body card">
        <h2 class="card-title">Caravan Paradise</h2>
        <p class="card-text">
        Caravan Paradise é uma agência de Turismo que te pode te levar no  lugar onde você sempre sonhou em ir. E com uma experiência incrível e única.<br>
        A Caravan Paradise visa trazer o máximo de conforto e a melhor experiência ao seus clientes buscando sempre os melhores e mais desejados lugares para viajar e adquirir novas lembranças e novos desejos para que sua viagem seja única e inesquecível.

        </p>
    </div>
</div>
</div>

    <br><br>

    <?php
    $setup->footer();
    ?>
</body>
</html>