<?php

class Conexao
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "simples_sistema";

    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
    }

//    public  function conectar()
//    {
//        try {
//            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
//            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (PDOException $e) {
//            echo "Conexão falhou: " . $e->getMessage();
//            die();
//        }
//        return $this->conn;
//    }


    public function getConn()
    {
        return $this->conn;
    }


    public function setConn($conn)
    {
        $this->conn = $conn;
    }
}

?>
