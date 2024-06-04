<?php
class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function adicionarUsuario($nome, $email) {
        $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nome, $email);
        $stmt->execute();
        $stmt->close();
    }

    public function listarUsuarios() {
        $sql = "SELECT id, nome, email FROM usuarios";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deletarUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

}
?>
