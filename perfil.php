<?php
session_start();
if (!isset($_SESSION['email'])) {
    session_destroy();
    header('Location:./index.php?error=404');
    die();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bodyPerfil">
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bem-vindo, <?php echo $_SESSION['email']; ?> </a>
        <button class="navbar-toggler" +++++++++++++++++++++++++++++="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <form class="d-flex" role="search">
                <button class="btn btn-danger" type="button"><a href="sair.php" style="text-decoration: none;color: white">Sair</a></button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center mt-3 p-3">Bem-vindo ao Sistema de Biblioteca</h1>

    <h2>Opções:</h2>
    <div class="escolhas">
        <h4 class="listUsuario"><a href="listarUsuario.php">Listar Usuarios</a></h4>
        <h4 class="addUsuario"><a href="addUsuario.php">Adicionar Usuarios</a></h4>
        <h4 class="contaUsuario"><a href="conta.php">Abrir Conta</a></h4>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>