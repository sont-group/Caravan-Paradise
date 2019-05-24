<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100%, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caravan Paradise - Viagens</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- estilos -->
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Custom fonts-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- tabela CSS-->
  <link href="tabela/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <?php
  include_once "class/setup.php";
  $setup = new Setup();

  include_once "class/user.php";
  $user = new User();
  $userNome = $user->status();

  include_once "class/travel.php";
  $tabela = new Travel();


  ?>
</head>


<body id="page-top">

  <?php $setup->nav_top($userNome); ?>
  <div id="wrapper">
    <?php $setup->nav_lat("viagens"); ?>
    <div id="content-wrapper">
      <!-- Conteudo... -->

      <?php
      $req = $_GET["req"];

      if ($req == "tabela") {

        if ($tabela->check()) {       
        ?>

        <div class="container">
          <h2>Tabela de Viagens</h2>
          <br>
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                  <tr>

                    <th>nome</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Preço</th>
                    <th>Hotel</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>


                  <?php $tabela->tabela(); ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      

      <?php }
      else{
        echo "<script>alert('Nenhuma viagem cadastrada\\nCadastre para continuar');</script>";
        echo "<script>location.href = 'viagens.php?req=cadastrar'</script>";
      }
    
    } elseif ($req == "cadastrar") {
      include_once "class/travel.php";
      $form = new Travel();
      $form->form();
    } elseif ($req == "registrar") {
      include_once "class/setup.php";
      $setup = new Setup();


      ?>


        <?php
        include_once('class/sqbd.php');
        $sqbd = new Sqbd();
        if ($sqbd->viagemCheck($_POST['nome'])) {


          include_once "class/image.php";
          $image = new Image();
          $url = $image->link("viagens", ucwords($_POST['nome']));
          $icone = $image->save($_FILES['icone'], "$url/icone");
          $hotels = $image->saves($_FILES['imgHotel'], "$url/hotel");
          $local = $image->saves($_FILES['imgViagem'], "$url/viagem");

          array('$nome', '$origem', '$destino', '$preco', '$imagens', '$hotel', '$detalhes');
          $origem = ucwords($_POST['origem']);
          $destino = ucwords($_POST['destino']);
          $nome = ucwords($_POST['nome']);
          $hotel = ucwords($_POST['hotel']);
          $preco = $_POST['preco'];
          $detalhes = $_POST['detalhes'];


          $xlocal = implode(', ', $local);
          $xhotels = implode(', ', $hotels);
          $imagens = "$icone * $xlocal * $xhotels";

          $sqbd->cadViagem(array($nome, $origem, $destino, $preco, $imagens, $hotel, $detalhes));

          ?>
          <!--<script>alert('Redirecionando');</script> -->
          <script>
            location.href = 'viagens.php?req=visualizar&nome=<?= $nome ?>'
          </script>

        <?php } else {
        echo "<script>alert('Nome ja cadastrado!\\nMude e tente novamente');history.go(-1);</script>";
      }
      ?>
      <?php } elseif ($req == "visualizar") {
      include_once('class/travel.php');
      $travel = new Travel();
      $travel->visualizar($_GET['nome']);
    } elseif ($req == "tabela_del") {
      include_once('class/travel.php');
      $travel = new Travel();
      $travel->tabDel($_GET['nome']);
      echo "<script>history.go(-1);</script>";
    } elseif ($req == "tabela_edit") {
      include_once('class/travel.php');
      $travel = new Travel();
      $travel->formEdit($_GET['nome']);
    } elseif ($req == "atualizar") {


      include_once('class/sqbd.php');
      $sqbd = new Sqbd();
      include_once('class/travel.php');
      $travel = new Travel();
      include_once "class/image.php";
      $image = new Image();

      $nomeOld = $_GET['nome'];
      $origem = $_POST['origem'];
      $destino = $_POST['destino'];
      $nome = $_POST['nome'];
      $hotel = $_POST['hotel'];
      $preco = $_POST['preco'];
      $detalhes = $_POST['detalhes'];
      $icone = $_FILES['icone'];
      $local = $_FILES['imgViagem'];
      $hotels = $_FILES['imgHotel'];

      $dados =  $sqbd->viagemSelect($nomeOld);
      $imagens = $dados['imagens'];
      // print_r($imagens);
      $imagensbd = $image->ImgExplode($imagens);
      // print_r($imagensbd);

      $url = $image->link("viagens", ucwords($_POST['nome']));
      if ($icone['size'] == 0) {
        $icone = $imagensbd['icone'];
        // echo "Sem icone >> $icone";
      } else {
        $icone = $image->save($icone, "$url/icone");
        // echo "Com icone >> " . $icone;     
      }

      if ($local['size'][0] == 0) {
        $local = $imagensbd['local'];
        // echo "Sem local >> ";
        // print_r($local);
      } else {
        $local = $image->saves($local, "$url/viagem");
        // echo "Com icone >> ";
        // print_r($local);
      }

      // echo "<br><br>------------------------<br><br>";
      if ($hotels['size'][0] == 0) {
        $hotels = $imagensbd['hotels'];
        // echo "Sem local >> ";
        // print_r($hotels);
      } else {
        $hotels = $image->saves($hotels, "$url/hotel");
        // echo "Com icone >> ";
        // print_r($hotels);
      }
      // echo ($image->imgImplode($icone, $local, $hotels));

      $imagens = $image->imgImplode($icone, $local, $hotels);

      if ($sqbd->viagemCheck($_POST['nome']) or ($_GET['nome'] == $_POST['nome'])) {

        $nomeOld = utf8_decode($_GET['nome']);
        $origem = utf8_decode($_POST['origem']);
        $destino = utf8_decode($_POST['destino']);
        $nome = utf8_decode($_POST['nome']);
        $hotel = utf8_decode($_POST['hotel']);
        $preco = utf8_decode($_POST['preco']);
        $detalhes = utf8_decode($_POST['detalhes']);

        $travel->tabUpdate($nomeOld, $nome, $origem, $destino, $hotel, $preco, $detalhes, $imagens);
      } else {
        echo "<script>alert('Nome ja cadastrado!\\nMude e tente novamente');history.go(-1);</script>";
      }






      /*
      include_once('class/sqbd.php');
      $sqbd = new Sqbd();
      include_once('class/travel.php');
      $travel = new Travel();

      $icone = $_FILES['icone']['size'];
      $local = $_FILES['imgViagem']['size'][0];
      $hotels = $_FILES['imgHotel']['size'][0];

      if (($icone == 0) and ($local == 0) and ($hotels == 0)) {
        if ($sqbd->viagemCheck($_POST['nome']) or ($_GET['nome'] == $_POST['nome'])) {

          $nomeOld = utf8_decode($_GET['nome']);
          $origem = utf8_decode($_POST['origem']);
          $destino = utf8_decode($_POST['destino']);
          $nome = utf8_decode($_POST['nome']);
          $hotel = utf8_decode($_POST['hotel']);
          $preco = utf8_decode($_POST['preco']);
          $detalhes = utf8_decode($_POST['detalhes']);

          $travel->tabUpdate($nomeOld, $nome, $origem, $destino, $hotel, $preco, $detalhes);
        } else {
          echo "<script>alert('Nome ja cadastrado!\\nMude e tente novamente');history.go(-1);</script>";
        }
      } else {
        //echo "<br> >>> OPS! A opção de atualizar imagem ainda não está disponível <<< <br>";
        include_once('class/sqbd.php');
        $sqbd = new Sqbd();
        $conn = $sqbd->conn();

        $nomeOld = utf8_decode($_GET['nome']);
        $sql = "select * from viagens where nome = '$nomeOld'";
        foreach ($conn->query($sql) as $row) {
          $imagens = utf8_encode($row['imagens']);
        }


        $dados = $travel->ImgExplode($imagens);
        print_r($dados);
        include_once "class/image.php";
        $image = new Image();

        if ($icone != 0) {
         
        }
      }
      */
    } ?>

    </div>
  </div>

  </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>

  <!-- tabela plugin JavaScript-->
  <script src="tabela/datatables/jquery.dataTables.js"></script>
  <script src="tabela/datatables/dataTables.bootstrap4.js"></script>
  <script src="tabela/demo/datatables-demo.js"></script>

</body>

</html>