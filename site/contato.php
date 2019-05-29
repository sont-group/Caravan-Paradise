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
    <title>Caravan Paradise</title>

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
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/porto.jpg");
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
        top: 55%;
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
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .container-contato {
        border-radius: 10px;
        padding: 20px;
      }
    </style>
  </head>

  <body>

    <?php include_once('class/setup.php');
    $setup = new Setup();
    $setup->menu();

    ?>

    <br><br>

    <div class="hero-image">
      <div class="hero-text">
        <h1 style="font-size:50px">Contato</h1>
        <div class="container-contato">
          <form action="contato.php?cv=contact" method="post">
            <label for="nome"><i class="fa fa-user"></i> Nome completo</label>
            <input type="text" id="nome" name="nome" placeholder="John M. Doe">

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">

            <label for="mensagem">Em que podemos ajudar?</label>
            <textarea id="mensagem" name="mensagem" placeholder="Digite sua dúvida..." style="height:200px"></textarea>
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