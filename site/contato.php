<?php
if (isset($_GET['cv'])) {
  $op = $_GET['cv'];
} else {
  $op = "contacting";
}
?>

<?php if ($op == "contacting") { ?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caravan Paradise - Contato</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- estilos -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Custom fonts-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style>
      body,
      html {
        height: 100%;
        margin: 0;

      }

      .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url("images/porto.jpg");
        height: 110%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      .hero-text {
        text-align: center;
        position: absolute;
        font-size: 18px;
        top: 52%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
      }

      .container-contato {
        box-sizing: border-box;
      }

      input[type=text],
      select,
      textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 2px;
        box-sizing: border-box;
        resize: vertical;
        /* margin-top: 6px;*/
        margin-bottom: 15px;

      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100px;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .container-contato {
        border-radius: 5px;
        padding: 10px;
      }
    </style>
  </head>

  <body>

    <?php include_once('class/setup.php');
    $setup = new Setup();
    $setup->menu();

    ?>



    <div class="hero-image">
      <div class="hero-text">
        <h1 style="font-size:40px">Contato</h1>
        <div class="container-contato">
          <form action="contato.php?cv=contact" method="post">
            <label for="nome"><i class="fa fa-user "></i> Nome completo</label>
            <input type="text" id="nome" name="nome" placeholder="John M. Doe">

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">

            <label for="mensagem">Em que podemos ajudar?</label>
            <textarea id="mensagem" name="mensagem" placeholder="Digite sua dúvida..." rows="5"></textarea>
            <input type="submit" value="Enviar">
            <br><br>
          </form>
        </div>
      </div>
    </div>
    <?php
    $setup->footer();
    ?>
  </body>
  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>


  </html>
<?php }
if ($op == "contact") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];

  include_once "class/cvbd.php";
  $cvbd = new Cvbd();
  $cvbd->contacting($nome, $email, $mensagem);
  echo "<script>alert('Responderemos em breve\\nVerifique em seu E-Mail');</script>";
  echo "<script>location.href = 'contato.php'</script>";
}
?>