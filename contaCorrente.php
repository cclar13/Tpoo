<?php
include('contaAbstrata.php');

class ContaCorrente extends Conta
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function depositarDinheiro($valor, $titular)
    {
        try {
            $sql_select = "SELECT * FROM conta WHERE titular = ?";
            $sqlInsert_select = $this->conn->prepare($sql_select);
            $sqlInsert_select->bindParam(1, $titular);
            $sqlInsert_select->execute();

            if ($sqlInsert_select->rowCount() > 0) {
                $sql_update = "UPDATE conta SET saldo = saldo + ? WHERE titular = ?";
                $sqlInsert_update = $this->conn->prepare($sql_update);
                $sqlInsert_update->bindParam(1, $valor);
                $sqlInsert_update->bindParam(2, $titular);
                $sqlInsert_update->execute();
                return true;
            } else {
                return false;
            }
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
            $sql = "INSERT INTO conta(titular) VALUES  (?)";
            $sqlInsert = $this->conn->prepare($sql);
            $sqlInsert->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();
            throw $e;
        }
    }

}
