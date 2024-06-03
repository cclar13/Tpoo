<?php
include('db.php');
include('login.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new Conexao();
    $usuario = new Login($conn->getConn());

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->autenticar($email, $senha)) {
        $_SESSION['email'] = $email;
        header("Location: perfil.php");
        exit();
    } else {
        $erro = "Email ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required><br><br>
    <input type="submit" value="Login">
</form>
<?php if (isset($erro)) echo $erro; ?>
</body>
</html>
