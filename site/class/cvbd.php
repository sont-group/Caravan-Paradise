<?php

class Cvbd
{

    public function ImgExplode($imagens)
    {
        $icone = explode(' * ', $imagens)[0];
        $local = explode(', ', explode(' * ', $imagens)[1]);
        $hotels = explode(', ', explode(' * ', $imagens)[2]);
        return array('icone' => $icone, 'local' => $local, 'hotels' => $hotels);
    }

    public function ImgImplode($icone, $local, $hotels)
    {
        $xlocal = implode(', ', $local);
        $xhotels = implode(', ', $hotels);
        $imagens = "$icone * $xlocal * $xhotels";
        return $imagens;
    }

    public function conn()
    {
        $bdNome = 'caravanbd';
        $user = 'root';
        $senha = '';
        $bd = "mysql:host=localhost;dbname=$bdNome";
        return new PDO($bd, $user, $senha);
    }


    public function viageminfo($cod)
    {

        $conn = $this->conn();
        $sql = "select * from viagens WHERE cod = '$cod'";
        foreach ($conn->query($sql) as $row) {
            $origem = utf8_encode($row['origem']);
            $destino = utf8_encode($row['destino']);
            $nome = utf8_encode($row['nome']);
            $hotel = utf8_encode($row['hotel']);
            $preco = utf8_encode($row['preco']);
            $detalhes = utf8_encode($row['detalhes']);
            $imagens = utf8_encode($row['imagens']);
            $imagens = $this->ImgExplode($imagens);
            $dados = array(
                'origem' => $origem, 'destino' => $destino, 'nome' => $nome,
                'hotel' => $hotel, 'preco' => $preco, 'detalhes' => $detalhes, 'imagens' => $imagens
            );
            return $dados;
        }
    }

    public function loginCheck($login, $senha)
    {
        $login = utf8_decode($login);
        $senha = utf8_decode($senha);
        $sql = "select * from clientes WHERE email = '$login' and senha = '$senha'";
        $check = array(false, '');
        $conn = $this->conn();
        foreach ($conn->query($sql) as $row) {
            if ($row['email'] == $login and $row['senha'] == $senha) {
                $nome = $row['nome'];
                $nome =  explode(" ", ucfirst(strtolower($nome)));
                $check = array(true, $nome[0]);
                break;
            }
        }
        return $check;
    }
    public function loginStatus()
    {
        session_start();
        if (!isset($_SESSION['caravanlogin']) or !isset($_SESSION['caravansenha'])) {
            session_destroy();
            return array(false, "");
        } else {
            $login = $_SESSION['caravanlogin'];
            $senha = $_SESSION['caravansenha'];
            $check = $this->loginCheck($login, $senha);
            if ($check[0]) {
                return array(true, $check[1]);
            } else {
                session_destroy();
                return array(false, "");
            }
        }
    }

    public function upArray($dados)
    {
        for ($i = 0; $i < count($dados); $i++) {
            $dados[$i] =  utf8_decode($dados[$i]);
        }
        return $dados;
    }

    public function cadCheck($email, $cpf)
    {
        $sql = "select * from clientes WHERE email = '$email' OR cpf = '$cpf'";
        $check = false;
        $conn = $this->conn();
        foreach ($conn->query($sql) as $row) {
            $check = true;
            break;
        }
        return $check;
    }


    public function cadCliente($dados)
    {
        $dados = $this->upArray($dados);
        try {
            $dbh = $this->conn();

            $stmt = $dbh->prepare("INSERT INTO clientes (cpf, nome, email, telefone, senha) VALUES(?,?,?,?,?)");
            try {
                $dbh->beginTransaction();
                $stmt->execute($dados);
                $dbh->commit();
                // print $dbh->lastInsertId();
            } catch (PDOExecption $e) {
                // $dbh->rollback();
                // print "Error!: " . $e->getMessage() . "</br>";
            }
        } catch (PDOExecption $e) {
            // print "Error!: " . $e->getMessage() . "</br>";
        }
    }

    public function userSelect($email, $senha)
    {
        $email = utf8_decode($email);
        $senha = utf8_decode($senha);
        $conn = $this->conn();
        $sql = "select * from clientes WHERE email = '$email' and senha = '$senha'";
        foreach ($conn->query($sql) as $row) {
            $id = $row['id'];
            $cpf = utf8_encode($row['cpf']);
            $nome = utf8_encode($row['nome']);
            $email = utf8_encode($row['email']);
            $telefone = utf8_encode($row['telefone']);
            $dados = array('id' => $id, 'cpf' => $cpf, 'nome' => $nome, 'email' => $email, 'telefone' => $telefone);
            return $dados;
        }
    }

    public function userupdate($id, $nome, $telefone, $senha, $email)
    {
        $conn = $this->conn();
        try {
            $stmt = $conn->prepare('UPDATE clientes SET nome = :nome, telefone = :telefone, senha = :senha WHERE id = :id');
            $stmt->execute(array(
                ':id' => $id,
                ':nome' => $nome,
                ':telefone' => $telefone,
                ':senha' => $senha
            ));
            // echo $stmt->rowCount();
        } catch (PDOException $e) {
            // echo 'Error: ' . $e->getMessage();
        }
        session_destroy();
        session_start();
        $_SESSION['caravanlogin'] = $email;
        $_SESSION['caravansenha'] = $senha;
    }


    
    public function reserve($id_cliente, $cod_viagem, $quantidade)
    {
        $dados = array($id_cliente, $cod_viagem, $quantidade);
        
        $dados = $this->upArray($dados);
        try {
            $dbh = $this->conn();
            $stmt = $dbh->prepare("INSERT INTO pacotes(id_cliente, cod_viagem, quantidade) VALUES(?,?,?)");
            try {
                $dbh->beginTransaction();
                $stmt->execute($dados);
                $dbh->commit();
                // print $dbh->lastInsertId();
            } catch (PDOExecption $e) {
                // $dbh->rollback();
                // print "Error!: " . $e->getMessage() . "</br>";
            }
        } catch (PDOExecption $e) {
            // print "Error!: " . $e->getMessage() . "</br>";
        }
    }

    public function reservations($id_cliente)
    {
        $i = 0;
        $conn = $this->conn();
        $sql = "select * from pacotes WHERE id_cliente = '$id_cliente'";
        foreach ($conn->query($sql) as $row) {
            $req = $row['req'];
            $id_cliente = utf8_encode($row['id_cliente']);
            $cod_viagem = utf8_encode($row['cod_viagem']);
            $quantidade = utf8_encode($row['quantidade']);
            $dados[$i++] = array('req' => $req, 'id_cliente' => $id_cliente, 'cod_viagem' => $cod_viagem, 'quantidade' => $quantidade);
          
        }
        if ($i == 0) {
            return false;
        }else{
            return $dados;
        }
       
        
    }
}
