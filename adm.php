<?php
class Adm {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function autenticar($campos, $tabela, $campoBdString, $campoBdString2, $campoParametro, $campoParametro2, $campoBdAtivo, $valorAtivo) {
        try {
            $sqlLista = $this->conn->prepare("SELECT $campos "
                . "FROM $tabela "
                . "WHERE $campoBdString = ? AND  $campoBdString2 = ? AND $campoBdAtivo = ? ");
            $sqlLista->execute([$campoParametro, $campoParametro2, $valorAtivo]);

            if ($sqlLista->rowCount() > 0) {
                return $sqlLista->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        } catch (Throwable $e) {
            $error_message = 'Throwable:' . $e->getMessage() . PHP_EOL;
            $error_message .= 'File:' . $e->getFile() . PHP_EOL;
            $error_message .= 'Line:' . $e->getLine() . PHP_EOL;
            error_log($error_message, 3, 'log/arquivo_log.txt');
            throw $e;
        }
    }

    public function adicionarUsuario($email, $senha) {
        try {
            $sql = "INSERT INTO adm(emailAdm, senhaAdm) VALUES  (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email, $senha]);
            return true;
        } catch (PDOException $e) {

            throw $e;
        }
    }

    public function listarUsuarios() {
        try {
            $sql = "SELECT idadm, emailAdm FROM adm";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os resultados como um array associativo
        } catch (PDOException $e) {
            echo 'Exception -> ' . $e->getMessage();
            return [];
        }
    }

    public function deletarUsuario($id) {
        $sql = "DELETE FROM adm WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

}
?>
