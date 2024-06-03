<?php
include('conexao.php');
include('adm.php');

$conn = new Conexao();
$usuario = new Adm($conn->getConn());

$usuarios = $usuario->listarUsuarios();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: rgba(0,0,0,0.22)">
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Usuários Cadastrados</a>
        <button class="navbar-toggler" +++++++++++++++++++++++++++++="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <button class="btn btn-primary" type="button"><a href="perfil.php" style="text-decoration: none;color: white">Voltar</a></button>
            </form>
        </div>
    </div>
</nav>
<h2>Usuários Cadastrados</h2>
<div class="container">
    <table class="table table-bordered table-hover border-dark">
        <thead class="table-dark">
        <tr>
            <th style="width: 10%;">ID</th>
            <th style="width:80% ">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['idadm']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['emailAdm']); ?></td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan='4'>Nenhum usuário cadastrado</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
