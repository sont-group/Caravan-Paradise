<?php
class User
{
    public function check($login, $senha)
    {
        include_once('sqbd.php');
        $sqbd = new Sqbd;
        $sql = "select * from users WHERE login = '$login' and senha = '$senha'";
        $check = array(false);
        $conn = $sqbd->conn();
        foreach ($conn->query($sql) as $row) {
            if ($row['login'] == $login and $row['senha'] == $senha) {
                $nome = $row['nome'];
                $nome =  explode(" ", ucfirst(strtolower($nome)));
                $check = array(true, $nome[0]);
                break;
            }
        }
        return $check;
    }

    public function status()
    {
        session_start();
        if (!isset($_SESSION['caravanlogin']) or !isset($_SESSION['caravansenha'])) {
            session_destroy();
            echo "<script>alert('Faça o login para continuar');</script>";
            echo "<script>location.href = 'login.php'</script>";
        } else {
            $login = $_SESSION['caravanlogin'];
            $senha = $_SESSION['caravansenha'];
            $check = $this->check($login, $senha);
            if ($check[0]) {
                return $check[1];
            } else {
                session_destroy();
                echo "<script>alert('Erro com o Login \\nFaça o login para continuar');</script>";
                echo "<script>location.href = 'login.php'</script>";
            }
        }
    }
}

?>
