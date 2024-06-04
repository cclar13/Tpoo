<?php
include('contaAbstrata.php');

class ContaCorrente extends Conta
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function depositarDinheiro($valor,$titular )
    {
        try {
            $sql_update = "UPDATE conta SET saldo = saldo + ? WHERE titular = ?";
            $sqlInsert_update = $this->conn->prepare($sql_update);
            $sqlInsert_update->bindValue(1, $valor, PDO::PARAM_INT);
            $sqlInsert_update->bindValue(2, $titular, PDO::PARAM_STR);
            $sqlInsert_update->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    function verTitular()
    {
        try {
            $sqlSelect = "SELECT titular FROM conta";
            $slqPesquisa = $this->conn->prepare($sqlSelect);
            $slqPesquisa->execute();
            return $slqPesquisa->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();
        }
    }

    public function addTitular($titular)
    {
        try {
            $sqlInsert = "INSERT INTO conta(titular) VALUES  (?)";
            $sqlI = $this->conn->prepare($sqlInsert);
            $sqlI->bindValue(1, $titular, PDO::PARAM_STR);
            $sqlI->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();
            throw $e;
        }
    }

}
