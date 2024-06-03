<?php
class Conta {
    private $conn;
    public $saldo = 0;
    public $titular;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function depositar($valor) {
        $this->saldo += $valor;
    }

    function sacar($valor) {
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
?>
