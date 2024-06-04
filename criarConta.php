<?php
include('conexao.php');
include('contaCorrente.php');

$conn = new Conexao();
$contaC = new ContaCorrente($conn->getConn());

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titularCadastro = $_POST['titularCadastro'];
    try {
        $contaC->addTitular($titularCadastro);
        $message = 'Titular Cadastrado com sucesso!';
    } catch (Exception $e) {
        $message = 'Erro ao cadastrar o titular: ' . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRIAR CONTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Criar Conta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="perfil.php">Home</a>
                </li>

            </ul>
            <form class="d-flex" role="search">

                <button class="btn btn-outline-success" type="submit"><a href="perfil.php">Voltar</a></button>
            </form>
        </div>
    </div>
</nav>
<?php if ($message != ''): ?>
    <script>
        alert('<?php echo $message; ?>');
    </script>
<?php endif; ?>
<div class="container">
    <div class="row justify-content-md-center mt-5  ">
        <div class="col-md-4">
            <div class="card mt-5">
                <h5 class="card-header bg-dark text-white">CADASTRO </h5>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <fieldset>
                                <legend><h4>Crie sua conta</h4></legend>
                                <div class="mb-3">
                                    <label for="titularCadastro" class="form-label">Titular</label>
                                    <input type="text" id="titularCadastro" name="titularCadastro" class="form-control" placeholder=" Titular">
                                </div>
                                <button type="submit" class="btn btn-dark w-100" value="Cadastrar">CRIAR</button>
                            </fieldset>
                        </form>
                    </div>
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