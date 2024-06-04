<?php
include('conexao.php');
include('adm.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn = new Conexao();
    $usuario = new Adm($conn->getConn());
    $usuario->deletarUsuario($id);

    header('Location: listarUsuario.php');
    exit();
} else {
    echo "ID inválido.";
}
?>
