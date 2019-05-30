<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100%, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caravan Paradise - Pagamento</title>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- estilos -->
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Custom fonts-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <style>
    /*Pagamento*/
    .checkrow {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .check {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    .col-25 {
      -ms-flex: 20%;
      /* IE10 */
      flex: 20%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 70%;
      /* IE10 */
      flex: 70%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 40px;
    }

    .pagamento-box {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .checkrow {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>

</head>

<body>
  <?php
  include_once "class/cvbd.php";
  $cvbd = new Cvbd();

  include_once('class/setup.php');
  $setup = new Setup();
  $id = $setup->menu();

  echo"<script>alert('$id');</script>";
  $dados = $cvbd->userSelectId($id);
  $reservas = $cvbd->reservations($id);
 
  ?>
  <br><br><br><br>
  <div class="container">
    <div class="row checkrow">
      <div class="col-75">
        <div class="container check">
          <form action="/action_page.php">

            <div class="row checkrow">
              <div class="col-50">
                <h3>Dados pessoais</h3>
                <label for="fname"><i class="fa fa-user"></i> Nome Completo </label>
                <input type="text" id="fname" name="firstname" placeholder="Jhonatan Luiz" value="<?= $dados['nome'] ?>">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> CPF </label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                <label for="city"><i class="fa fa-institution"></i> Telefone </label>
                <input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000">

                <div class="row checkrow">
                  <div class="col-50">

                  </div>
                  <div class="col-50">

                  </div>
                </div>
              </div>
              <div class="col-50">
                <h3>Forma de pagamento</h3>
                <label for="fname">Cartão de Crédito</label>
                <div class="icon-container">

                  <i class="fab fa-cc-visa" style="color:navy;"></i>
                  <i class="fab fa-cc-amex" style="color:blue;"></i>
                  <i class="fab fa-cc-mastercard" style="color:red;"></i>
                  <i class="fab fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Nome do proprietário do cartão</label>
                <input type="text" id="cname" name="cardname" placeholder="Jhonatan Luiz">
                <label for="ccnum">Numero do cartão</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Mês de validade</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="Setembro">

                <div class="row checkrow">
                  <div class="col-50">
                    <label for="expyear">Ano de validade</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>

            </div>
            <label>
              <input type="submit" value="Finalizar compra" class="btn">
          </form>
        </div>
      </div>
      <div class="col-25">
        <div class="container check">
          <h4>Reserva(s)
            <span class="price" style="color:black">
              <i class="fa fa-shopping-cart"></i>
              <b>4</b>
            </span>
          </h4>
          <p><a href="#">Reserva 1</a> <span class="price">R$ 1.500</span></p>
          <p><a href="#">Reserva 2</a> <span class="price">R$ 2.700</span></p>
          <p><a href="#">Reserva 3</a> <span class="price">R$ 3.500</span></p>
          <p><a href="#">Reserva 4</a> <span class="price">R$ 5.000</span></p>
          <hr>
          <p>Total <span class="price" style="color:black"><b>R$ 12.700‬</b></span></p>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="center">

    <?php
    $setup->footer();
    ?>

  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>


</html>