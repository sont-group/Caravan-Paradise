<?php
class Setup
{
    public function menu()
    {
        include_once('cvbd.php');
        $cvbd = new Cvbd;
        $status = $cvbd->loginStatus();
        $cvnome = $status[1];
        $status = $status[0];


        ?>
    <!-- Navigation -->
    <nav class="navmenu navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img width="55%" class="img-fluid" src="images/logo_pequeno.png">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contato.php">Contato</a>
                    </li>
                    <?php
                    if ($status) {
                        echo "<li class='nav-item active'><a class='nav-link active' href='reservas.php'>Reservas</a></li>";
                    }
                    ?>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle <?php if ($status) echo "active" ?>" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $cvnome ?>
                            <i class="fas fa-user-circle fa-fw "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <?php
                            if ($status) {

                                echo "<a class='dropdown-item' href='user.php?cv=configurar'>Configurar</a>";
                                echo "<a class='dropdown-item' href='login.php?login=nao'>Sair</a>";
                            } else {
                                echo "<a class='dropdown-item' href='login.php'>login</a>";
                                echo "<a class='dropdown-item' href='user.php'>Cadastrar</a>";
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php
}
public function cards($cod)
{
    include_once("cvbd.php");
    $cvbd = new Cvbd();
    for ($i = 0; $i < count($cod); $i++) {
        $dados = $cvbd->viageminfo($cod[$i]);
        ?>
        <div class="card item-card">
            <img class="card-img-top" src="../adm/<?= $dados['imagens']['icone'] ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><b><?= $dados['nome']; ?></b></h4>
                <p class="card-text">
                    <b>Origem: </b> <br><?= $dados['origem']; ?>
                    <br>
                    <b>Destino:</b> <br> <?= $dados['destino']; ?>
                    <br>
                    <b>Preço: </b><?= $dados['preco']; ?>
                    <br>
                    <a href="viagem.php?cod=<?= $cod[$i]; ?>">
                        <button class="btn btn-primary mt-2"> Ver Mais </button>
                    </a>
                </p>


            </div>
        </div>
    <?php
}
}
public function slide($images, $nome)
{
    ?>
    <div id="<?= $nome ?>" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <?php
            for ($i = 0; $i < count($images); $i++) {
                if ($i != 0) {
                    echo  "<li data-target='#$nome' data-slide-to='$i'></li>";
                } else {
                    echo  "<li data-target='#$nome' data-slide-to='$i' class='active'></li>";
                }
            }
            ?>

        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            for ($i = 0; $i < count($images); $i++) {
                if ($i != 0) {
                    echo "<div class='carousel-item'> <img class='img-fluid' src='../adm/" . $images[$i] . "'></div>";
                } else {
                    echo "<div class='carousel-item active'> <img class='img-fluid' src='../adm/" . $images[$i] . "'></div>";
                }
            }
            ?>
        </div>


        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#<?= $nome ?>" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#<?= $nome ?>" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
<?php
}
public function galeria()
{
    ?>
    <div>
        <div class="container">
            <div class="slideshow">
                <h2 style="text-align:center; font-weight: bold">Galeria de Fotos</h2>

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

                    <a class="ant" onclick="plusSlides(-1)">❮</a>
                    <a class="prox" onclick="plusSlides(1)">❯</a>

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
    </div>
<?php
}
public function footer()
{
    ?>


    <div class="Conteudo">
        <footer class="rodape">
            <br>
            <div class="col-12">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        &copy; 2019 - Caravan Paradise. Todos os direitos reservados.
                    </div>
                    <div class="col-2">
                        <a class="facebook_directin" href="#">
                            <img width="40px" class="img-fluid" src="images/facebook_icon.png">
                        </a>
                        <a class="instagram_icon" href="#">
                            <img width="40px" class="img-fluid" src="images/instagram-icon.png">
                        </a>

                    </div>

                </div>
            </div>
            <br>

        </footer>


    </div>

<?php
}
}
?>