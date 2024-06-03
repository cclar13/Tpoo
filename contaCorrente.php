<?php
include('contaAbstrata.php');
class ContaCorrente extends Conta
{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function depositarDinheiro($valor,$titular) {
        try {
            $sql_select = "SELECT * FROM conta WHERE titular = ?";
            $stmt_select = $this->conn->prepare($sql_select);
            $stmt_select->bindParam(1, $titular);
            $stmt_select->execute();

            if ($stmt_select->rowCount() > 0) {
                $sql_update = "UPDATE conta SET saldo = saldo + ? WHERE titular = ?";
                $stmt_update = $this->conn->prepare($sql_update);
                $stmt_update->bindParam(1, $valor);
                $stmt_update->bindParam(2, $titular);
                $stmt_update->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function resgatar($valor)
    {
        $this->sacar($valor);
    }
}