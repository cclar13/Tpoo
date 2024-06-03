<?php
include('conexao.php');
include('contaCorrente.php');

$conn = new Conexao();
$contaCorrente = new ContaCorrente($conn->getConn());

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do formulário estão definidos
    if (isset($_POST['depositarDinheiro']) && isset($_POST['titularDinheiro'])) {
        $depositarDinheiro = $_POST['depositarDinheiro'];
        $titularDinheiro= $_POST['titularDinheiro'];

        try {
            $contaCorrente->depositarDinheiro($depositarDinheiro, $titularDinheiro);
            $message = 'Valor Depositado com sucesso!';
        } catch (Exception $e) {
            $message = 'Não Depositado com sucesso: ' . $e->getMessage();
        }
    } else {
        $message = 'Por favor, preencha todos os campos do formulário.';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEPOSITAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: rgba(0,0,0,0.22)">
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SALDO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a href="perfil.php" style="text-decoration: none;color: white">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 10%">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card ">
                <h4 class="card-header text-center">Depositar Dinheiro</h4>
                <div class="card-body">
                    <h5 class="card-title">Quanto deseja depositar?</h5>
                    <form method="POST" action="">
                        <fieldset>
                            <div class="mb-3">
                                <label for="depositarDinheiro" class="form-label">Deposite o valor</label>
                                <input type="text" id="depositarDinheiro" name="depositarDinheiro" class="form-control" placeholder="Dinheiro">
                            </div>

                            <div class="mb-3">
                                <label for="titularDinheiro" class="form-label">Titular</label>
                                <input type="text" id="titularDinheiro" name="titularDinheiro" class="form-control" placeholder="Titular">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">OK</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
