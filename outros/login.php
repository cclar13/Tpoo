<?php


class login
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function autenticar($email, $senha)
    {
        $sql = "SELECT * FROM adm WHERE emailAdm=? AND senhaAdm=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

