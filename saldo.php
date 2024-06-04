<?php
include('conexao.php');
include('contaNormal.php');

$conn = new Conexao();
$conta = new Conta($conn->getConn());

$saldoConta = $conta->verSaldo();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saldo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: rgba(0,0,0,0.22)">
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SALDO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <button class="btn btn-primary" type="button">
                    <a href="conta.php" style="text-decoration: none;color: white">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mt-3">Saldo</h2>
    <table class="table table-bordered table-hover border-dark mt-3">
        <thead class="table-dark">
        <tr>
            <th style="width: 50%;">Titular</th>
            <th style="width: 50%;">Saldo</th>
        </tr>
        </thead>
        <tbody>
        <tbody>
        <?php

        if ($saldoConta) {

            foreach ($saldoConta as $imteConta) {
                $idconta = $imteConta->idconta;
                $titular = $imteConta->titular;
                $saldo = $imteConta->saldo;
                ?>
                <tr>
                    <th scope="row"><?php echo $titular ?></th>
                    <td><?php echo $saldo ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7" class="text-center"><h5>Nenhum cliente cadastrado no banco</h5></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
