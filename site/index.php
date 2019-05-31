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

<style>

</style>

<body>

  <?php include_once('class/setup.php');
  $setup = new Setup();
  $setup->menu();

  ?>

  <br><br>

  <div class="container_img">
    <img src="images/porto.jpg" alt="Snow" style="width:100%;">

    <form action="busca.php" method="get">
      <div class=" container centered ">
        <h3 class="txtbusking">Caravan Paradise</h3>
        <input class="busking" name="busca" type="text" class="mb-2" placeholder="Faça sua Busca...">

        <button class="busking_btn btn "><i style="color:#FFF;" class="fas fa-search"></i></button>
      </div>
    </form>
  </div>


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
      $setup->cards(array(1, 5, 6, 7, 8, 11, 12, 13));
      ?>



    </div>
  </div>
  <br><br><br>

  <div>
    <?php
    $setup->galeria();
    ?>
  </div>
  <br>
  <div class="center">

    <?php
    $setup->footer();
    ?>

  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>

</body>

</html>