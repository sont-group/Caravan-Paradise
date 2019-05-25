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
    body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.container-contato{box-sizing: border-box;}

input[type=text], select, textarea {
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
    <form action="/action_page.php">
        <label for="fname"><i class="fa fa-user"></i> Nome completo</label>
        <input type="text" id="fname" name="firstname" placeholder="John M. Doe">

        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" placeholder="john@example.com">

        <label for="subject">Em que podemos ajudar?</label>
        <textarea id="subject" name="subject" placeholder="Digite sua dúvida..." style="height:200px"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
  </div>
</div>
    <?php
    $setup->footer();
    ?>
</body>
</html>