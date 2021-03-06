<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caravan Paradise - Home</title>

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

    <footer class="rodape">
        <p>
        &copy; 2019 - Caravan Paradise. Todos os direitos reservados.
        <p>
    </footer>
</body>

</html>