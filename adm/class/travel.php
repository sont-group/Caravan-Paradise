<?php

class Travel
{
   

    public function formEdit($nome)
    {
        $nome = utf8_decode($nome);
        include_once('class/sqbd.php');
        $sqbd = new Sqbd();
        $conn = $sqbd->conn();

        $sql = "select * from viagens where nome = '$nome'";
        foreach ($conn->query($sql) as $row) {

            $nome = utf8_encode($row['nome']);
            $origem = utf8_encode($row['origem']);
            $destino = utf8_encode($row['destino']);
            $preco = utf8_encode($row['preco']);
            $imagens = utf8_encode($row['imagens']);
            $hotel = utf8_encode($row['hotel']);
            $detalhes = utf8_encode($row['detalhes']);
        }


        ?>
    <div class="container">

        <div style="text-align:center;" class="card-header">Atualizar Viagem</div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="viagens.php?req=atualizar&nome=<?= $nome ?>" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6 mt-1">
                            <div class="form-label-group">
                                <input name="origem" type="text" id="origem" class="form-control" placeholder="origem" required="required" value="<?= $origem ?>">
                                <label for="origem">Origem (Cidade, Estado, País)</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="form-label-group">
                                <input name="destino" type="text" id="destino" class="form-control" placeholder="destino" required="required" value="<?= $destino ?>">
                                <label for="destino">Destino (Cidade, Estado, País)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row ">
                        <div class="col-md-5 mt-1">
                            <div class="form-label-group">
                                <input name="nome" type="text" id="nome" class="form-control" placeholder="nome" required="required" value="<?= $nome ?>">
                                <label for="nome">Nome (da viagem)</label>
                            </div>
                        </div>
                        <div class="col-md-5 mt-1">
                            <div class="form-label-group">
                                <input name="hotel" type="text" id="hotel" class="form-control" placeholder="hotel" required="required" value="<?= $hotel ?>">
                                <label for="hotel">Hotel</label>
                            </div>
                        </div>

                        <div class="col-md-2 mt-1">
                            <div class="form-label-group">
                                <input name="preco" type="number" min="1" step="0.01" id="preco" class="form-control" placeholder="preco" required="required" value="<?= $preco ?>">
                                <label for="preco">Preço (R$)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">

                                <textarea name="detalhes" type="text" class="form-control" rows="5" id="detalhes" placeholder="Detalhes" required="required"><?= $detalhes ?></textarea>
                                <label for="detalhes"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="icone" type="file" id="icone" class="form-control" placeholder="icone" accept="image/*">
                                <label for="icone">Icone (500x300)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="imgViagem[]" type="file" id="imgViagem" class="form-control" placeholder="imgViagem" accept="image/*" multiple />
                                <label for="imgViagem">Imagens da Viagem (750x500)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="imgHotel[]" type="file" id="imgHotel" class="form-control" placeholder="imgHotel" accept="image/*" multiple />
                                <label for="imgHotel">Imagens do Hotel (750x500)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <button class="btn btn-primary btn-block" type="submit">Atualizar</button>
            </form>

        </div>

    </div>
<?php
}

public function form()
{
    ?>
    <div class="container">

        <div style="text-align:center;" class="card-header">Registrar Viagem</div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="viagens.php?req=registrar" method="post">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6 mt-1">
                            <div class="form-label-group">
                                <input name="origem" type="text" id="origem" class="form-control" placeholder="origem" required="required" autofocus="autofocus">
                                <label for="origem">Origem (Cidade, Estado, País)</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="form-label-group">
                                <input name="destino" type="text" id="destino" class="form-control" placeholder="destino" required="required">
                                <label for="destino">Destino (Cidade, Estado, País)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row ">
                        <div class="col-md-5 mt-1">
                            <div class="form-label-group">
                                <input name="nome" type="text" id="nome" class="form-control" placeholder="nome" required="required">
                                <label for="nome">Nome (da viagem)</label>
                            </div>
                        </div>
                        <div class="col-md-5 mt-1">
                            <div class="form-label-group">
                                <input name="hotel" type="text" id="hotel" class="form-control" placeholder="hotel" required="required">
                                <label for="hotel">Hotel</label>
                            </div>
                        </div>

                        <div class="col-md-2 mt-1">
                            <div class="form-label-group">
                                <input name="preco" type="number" min="0" step="0.01" id="preco" class="form-control" placeholder="preco" required="required">
                                <label for="preco">Preço (R$)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">

                                <textarea name="detalhes" type="text" class="form-control" rows="5" id="detalhes" placeholder="Detalhes" required="required"></textarea>
                                <label for="detalhes"></label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="icone" type="file" id="icone" class="form-control" placeholder="icone" required="required" accept="image/*">
                                <label for="icone">Icone (500x300)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="imgViagem[]" type="file" id="imgViagem" class="form-control" placeholder="imgViagem" required="required" accept="image/*" multiple />
                                <label for="imgViagem">Imagens da Viagem (750x500)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input name="imgHotel[]" type="file" id="imgHotel" class="form-control" placeholder="imgHotel" required="required" accept="image/*" multiple />
                                <label for="imgHotel">Imagens do Hotel (750x500)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
            </form>

        </div>

    </div>
<?php
}

public function tabela()
{
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();

    $sql = "select * from viagens";
   foreach ($conn->query($sql) as $row) {
        $cod = $row['cod'];
        $nome = $row['nome'];
        $origem = $row['origem'];
        $destino = $row['destino'];
        $preco = $row['preco'];
        $imagens = $row['imagens'];
        $hotel = $row['hotel'];
        $detalhes = $row['detalhes'];
        $preco = number_format($preco, 2, ',', '.');
        // $link = "<a href='viagens.php?req=visualizar&nome=$nome'>Mais</a>";
        $info = "<a class='tabitem tabinfo' title='Sobre' href='viagens.php?req=visualizar&nome=$nome'><i class='fas fa-info-circle'></i></a>";
        $alterar = "<a class='tabitem tabalter' title='Editar' href='viagens.php?req=tabela_edit&nome=$nome'><i class='fas fa-pen-square'></i></a>";
        $excluir = "<a class='tabitem tabdel' title='Excluir' href='viagens.php?req=tabela_del&nome=$nome'><i class='fas fa-minus-circle'></i></a>";
        $novo = "<a class='tabitem text-success' title='Novo' href='viagens.php?req=cadastrar'><i class='fas fa-plus-circle'></i></a>";        
        $link = "$info$alterar$excluir$novo";
        echo utf8_encode("<tr><td>$cod</td><td>$nome</td><td>$origem</td><td>$destino</td><td>R$$preco</td><td>$hotel</td><td style='text-align:center;'>$link</td></tr>");       
    }
       
}

public function check(){
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();
    $sql = "select * from viagens";
    foreach ($conn->query($sql) as $row) {
        return true;
    }
    return false;
}


public function visualizar($nome)
{
    include_once "class/setup.php";
    $setup = new Setup();
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $dados = $sqbd->viagemSelect($_GET['nome']);

    $origem = $dados['origem'];
    $destino = $dados['destino'];
    $nome = $dados['nome'];
    $hotel = $dados['hotel'];
    $preco = $dados['preco'];
    $detalhes = $dados['detalhes'];



    $imagens = $dados['imagens'];
    $icone = explode(' * ', $imagens)[0];
    $local = explode(', ', explode(' * ', $imagens)[1]);
    $hotels = explode(', ', explode(' * ', $imagens)[2]);

    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <h1 class="my-3">
            <?= $nome ?>
        </h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <?php $setup->slide($local, "car1"); ?>
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Icone</h3>
                <div> <img class="img-fluid img-thumbnail" src="<?= $icone ?>" alt=""> </div>
                <h3 class="my-3">Descrição</h3>
                <p>
                    <b>Origem:</b> <?= $origem ?>
                    <br>
                    <b>Destino:</b> <?= $destino ?>
                    <br>
                    <b>Hotel:</b> <?= $hotel ?>
                    <br>
                    <b>Preço:</b> <?= $preco ?>
                </p>
            </div>

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
    <div class="container">
        <br><br>
        <h3 class="my-3">Detalhes:</h3>
        <p>
            <?= nl2br($detalhes) ?>


        </p>
        <br><br>

        <div class="col-md-12">
            <div class="row">
                <div class=" col-md-2"> </div>
                <div style="" class=" col-md-8">
                    <h3 style="text-align:center;" class="my-3">Hotel</h3>
                    <?php $setup->slide($hotels, "car2"); ?>

                </div>
                <div class=" col-md-2"></div>
            </div>
        </div>
    </div>

<?php

}
public function tabDel($nome)
{
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();
    try {
        $stmt = $conn->prepare('DELETE FROM viagens WHERE nome = :nome');
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        // echo $stmt->rowCount();
    } catch (PDOException $e) {
        // echo 'Error: ' . $e->getMessage();
    }
}


public function tabUpdate($nomeOld, $nome, $origem, $destino, $hotel, $preco, $detalhes, $imagens)
{
    include_once('class/sqbd.php');
    $sqbd = new Sqbd();
    $conn = $sqbd->conn();


    try {
        //  $stmt = $conn->prepare('UPDATE viagens SET nome = :nome WHERE nome = :nomeOld');
        $stmt = $conn->prepare('UPDATE viagens SET origem = :origem, destino = :destino, nome = :nome, 
       preco = :preco, hotel = :hotel, detalhes = :detalhes, imagens = :imagens  WHERE nome = :nomeOld');
        $stmt->execute(array(
            ':origem' => $origem,
            ':destino' => $destino,
            ':nome' => $nome,
            ':hotel' => $hotel,
            ':preco' => $preco,
            ':detalhes' => $detalhes,
            ':imagens' => $imagens,
            ':nomeOld' => $nomeOld
        ));

        // echo $stmt->rowCount();
    } catch (PDOException $e) {
        // echo 'Error: ' . $e->getMessage();
    }
    ?>
    <script>
        location.href = 'viagens.php?req=visualizar&nome=<?= $nome ?>'
    </script>
<?php

}
}
