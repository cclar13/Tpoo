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

    <div class="banner mt-5">
        <img src="./img/banner.png" alt="" width="100%">
    </div>
    
    <h2 class="mt-2">Opções:</h2>
    <div class="escolhas">

        <div class="row">
            <div class="col-md-4">
                <div class="card morromClaro" >
                    <img src="./img/usuario.png" class="imgConta" alt="..."     >
                    <div class="card-body border-top">
                        <h5 class="card-title">Listar Usuario</h5>
                        <p class="card-text">Listagem dos Usuarios cadastrados</p>
                        <a href="listarUsuario.php" class="btn btn-dark w-100">ENTRAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" morromClaro">
                    <img src="./img/addUsuario.png" class="imgConta" alt="...">
                    <div class="card-body border-top">
                        <h5 class="card-title">Adicionar Usuario</h5>
                        <p class="card-text">Adcione  um novo usuario</p>
                        <a href="addUsuario.php" class="btn btn-dark w-100">ENTRAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card morromClaro">
                    <img src="./img/entrarConta.png" class="imgConta" alt="..." >
                    <div class="card-body border-top">
                        <h5 class="card-title">Entrar na Conta</h5>
                        <p class="card-text">Não tem conta?<a href="criarConta.php">Crie uma</a></p>
                        <a href="conta.php" class="btn btn-dark w-100">ENTRAR</a>
                    </div>
                </div>
            </div>
        </div>

<!---->
<!--        <h4 class="listUsuario"><a href="listarUsuario.php">Listar Usuarios</a></h4>-->
<!--        <h4 class="addUsuario"><a href="addUsuario.php">Adicionar Usuarios</a></h4>-->
<!--        <h4 class="contaUsuario"><a href="conta.php">Entra Conta</a></h4>-->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>