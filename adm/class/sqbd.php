<?php

class Sqbd
{
    public function conn()
    {
        $bdNome = 'caravanbd';
        $user = 'root';
        $senha = '';
        $bd = "mysql:host=localhost;dbname=$bdNome";
        return new PDO($bd, $user, $senha);
    }
    //$dados = array('joão', 'Piquete', 'Lorena', '2.93', 'img1, img2, img3', 'viatininga', 'uma legal');
    public function cadViagem($dados)
    {
        $dados = $this->upArray($dados);
        try {
            $dbh = $this->conn();

            $stmt = $dbh->prepare("INSERT INTO viagens (nome, origem, destino, preco, imagens, hotel, detalhes) VALUES(?,?,?,?,?,?,?)");

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

    public function viagemCheck($nome)
    {
        $nome = utf8_decode($nome);
        $conn = $this->conn();
        $sql = "select * from viagens WHERE nome = '$nome'";
        foreach ($conn->query($sql) as $row) {
            return false;
        }
        return true;
    }

    public function viagemSelect($nome)
    {
        
        $nome = utf8_decode($nome);
        $conn = $this->conn();
        $sql = "select * from viagens WHERE nome = '$nome'";
        foreach ($conn->query($sql) as $row) {
            $origem = utf8_encode($row['origem']);
            $destino = utf8_encode($row['destino']);
            $nome = utf8_encode($row['nome']);
            $hotel = utf8_encode($row['hotel']);
            $preco = utf8_encode($row['preco']);
            $detalhes = utf8_encode($row['detalhes']);
            $imagens = utf8_encode($row['imagens']);
            $dados = array('origem' => $origem, 'destino' => $destino, 'nome' => $nome,
        'hotel' => $hotel, 'preco' => $preco, 'detalhes' => $detalhes, 'imagens' => $imagens); 
            return $dados;
        }
    }

    public function upArray($dados)
    {
        for ($i = 0; $i < count($dados); $i++) {
            $dados[$i] =  utf8_decode($dados[$i]);
        }
        return $dados;
    }
}
