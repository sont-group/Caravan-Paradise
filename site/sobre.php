<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caravan Paradise - Sobre</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

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
    <br>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body card">
                <h2 class="card-title">Caravan Paradise</h2>
                <p class="card-text">
                    Caravan Paradise é uma agência de Viagens que pode levá- los ao lugar onde sempre sonharam em ir, proporcionando uma experiência incrível e única.<br>
                    Nossa agência visa trazer o máximo de conforto e a melhor experiência ao seus clientes, buscando sempre os melhores e mais desejados lugares para viajar, adquirindo novas lembranças e novos desejos para que sua viagem seja única e inesquecível.<br>
                    Nós acreditamos na magia das viagens.<br>
                    O Caravan Paradise foi conceituado em 2007 em Cruzeiro, no Brasil, por seis amigos universitários: Jhonatan Chagas, Luisa Couto, Mateus Leal, Mateus Leonardo, Vitória Narciso e Pedro Bulhões. Somos um grupo bastante diversificado, mas a nossa cultura é o nosso terreno comum.<br>
                    Misture isso com a nossa visão empreendedora, estrutura ágil e horas de trabalho autodeterminadas e teremos a receita vencedora para manter os talentos motivados e produtivos.<br>
                    Com esse sonho a empresa nasceu, com a missão de levar o melhor do mundo, proporcionando o incrível paraíso de viajar ao nossos clientes.<br>
                    Mas o mais legal é que nossos clientes vão para todos os lugares do mundo, mas sempre voltam para o Caravan, onde eles sabem que sempre poderão confiar.<br>
                    Porque no fundo, afinal somos como você: AMAMOS VIAJAR!. Nós nascemos com rodinhas nos pés, turbina nos braços e asas na imaginação!
                </p>
            </div>
        </div>
    </div>

    <br><br>

    <?php
    $setup->footer();
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>