<?php


class Setup
{
    public function nav_top($nome)
    {
        ?>
    <!-- Navbar - menu topo -->
    <nav class="menu navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.php">Caravan Paradise</a>

        <!-- barra de pesquisa 
                                                            <div class=" d-md-inline-block  ml-auto mr-0 mr-md-3 my-2 my-md-0"> </div>-->

        <!-- icones -->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 ">
            <li class="nav-item" style="color:white;">

                <a class="nav-link active" href="#"><?= $nome ?></a>
            </li>
            
            
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw "></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Configurações</a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php?login=nao">Sair</a>
                </div>
            </li>
        </ul>

    </nav>
<?php
}

public function nav_lat($tipo)
{
    ?>
    <!-- barra lateral -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item <?php if ($tipo == 'home') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                <span>home</span>
            </a>
        </li>

        <li class="nav-item <?php if ($tipo == 'clientes') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="clientes.php">
                <i class="fas fa-users"></i>
                <span>Clientes</span></a>
        </li>
        <li class="nav-item <?php if ($tipo == 'pacotes') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="pacotes.php">
                <i class="fas fa-shopping-cart"></i>
                <span>Pacotes Adquiridos</span></a>
        </li>
        <li class="nav-item <?php if ($tipo == 'viagens') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="viagens.php?req=tabela">
            <i class="fas fa-route"></i>
                <span>Viagens</span></a>
        </li>

    </ul>
<?php
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
                    echo "<div class='carousel-item'> <img class='img-fluid' src='" . $images[$i] . "'></div>";
                } else {
                    echo "<div class='carousel-item active'> <img class='img-fluid' src='" . $images[$i] . "'></div>";
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

public function tabClientes()
{
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();
    $sql = "select * from clientes";
    foreach ($conn->query($sql) as $row) {
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        echo utf8_encode("<tr><td>$nome</td><td>$email</td><td>$telefone</td><td>$cpf</td></tr>");
    }
}

public function tabPacotes()
{
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();
    $sql = "select * from pacotes";
    foreach ($conn->query($sql) as $row) {
        $req =  $row['req'];
        $id_cliente = $row['id_cliente'];
        $cod_viagem = $row['cod_viagem'];
        $quantidade = $row['quantidade'];
        foreach ($conn->query("select * from clientes where id = $id_cliente") as $row) {
            $nome = $row['nome'];
        }
        foreach ($conn->query("select * from viagens where cod = $cod_viagem") as $row) {
            $viagem = $row['nome'];
            $preco = $row['preco'];
        }
        $total = $quantidade * $preco;
       
        echo utf8_encode("<tr><td>$req</td><td>$nome</td><td>$viagem</td><td>$quantidade</td><td>R$$total</td></tr>");
    }
}
}

?>