<?php

class Util
{
    public function cont()
    {
        include_once('sqbd.php');
        $sqbd = new Sqbd();
        $conn = $sqbd->conn();  

        $sth = $conn->prepare("select * from viagens");
        $sth->execute();
        $viagens = count($sth->fetchAll());

        $sth = $conn->prepare("select * from clientes");
        $sth->execute();
        $clientes = count($sth->fetchAll());

        $sth = $conn->prepare("select * from pacotes");
        $sth->execute();
        $pacotes = count($sth->fetchAll());
        
        return array("viagens" => $viagens, "clientes" => $clientes, "pacotes" => $pacotes);
    }
}
