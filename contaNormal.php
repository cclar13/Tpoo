<?php
class Conta {
    private $conn;
    public $saldo = 0;
    public $titular;

    public function __construct($conn) {
        $this->conn = $conn;
    }



    function sacar($valor) {
        if (($this->saldo > 0) && ($this->saldo >= $valor)) {
            $this->saldo -= $valor;
        } else {
            echo "Saldo insuficiente<br>";
        }
    }

//    SELECT
    function verSaldo() {

        try {
            $sqlSelect = "SELECT * FROM conta";
            $slqPesquisa = $this->conn->prepare($sqlSelect);
            $slqPesquisa->execute();
            return $slqPesquisa->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();

        }
    }

    function listarSaldo($campos,$tabela,$campoOrdem)
    {
        $conn = conectar();
        try {
            $conn->beginTransaction();
            $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem ");
            //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
            $sqlLista->execute();
            $conn->commit();
            if ($sqlLista->rowCount() > 0) {
                return $sqlLista->fetchAll(PDO::FETCH_OBJ);
            } else {
                return null;
            };
        } catch (PDOException $e) {
            echo 'Exception -> ';
            return ($e->getMessage());
            $conn->rollback();
        };
        $conn = null;
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
?>
