<?php
include('Conexao.php');
include('Usuario.php');

$conn = new Conexao();
$usuario = new Usuario($conn->getConn());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario->deletarUsuario($id);
    header("Location: index.php");
}
?>
