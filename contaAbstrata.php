<?php

abstract class Conta
{
    public $saldo;
    public $titular;

    function __construct($titular, $saldoInicial = 100) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    function depositar($valor)
    {
        $this->saldo += $valor;
    }

    function sacar($valor)
    {
        if (($this->saldo > 0) && ($this->saldo >= $valor)) {
            $this->saldo -= $valor;
        } else {
            echo "Saldo insuficiente<br>";
        }
    }


    function verSaldo() {
        try {
            $sql = "SELECT idconta, saldo FROM conta";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os resultados como um array associativo
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();
            return [];
        }
    }

}

class ContaPoupanca extends Conta
{
    public function depositar($valor)
    {
        parent::depositar($valor); // Call the parent class's depositar method
    }

    public function resgatar($valor)
    {
        $this->sacar($valor); // You might want to add specific logic for resgatar
    }
}

// Example usage:
$conta1 = new ContaPoupanca("John Doe");
$conta1->verSaldo(); // Output initial balance
$conta1->depositar(500);
$conta1->verSaldo(); // Output balance after deposit
$conta1->resgatar(250);
$conta1->verSaldo(); // Output balance after withdrawal
?>
