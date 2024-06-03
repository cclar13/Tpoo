<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>
<h2>Perfil do Usuário</h2>
<p>Bem-vindo, <?php echo $_SESSION['email']; ?></p>
<a href="logout.php">Sair</a>
</body>
</html>
