<?php
include('conexao.php');
include('adm.php');

session_start();

$response = []; // Inicializa um array vazio para a resposta JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new Conexao();
    $usuario = new Adm($conn->getConn());

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->autenticar("*", "adm", "emailAdm", "senhaAdm", $email, $senha, "ativo", "A")) {
        $_SESSION['email'] = $email;
        $response['success'] = true;
        $response['message'] = 'Login bem-sucedido';
    } else {
        $response['success'] = false;
        $response['message'] = 'Email ou senha incorretos';
    }
}

// Envia a resposta JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
