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
  body {
    font-family: sans-serif;;
    margin: 0;
  }
.container{
  font-family: sans-serif;
}
  .slideshow {
    box-sizing: border-box;
  }

  img {
    vertical-align: middle;
  }

  /* Position the image container (needed to position the left and right arrows) */
  .slideimg {
    position: relative;
  }

  /* Hide the images by default */
  .mySlides {
    display: none;
  }

  /* Add a pointer when hovering over the thumbnail images */
  .cursor {
    cursor: pointer;
  }

  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: #15bdb1;
    opacity: 0.5;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* Container for image text */
  .caption-container{
    text-align: center;
    background-color: #15bdb1;;
    padding: 2px 16px;
    color: black;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Six columns side by side */
  .column {
    float: left;
    width: 16.66%;
  }

  /* Add a transparency effect for thumnbail images */
  .demo {
    opacity: 0.6;
  }

  .active,
  .demo:hover {
    opacity: 1;
  }
</style>

<body>

  <?php include_once('class/setup.php');
  $setup = new Setup();
  $setup->menu();

  ?>

  <br><br>

  <div class="container_img">
    <img src="images/porto.jpg" alt="Snow" style="width:100%;">
    <div class=" container centered">
      <h3>Caravan Paradise</h3>
      <input type="text" class="mb-2">
      <br>
      <button class="btn btn-primary">Pesquisar</button>
    </div>
  </div>


  <div class="container">



    <div class="card mt-5">
      <div class="card-body card">
        <h2 class="card-title">Caravan Paradise</h2>
        <p class="card-text">
          O Caravan Paradise foi idealizado com a proposta de ser, simultaneamente, um sistema de vendas e gerenciamento de viagens e caravanas. O projeto visa facilitar e melhor controlar o funcionamento desse mercado, afim de minimizar possíveis problemas e imprevistos, além de maximizar a experiência dos turistas.
        </p>
      </div>
    </div>
  </div>


  <br><br>
  <div class="container">
    <div class="center">

      <?php
      $setup->cards(array(1, 1, 1, 1));
      ?>



    </div>
  </div>
  <br><br><br>

  <div>
    <div class="container">
      <div class="slideshow">
        <h2 style="text-align:center">Slideshow Gallery</h2>

        <div class="slideimg">
          <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="galeria/img_woods_wide.jpg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="galeria/img_5terre_wide.jpg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="galeria/img_mountains_wide.jpg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">4 / 6</div>
            <img src="galeria/img_lights_wide.jpg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="galeria/img_nature_wide.jpg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="galeria/img_snow_wide.jpg" style="width:100%">
          </div>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>

          <div class="caption-container">
            <p id="caption"></p>
          </div>

          <div class="row">
            <div class="container">
            <div class="column ">
              <img class="demo cursor" src="galeria/img_woods.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
            </div>
            <div class="column">
              <img class="demo cursor" src="galeria/img_5terre.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="column">
              <img class="demo cursor" src="galeria/img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
            <div class="column">
              <img class="demo cursor" src="galeria/img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
            </div>
            <div class="column">
              <img class="demo cursor" src="galeria/img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
            </div>
            <div class="column">
              <img class="demo cursor" src="galeria/img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
            </div>
          </div>
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