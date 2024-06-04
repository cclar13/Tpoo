<?php
include('conexao.php');
include('adm.php');

$conn = new Conexao();
$usuario = new Adm($conn->getConn());

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $usuario->adicionarUsuario($email, $senha);
        $message = 'Usuário cadastrado com sucesso!';
    } catch (Exception $e) {
        $message = 'Erro ao cadastrar usuário: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
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
<?php if ($message != ''): ?>
    <script>
        alert('<?php echo $message; ?>');
    </script>
<?php endif; ?>
<h1 class="text-center">Cadastro de Usuários</h1>
<div class="row justify-content-md-center">
    <div class="col-md-4">
        <div class="">
            <div class="card">
                <h5 class="card-header bg-dark text-white">CADASTRO</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="text" id="email" name="email"  class="form-control" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" id="senha" name="senha"  class="form-control" required>
                        </div>

                        <input type="submit" class="btn btn-success" value="Cadastrar">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
