<?php
if (isset($_GET['cv'])) {
    $op = $_GET['cv'];
} else {
    $op = "contacting";
}
?>

<?php if ($op == "contacting") { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="contacting.php?cv=contact" method="post">
            <label for="fname"><i class="fa fa-user"></i> Nome completo</label>
            <br>
            <input type="text" id="fname" name="nome" placeholder="John M. Doe">
            <br><br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <br>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <br><br>
            <label for="subject">Em que podemos ajudar?</label>
            <br>
            <textarea id="subject" name="mensagem" placeholder="Digite sua dúvida..." style="height:200px"></textarea>
            <br><br>
            <input type="submit" value="Enviar">
            <br><br>
        </form>
    </center>
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
    echo "<script>location.href = 'contacting.php'</script>";
}
?>