<?php
if (isset($_GET['cv'])) {
    $op = $_GET['cv'];
} else {
    $op = "cadastro";
}
if ($op == "cadastro") {
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=100%, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Caravan Paradise - Cadastro</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- estilos -->
        <link rel="stylesheet" href="css/estilos.css">
        <!-- Custom fonts-->
        <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

        <script src="js/jquery.js"></script>
        <script src="js/mask/cpf.js"></script>
        <script src="js/mask/mascara.js"></script>


    </head>
    <style>
    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url("images/porto.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }
    </style>
    <body class="hero-image">

        <div class="container col-md-6">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Cadastro</div>
                <div class="card-body">

                    <form method="post" action="user.php?cv=cadastrar">
                        <div class="form-group ">
                            <div class="form-label-group">
                                <label for="nome">Nome</label>
                                <input name='nome' id="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">

                            </div>
                            <div class="form-label-group ">
                                <label for="email">Email</label>
                                <input name='email' type="email" id="email" class="form-control" placeholder="Email" required="required">

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="form-label-group ">
                                <label for="telefone">Telefone</label>
                                <input name='telefone' type="tel" id="telefone" class="form-control" placeholder="Telefone" required="required" onkeypress="mascara(this, '## #########')" pattern="[0-9 -]+" maxlength="12" minlength="11">

                            </div>
                            <div class="form-label-group ">
                                <label for="cpf">CPF</label>
                                <input name='cpf' type="cpf" id="cpf" class="form-control" placeholder="CPF" required="required" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="11" pattern="[0-9 -.]+">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group ">
                                <label for="senha">Senha</label>
                                <input name='senha' type="password" id="senha" class="form-control" placeholder="Senha" required="required">

                            </div>
                        </div>


                        <button class="btn btn-primary btn-block mt-4" type="submit">Confirmar</button>

                        <br>
                        <a href="index.php" class="btn btn-success btn-block mt-2">
                            Voltar
                        </a>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br><br><br>
        <!-- Bootstrap core JavaScript -->

        <script src="bootstrap/js/bootstrap.bundle.js"></script>

    </body>

    </html>

<?php
}
if ($op == "cadastrar") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $check = $cvbd->cadCheck($email, $cpf);
    if ($check) {
        echo "<script>javascript:alert('Não foi possivel cadastrar\\nEmail ou CPF já utilizado')</script>";
        echo "<script>javascript:history.go(-1)</script>";
    } else {
        $dados = array($cpf, $nome, $email, $telefone, $senha);
        $cvbd->cadCliente($dados);
        echo "<script>javascript:alert('Cadastro efetuado com sucesso\\nFaça o login para continuar')</script>";
        echo "<script>javascript:history.go(-2)</script>";
    }
}
if ($op == "configurar") {
    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    session_start();
    $login = $_SESSION['caravanlogin'];
    $senha = $_SESSION['caravansenha'];
    $dados = $cvbd->userSelect($login, $senha);
    ?>


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=100%, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Caravan Paradise - Configurar</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- estilos -->
        <link rel="stylesheet" href="css/estilos.css">
        <!-- Custom fonts-->
        <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

        <script src="js/jquery.js"></script>
        <script src="js/mask/cpf.js"></script>
        <script src="js/mask/mascara.js"></script>


    </head>

    <body class="bg-dark">

        <div class="container col-md-6">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Configurar Conta</div>
                <div class="card-body">

                    <form method="post" action="user.php?cv=atualizar">
                        <div class="form-group ">
                            <div class="form-label-group">
                                <label for="nome">Nome</label>
                                <input value="<?= $dados['nome'] ?>" name='nome' id="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">

                            </div>
                            <div class="form-label-group ">
                                <label for="email">Email</label>
                                <input readonly="" value="<?= $dados['email'] ?>" name='email' type="email" id="email" class="form-control" placeholder="Email">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group ">
                                <label for="telefone">Telefone</label>
                                <input value="<?= $dados['telefone'] ?>" name='telefone' type="tel" id="telefone" class="form-control" placeholder="Telefone" required="required" onkeypress="mascara(this, '## #########')" pattern="[0-9 -]+" maxlength="12" minlength="11">

                            </div>
                            <div class="form-label-group ">
                                <label for="cpf">CPF</label>
                                <input readonly="" value="<?= $dados['cpf'] ?>" name='cpf' type="cpf" id="cpf" class="form-control" placeholder="CPF" required="required" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="11" pattern="[0-9 -.]+">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group ">
                                <label for="senha">Senha</label>
                                <input value="" name='senha' type="password" id="senha" class="form-control" placeholder="Senha" required="required">

                            </div>
                            <div class="form-label-group ">
                                <label for="novasenha">Nova Senha (Opcional)</label>
                                <input name='novasenha' type="password" id="novasenha" class="form-control" placeholder="Nova Senha">

                            </div>
                        </div>


                        <button class="btn btn-primary btn-block mt-4" type="submit">Confirmar</button>

                        <br>
                        <a href="index.php" class="btn btn-success btn-block mt-2">
                            Voltar
                        </a>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br><br><br>
        <!-- Bootstrap core JavaScript -->
        <script src="bootstrap/js/bootstrap.bundle.js"></script>

    </body>


    </html>

<?php
}
if ($op == "atualizar") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $senha = trim($_POST['senha']);
    $novasenha = trim($_POST['novasenha']);

    include_once "class/cvbd.php";
    $cvbd = new Cvbd();
    session_start();
    $cvlogin = $_SESSION['caravanlogin'];
    $cvsenha = $_SESSION['caravansenha'];
    $dados = $cvbd->userSelect($cvlogin, $cvsenha);
    if ($cvsenha == $senha) {
        if ($novasenha == "") {
            $cvbd->userupdate($dados['id'], $nome, $telefone, $cvsenha, $dados['email']);
            echo "<script>javascript:history.go(-2)</script>";
        } else {
            $cvbd->userupdate($dados['id'], $nome, $telefone, $novasenha, $dados['email']);
            echo "<script>javascript:history.go(-2)</script>";
        }
    } else {
        echo "<script>alert('Senha incorreta\\nVerifique e tente novamente');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
}
?>