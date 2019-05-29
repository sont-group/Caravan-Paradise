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

<style>
    div {
        z-index: 1
    }

    #wrap {
        min-height: 100%;
    }

    #main {
        overflow: auto;
        padding-bottom: 150px;
        /* this needs to be bigger than footer height*/
    }

    .footer {
        position: relative;
        margin-top: -150px;
        /* negative value of footer height */
        height: 150px;
        clear: both;
        padding-top: 20px;
        background-color: blue;
    }
</style>

<body>

    <?php include_once('class/setup.php');
    $setup = new Setup();


    ?>

    <div id="wrap">
        <div id="main">
            asd
        </div>
    </div>
    <div class="center footer" style="">

        <?php
        $setup->footer();
        ?>

    </div>




    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>



</body>

</html>